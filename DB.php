<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Producto.php';

/**
 * Description of DB
 *
 * @author root
 * @version 1.0.0
 */
class DB {
    /**
     * 
     * @param string $sql
     * @return object
     * @throws PDOException
     * @throws Exception
     */
    protected static function ejecutaConsulta($sql) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=192.168.1.90;dbname=tarea6";
        $usuario = 'admin';
        $contrasena = '123';
        $resultado = null;
        try{
            $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
            $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            throw $e; //informacion sobre el error
        } 
        if (isset($dwes)){
            $resultado = $dwes->prepare($sql); //preapre para poder comprar errores de sintaxis
            $resultado->execute();
            if(!$resultado){
                $error = $dwes->errorInfo();
                throw new Exception($error);
            }
           
        }
        return $resultado;
    }
    
    /**
     * 
     * @param string $codProducto
     * @return \Producto
     */
    public static function obtienePVP($codProducto) {
        $codProductoLimpio = htmlspecialchars($codProducto, ENT_QUOTES, 'UTF-8');
        $sql = "SELECT PVP FROM producto";
        $sql .= " WHERE cod='" . $codProductoLimpio . "'";
        $resultado = self::ejecutaConsulta ($sql);
        $pvp = null;

	if($resultado) {
            $row = $resultado->fetch();
            while ($row != null) {
                $pvp = new Producto($row);
                $row = $resultado->fetch();
            }
	}
        
        return $pvp;
    }
    
    /**
     * 
     * @param string $codProducto
     * @param int $codTienda
     * @return int
     */
    public static function obtieneStock($codProducto, $codTienda) {
        $codProductoLimpio = htmlspecialchars($codProducto, ENT_QUOTES, 'UTF-8');
        $codTiendaLimpio = htmlspecialchars($codTienda, ENT_QUOTES, 'UTF-8');
        $sql = "SELECT unidades FROM stock";
        $sql .= " WHERE producto='" . $codProductoLimpio . "' AND tienda=' " . $codTiendaLimpio . "'";
        $resultado = self::ejecutaConsulta ($sql);
        $stock = null;
        
        if($resultado) {
            while($registro = $resultado->fetch(PDO::FETCH_OBJ)){ //con el metodo fetch genera/devuelve un array
               $stock = $registro->unidades;
            }
        }
        return $stock;   
    }
    
    /**
     * 
     * @return string[]
     */
    public static function obtieneFamilias() {
        $sql = "SELECT cod FROM familia";
        $resultado = self::ejecutaConsulta ($sql);
        $familias[] = null;
        
        if($resultado) {
            while($registro = $resultado->fetch(PDO::FETCH_OBJ)){ //con el metodo fetch genera/devuelve un array
               $familias[] = $registro->cod;
            }
        }
        return $familias; 
    }
    
    /**
     * 
     * @param string $codFamilia
     * @return string[]
     */
    public static function obtieneCodProductos($codFamilia) {
        $codFamiliaLimpio = htmlspecialchars($codFamilia, ENT_QUOTES, 'UTF-8');
        $sql = "SELECT cod FROM producto ";
        $sql .= "WHERE familia='" . $codFamiliaLimpio . "'";
        $resultado = self::ejecutaConsulta ($sql);
        $codProductos[] = null;

        if($resultado) {
            while($registro = $resultado->fetch(PDO::FETCH_OBJ)){ //con el metodo fetch genera/devuelve un array
               $codProductos[] = $registro->cod;
            }
        }
        return $codProductos;
    }
}

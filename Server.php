<?php

require_once 'DB.php';
/**
 * Clase Server
 * 
 * @author Robert Andrei Ioanes
 * @version 1.0.0
 * 
 */

class Server {
    /**
     * 
     * @param string $codProducto
     * @return double
     */
    public function getPVP($codProducto){
        $product = DB::obtienePVP($codProducto);
        return $product->getPVP(); 
    }
    
    /**
     * 
     * @param string $codProducto
     * @param int $codTienda
     * @return int
     */
    public function getStock($codProducto, $codTienda){ 
        $stock = DB::obtieneStock($codProducto, $codTienda);
        return $stock; 
    }
    
    /**
     * 
     * @return string[]
     */
    public function getFamilias(){ 
        $familias = DB::obtieneFamilias();
        return $familias; 
    }   
    
    /**
     * 
     * @param string $codFamilia
     * @return string[]
     */
    public function getProductosFamilia($codFamilia){
        $codProductos = DB::obtieneCodProductos($codFamilia);
        return $codProductos; 
    }
}
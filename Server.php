<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'DB.php';


class Server {
    
    function getPVP($codProducto){
        $product = DB::obtienePVP($codProducto);
        return $product->getPVP(); 
    }

    function getStock($codProducto, $codTienda){ 
        $stock = DB::obtieneStock($codProducto, $codTienda);
        return $stock; 
    }

    function getFamilias(){ 
        $familias = DB::obtieneFamilias();
        return $familias; 
    }   

    function getProductosFamilia($codFamilia){
        $codProductos = DB::obtieneCodProductos($codFamilia);
        return $codProductos; 
    }
}
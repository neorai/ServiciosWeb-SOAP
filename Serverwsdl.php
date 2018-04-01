<?php
require_once 'DB.php';

class Server {
    /**
     * @param string
     * @return float
     */
    public function getPVP($codProducto){
        $product = DB::obtienePVP($codProducto);
        return $product->getPVP(); 
    }
    
    /**
     * @param string
     * @param integer
     * @return integer
     */
    public function getStock($codProducto, $codTienda){ 
        $stock = DB::obtieneStock($codProducto, $codTienda);
        return $stock; 
    }
    
    /**
     * @return string[]
     */
    public function getFamilias(){ 
        $familias = DB::obtieneFamilias();
        return $familias; 
    }   
    
    /**
     * @param string
     * @return string[]
     */
    public function getProductosFamilia($codFamilia){
        $codProductos = DB::obtieneCodProductos($codFamilia);
        return $codProductos; 
    }
}
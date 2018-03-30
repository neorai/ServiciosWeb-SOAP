<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Server.php';

$server = new Server();

try{
    $familias = $server->getProductosFamilia("CAMARA");
} catch (Exception $ex) {
    print_r($ex->getMessage());
}
print_r($familias);

?>
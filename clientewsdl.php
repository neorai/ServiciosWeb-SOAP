<?php

$cliente = new SoapClient("http://192.168.1.90/ServiciosWeb/serviciowsdl.php?wsdl");

?>
<!DOCTYPE html>
<!--

NOTA INFORMATIVA: LOS ERRORES NO SE PUEDEN VER  HACIENDO USO DE SOAPCLIENT
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1>PRUEBAS TAREA SWEA06 - PARTE 2</h1>
        <h2>Autor: Robert Andrei Ioanes</h2>
         
        <h2>Prueba getFamilias()</h2>
        <?php
        try{
            $familias = $cliente->getFamilias();
            print_r($familias);
        } catch (Exception $ex) {
            print_r($ex->getMessage());
        }
        
        ?>
        
        <h2>Prueba getProductosFamilia(CAMARA)</h2>
        <?php
        try{
            $productosFamilia = $cliente->getProductosFamilia("CAMARA");
            print_r($productosFamilia);
        } catch (Exception $ex) {
            print_r($ex->getMessage());
            
        }
        ?>
        
        <h2>Prueba getPVP(BRAVIA2BX400)</h2>
        <?php
        try{
            $pvp = $cliente->getPVP("BRAVIA2BX400");
            print("<br />El PVP es " . $pvp);
        } catch (Exception $ex) {
            print_r($ex->getMessage());
        }
        ?>
                   
        <h2>Prueba getStock(BRAVIA2BX400,3)</h2>
        <?php
        try{
            $unidades = $cliente->getStock("BRAVIA2BX400",3);
            print("<br />Existen  ".$unidades . " unidades");
        } catch (Exception $ex) {
            print_r($ex->getMessage());
        }
        ?>
    </body>
</html>
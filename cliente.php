<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

NOTA INFORMATIVA: LOS ERRORES NO SE PUEDEN VER  HACIENDO USO DE SOAPCLIENT
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1>PRUEBAS TAREA SWEA06 - PARTE 1</h1>
        <h2>Autor: Robert Andrei Ioanes</h2>
        
        <?php
        $url="http://192.168.1.90/ServiciosWeb/servicio.php";
        $uri="http://192.168.1.90/ServiciosWeb";
        $cliente = new SoapClient(null,array('location'=>$url,'uri'=>$uri));
        ?>
        
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

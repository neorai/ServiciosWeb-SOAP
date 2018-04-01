<?php
require_once('Serverwsdl.php');

//$uri="http://192.168.1.90/ServiciosWeb";
//$server = new SoapServer(null, array('uri'=>$uri));
$server = new SoapServer("http://192.168.1.90/ServiciosWeb/serviciowsdl.wsdl.xml");
$server->setClass('Server');
$server->handle();
?>


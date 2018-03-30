<?php
require_once('Server.php');

$uri="http://192.168.1.90/ServiciosWeb";
$server = new SoapServer(null, array('uri'=>$uri));
$server->setClass('Server');
$server->handle();
?>


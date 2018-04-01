<?php
require_once './WSDLDocument-0.6.php';
require_once './Serverwsdl.php';

$sClass = "Server";
$sUrl = "http://192.168.1.90/ServiciosWeb/serviciowsdl.php";
$sTns = "http://192.168.1.90/ServiciosWeb";
$wsdl = new WSDLDocument($sClass, $sUrl, $sTns);

header('Content-Type: text/xml');
print $wsdl->saveXML();
?>
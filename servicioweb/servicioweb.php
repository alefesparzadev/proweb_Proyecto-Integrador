<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  //SE COLOCA EL NOMBRE DE LA PÁGINA QUE CONTIENE LOS MÉTODOS DEL SERVICIO WEB
  include 'clsservicios.php';
  //SE HACE USO DEL PROTOCOLO SOAPSERVER PARA ESTABLECER LA CONEXIÓN CON EL HOSTING
  $soap=new SoapServer(null,array('uri' => 'http://localhost/'));
  //SE EJECUTA LA CLASE QUE CONTIENE LOS MÉTODOS
  $soap->setClass('clsservicios');
  //SE EJECUTA LA CLASE
  $soap->handle();
?>
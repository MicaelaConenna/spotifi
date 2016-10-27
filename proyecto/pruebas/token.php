<?php

require_once("/clases/BaseDatos.php");
require_once("clases/BaseDatos");

$baseDatos=new BaseDatos("localhost","spotifi");//Creo la base de datos

$email=$_POST["email"];
$clave=md5($_POST["contrasenia"]);

$sql="select * from usuario where email='$email' AND clave='$clave'";

$consulta=mysqli_query($baseDatos->conexion,$sql) or die ("No se pudo realizar la insercion de datos en la base de datos");	

$clave=md5("rominacodarin@gmail.com");

	$destinatario='rominacodarin@gmail.com';
	$cabeceras="MIME-Version: 1.0\r\n";
	$cabeceras .= "Content-type: text/html; charset=utf-8\r\n";
	$cabeceras .="From: registro@spotifi.com\r\n";
	
	$asunto="Registro de usuario en Spotify";

   $cuerpo='Bienvenido a Spotify para completar el registro debes clickear en la siguiente direccion:
   <a href="http://localhost/programacion_web_II/proyecto//verificacion.php?tk='.$clave.'">http://localhost/programacion_web_II/proyecto/verificacion.php?tk='.$clave.'</a>'; 
   
	
	
         if(mail($destinatario, $asunto, $cuerpo,$cabeceras)){
			$mensaje= "Gracias por registrarse";	 
		 }else{
			$mensaje= 'El registro no pudo completarse, por pavor intente nuevamente';
		 } 
		 echo $mensaje;
		

?>
<?php

class BaseDatos{

private $usuario;
private $clave;
private $base;
private $servidor;
private $conexion;

public function __construct($usuario, $clave, $base, $servidor){
	
}
public function conectar(){
	
}
public function desconectar(){
	
}

public function consultar($sql){	
	this->conectar();
	$consulta=mysqli_query(this->conexion, $sql);
	this->desconectar();
	return $consulta;
}



}

?>
<?php

class BaseDatos{

public $base;
public $servidor;
public $conexion;

	public function __construct($new_servidor,$new_base){
		$this->base=$new_base;
		$this->servidor=$new_servidor;
		$this->conexion=mysqli_connect($this->servidor, 'root', '', $this->base) or die("No se ha podido establecer conexion con la base de datos");

		
	}


	public function registrarUsuario($new_nombre,$new_clave,$new_email,$new_latitud,$new_longitud,$new_es_admin,$new_esta_bloqueado){

		//FUNCION PARA ENCRIPTAR CONTRASENIA , NO PUEDEO DESENCRIPTARLA EN LA CLASE VALIDADOR, METODO validarClaveParaElFormularioDeLogin()
	//	$new_clave=md5($new_clave);

		$sql="insert into Usuario (nombre,clave,email,latitud,longitud,es_admin,esta_bloqueado)
			  values ('$new_nombre','$new_clave','$new_email','$new_latitud','$new_longitud',$new_es_admin,$new_esta_bloqueado)";

		$consulta=mysqli_query($this->conexion,$sql) or die ("No se pudo realizar la insercion de datos en la base de datos");	

	}

}

?>
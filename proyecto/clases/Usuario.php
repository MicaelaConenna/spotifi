<?php
class Usuario{

public $nombre;
public $clave;
public $email;
public $latitud;
public $longitud;
public $es_admin;
public $esta_bloqueado;
public $token;

public function __construct($new_nombre,$new_clave,$new_email,$new_latitud,$new_longitud, $token){
	$this->nombre=$new_nombre;
	$this->email=$new_email;
	$this->clave=$new_clave;
	$this->latitud=$new_latitud;
	$this->longitud=$new_longitud;
	$this->es_admin=0;
	$this->esta_bloqueado=0;
	$this->token=$token;
	
}
/*
enviar_solicitud_seguimiento($id){}

cambiarEstadoSeguimiento($id_seguidor, $accion){
	
}
agregarPlaylist(){}
agregarPlaylistFavoritas(){}
votarPlayList(){}
reportarPlaylist(){}
reportarUsuario(){}
subirCancion(){}
editarDatosPersonales(){}

//metodos admin
bloqueaUsuario(){}
bloqueaPlayList(){}
generaReporte(){}
*/
}



?>
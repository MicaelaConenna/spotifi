<?php
class Validador{

/*Recomendaciones*/
/*La clase no tendria atributos,unicamente funciones,validarContrasenia,validarEmail para el formulario de registro, y para el formulario de logueo (que corroboraria en la base de datos)*/



public function __construct(){

}

public function validarEmailParaElFormularioDeRegistro($new_email){

	
}

/*public function validarClaveParaElFormularioDeRegistro($new_clave){}*/

public function validarEmailParaElFormularioDeLogin($new_email){

			$conexion = mysqli_connect('localhost', 'root', '', 'spotifi') or die("No se puede conectar a la base de datos");

			$sql="select * from usuario where email='$new_email'";

			$consulta = mysqli_query($conexion,$sql) or die("No se puede buscar la informacion en la base de datos");

			
			while($fila = mysqli_fetch_assoc($consulta)) {

					if($fila["email"]==$new_email){

						return true;

					}else{

						return false;

					}	
			}
}

public function validarClaveParaElFormularioDeLogin($new_email,$new_clave){

			$conexion = mysqli_connect('localhost', 'root', '', 'spotifi') or die("No se puede conectar a la base de datos");

			$sql="select * from usuario where email='$new_email'";

			$consulta = mysqli_query($conexion,$sql) or die("No se puede buscar la informacion en la base de datos");

				while($fila = mysqli_fetch_assoc($consulta)) {

					//En esta sentencia iria if($fila["clave"]==md5($new_clave){ pero no anda, no se, es rarisimo
						if($fila["clave"]==md5($new_clave)){

					     	return true;

						 }else{

							 return false;

						 }
				}
}


}




?>
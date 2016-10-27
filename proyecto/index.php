<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Spotify</title>
		<link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
	<script src="js/bootstrap.min"></script>
	<link rel="stylesheet" href="estilos/estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
	<div class="container">
		<div id="logo">
			<img src="imagenes/logo.png" class="img-responsive">
		</div>
	</div><!-- container -->
</header>
 <section>
	<div class="container">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
		<div id="panel-login" class="panel panel-default">
			<div id="form-cont">
			
				<form id="formulario-ingreso" action="index.php" method="POST">
				<div class="form-group">
					<label class="label-form" for="email">Ingrese su email</label><br>
						<input type="text" name="email" class="form-control"><br>
				</div><!-- form-group -->
				<div class="form-group">
					<label class="label-form" for="contrasenia">Contraseña</label><br>
						<input type="text" name="contrasenia" class="form-control" ><br>
						<p class="p-form">Si no estas registrado, registrate <a href="registro.php">aquí</a></p><br>
						<input id="boton-form-login" type="submit" value="Sign In" class="btn btn-ttc" onclick="">

				</div><!-- form-group -->
				</form>
			</div><!-- form-cont -->
		</div><!-- panel-login class panel panel-default -->
	</div><!-- container -->
</section>
	
</body>
</html>

<?php
if	($_SERVER['REQUEST_METHOD'] == 'POST'){

require_once("/clases/BaseDatos.php");
$baseDatos=new BaseDatos("localhost","spotifi");//Creo la base de datos

$email=$_POST["email"];
$clave=md5($_POST["contrasenia"]);

$sql="select * from usuario where email='$email' AND clave='$clave' AND estado_registro=1";

$consulta=mysqli_query($baseDatos->conexion,$sql) or die ("No se pudo realizar la insercion de datos en la base de datos");	



if(mysqli_num_rows($consulta)==0){
		
	echo "El usuario y/o contraseña son incorrectos";
}else{
	$fila=mysqli_fetch_assoc($consulta);
	session_start();

     				$_SESSION['log']=1;
					$_SESSION['admin']=$fila['es_admin'];
					$_SESSION['nombre']=$fila['nombre'];
					$_SESSION['id']=$fila['id_usuario'];

     				setcookie(user,$email,time()+(86400*20),"/");

     				echo "cargando";

			     	echo"<script language='javascript'>window.location='principal.php'</script>;";//redirecciono a otra web mediante un script javascript
	
}
}//fin el post


/*
require_once("/clases/Validador.php");
$validador=new Validador();

$email_validado=$validador->validarEmailParaElFormularioDeLogin($email);
$clave_validada=$validador->validarClaveParaElFormularioDeLogin($email,$clave);


if(isset($_POST['email']) && isset($_POST['contrasenia'])) // si estas variables estan seteadas ejecuta la funcion validar enviando el contenido de los input como parametros
{
  	if ($email_validado==true){


		if($clave_validada==true){



				     session_start();

     				$_SESSION['log']=1;

     				setcookie(user,$email,time()+(86400*20),"/");

     				echo "cargando";

			     	echo"<script language='javascript'>window.location='principal.php'</script>;";//redirecciono a otra web mediante un script javascript


		}else{
			echo "Contraseña incorrectaasdasd";
		}

	}else{
		echo "Email incorrectoasdasd";
	}
}


	*/

?>
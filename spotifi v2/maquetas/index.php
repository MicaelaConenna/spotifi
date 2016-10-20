<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		<link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
	<script src="js/bootstrap.min"></script>
	<link rel="stylesheet" href="estilos/estilos.css">
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
						<p class="p-form">Si no estas registrado, registrate <a href="registro.php">aqui</a></p><br>
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
require_once("/clases/Validador.php");

$email=$_POST["email"];
$clave=$_POST["contrasenia"];

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


	

?>
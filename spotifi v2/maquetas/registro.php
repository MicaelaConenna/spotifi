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
		<div id="panel-registro" class="panel panel-default">
			<div id="form-cont-registro">
			
				<form id="formulario-registro" action="registro.php" method="POST">
					<div class="form-group">
						<label class="label-form-registro" for="nombre">Nombre</label><br>
							<input type="text" name="nombre" class="form-control"><br>
					</div><!-- form-group -->

				<div class="form-group">
						<label class="label-form-registro" for="email">Email</label><br>
							<input type="text" name="email" class="form-control" ><br>
					</div><!-- form-group -->

				<div class="form-group">
						<label class="label-form-registro" for="r_email">Repita su email</label><br>
							<input type="text" name="r_email" class="form-control" ><br>
					</div><!-- form-group -->
				
				<!--  <div class="form-group">
						<label class="label-form-registro" for="select">Escoga pais, provincia y ciudad</label><br><br>
							<select name="pais" id="">
								<option value="Argentina">Argentina</option>
								<option value="Uruguay">Uruguay</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Chile">Chile</option>
								<option value="Bolivia">Bolivia</option>
								<option value="Brasil">Brasil</option>
								<option value="Peru">Peru</option>
								<option value="Colombia">Colombia</option>
								<option value="Venezuela">Venezuela</option>
							</select>
							<select name="provincia" id="">
								<option value="Buenos Aires">Buenos Aires</option>
								<option value="Salta">Salta</option>
								<option value="San Luis">San Luis</option>
								<option value="San Juan">San Juan</option>
								<option value="Corodoba">Corodoba</option>
								<option value="Misiones">Misiones</option>
								<option value="Chaco">Chaco</option>
								<option value="Santa Fe">Santa Fe</option>
								<option value="Chubut">Chubut</option>
							</select>
							 <select name="localidad" id="">
								<option value="Moron">Moron</option>
								<option value="Castelar">Castelar</option>
								<option value="Ituzaingo">Ituzaingo</option>
								<option value="Paso del Rey">Paso del Rey</option>
								<option value="Moreno">Moreno</option>
								<option value="C.A.B.A">C.A.B.A</option>
								<option value="Constitucion">Constitucion</option>
								<option value="Retiro">Retiro</option>
								<option value="San Justo">San Justo</option>
							</select> 
					</div><!-- form-group -->


				<div class="form-group">
						<label class="label-form-registro" for="latitud">Latitud</label><br>
							<input type="text" name="latitud" class="form-control" ><br>
				</div><!-- form-group -->

				<div class="form-group">
						<label class="label-form-registro" for="longitud">Longitud</label><br>
							<input type="text" name="longitud" class="form-control" ><br>
				</div><!-- form-group -->

				<div class="form-group">
						<label class="label-form-registro" for="contrasenia">Contraseña</label><br>
							<input type="text" name="contrasenia" class="form-control" ><br>
				</div><!-- form-group -->

				<div class="form-group">
						<label class="label-form-registro" for="r_contrasenia">Repita su contraseña</label><br>
							<input type="text" name="r_contrasenia" class="form-control" ><br>

				<input id="boton-form-registro" type="submit" value="Sign In" class="btn btn-ttc">
				<a href="index.php"><input id="boton-form-registro" type="button" value="Login" class="btn btn-ttc" onclick=""></a>
				</div><!-- form-group -->


				</form>

			</div><!-- form-cont -->
		</div><!-- panel-registro class panel panel-default -->
	</div><!-- container -->
</section>
	
</body>
</html>
<?php

require_once("/clases/BaseDatos.php");
require_once("/clases/Usuario.php");


$baseDatos=new BaseDatos("localhost","spotifi");//Creo la base de datos

//creo un usuario con el contenido de form, esta bloqueado y es admin se crea con el valor 0 por default en el constructor
$usuario=new Usuario($_POST["nombre"],$_POST["r_contrasenia"],$_POST["r_email"],$_POST["latitud"],$_POST["longitud"]);


//Registro un usuario en la base de datos

$baseDatos->registrarUsuario($usuario->nombre, $usuario->clave, $usuario->email, $usuario->latitud, $usuario->longitud, $usuario->es_admin,$usuario->esta_bloqueado);




?>
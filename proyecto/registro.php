<?php
require_once("/clases/BaseDatos.php");
require_once("/clases/Usuario.php");



//si se precio el boton_registro, hacer
if(isset($_POST["boton_registro"])){
	$tk=md5($_POST['email']);
	
	$baseDatos=new BaseDatos("localhost","spotifi");//Creo la base de datos

	//creo un usuario con el contenido de form, esta bloqueado y es admin se crea con el valor 0 por default en el constructor
	$usuario=new Usuario($_POST["nombre"],$_POST["r_contrasenia"],$_POST["r_email"],$_POST["latitud"],$_POST["longitud"], $tk);


	//Registro un usuario en la base de datos

	$baseDatos->registrarUsuario($usuario->nombre, $usuario->clave, $usuario->email, $usuario->latitud, $usuario->longitud, $usuario->es_admin,$usuario->esta_bloqueado, $usuario->token);
	
	$clave=md5($usuario->email);
	
	$destinatario=$usuario->email;
	$cabeceras="MIME-Version: 1.0\r\n";
	$cabeceras .= "Content-type: text/html; charset=utf-8\r\n";
	$cabeceras .="From: registro@spotify.com\r\n";
	
	$asunto="Registro de usuario en Spotify";

   $cuerpo='Bienvenido a Spotify para completar el registro debes clickear en la siguiente direccion:
   <a href="http://localhost/programacion_web_II/proyecto//verificacion.php?tk='.$clave.'">http://localhost/programacion_web_II/proyecto/verificacion.php?tk='.$clave.'</a>'; 
   
	
	
         if(mail($destinatario, $asunto, $cuerpo,$cabeceras)){
			$mensaje= "Enviamos un mail a tu cuenta, por favor ingresa a tu cuenta de correo para completar el registro";	 
		 }else{
			$mensaje= 'El registro no pudo completarse, por pavor intente nuevamente';
		 } 
		

}

?>
<!DOCTYPE html>

<!--
<html lang="en">
-->
<html>
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
		<div id="panel-registro" class="panel panel-default">
			<div id="form-cont-registro">
				<?php
				if	($_SERVER['REQUEST_METHOD'] == 'POST'){
				?>
                <div class="info bg-info"><?php echo $mensaje; ?></div>
                <?php
				}
				?> 
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
						<label class="label-form-registro" for="r_email">
						Repita su email</label><br>
						<input type="text" name="r_email" class="form-control" ><br>
					</div><!-- form-group -->
					
					<div class="form-group">
						<label class="label-form-registro" for="r_email">
						Selecciona tu ubicación</label><br>
						<div id="map" style="width:100%;height:300px"></div>
						<script>
							function myMap() {
							  var myLatlng = {lat: -34.669641, lng: -58.562965}
							  
							  var mapCanvas = document.getElementById("map");
							  
							  var mapOptions = {
								center: myLatlng, 
								zoom: 10
							  }
							  
							  var map = new google.maps.Map(mapCanvas, mapOptions);
								
							  var marker = new google.maps.Marker({
										position: myLatlng,
										map: map
									  });
							
							  map.addListener('click', function(e) {
									  marker.setPosition(e.latLng);
									  map.panTo(e.latLng);
									  
									  document.getElementById("zoom").value=map.getZoom();
									  document.getElementById("latLng").value=e.latLng;
							  });
							}
							
						</script>
						<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
						
					</div><!-- form-group -->

					<div class="form-group">
						<label class="label-form-registro" for="latitud">
						Latitud y Longitud</label><br>
						<input type="text" name="latitud" class="form-control" 
						id="latLng" readonly><br>
					</div><!-- form-group -->

					<div class="form-group">
						<label class="label-form-registro" for="longitud">Zoom</label><br>
						<input type="text" name="longitud" class="form-control" 
						id="zoom" readonly><br>
					</div><!-- form-group -->

					<div class="form-group">
						<label class="label-form-registro" for="contrasenia">Contraseña</label><br>
						<input type="password" name="contrasenia" class="form-control" ><br>
					</div><!-- form-group -->

					<div class="form-group">
						<label class="label-form-registro" for="r_contrasenia">Repita su contraseña</label><br>
						<input type="password" name="r_contrasenia" class="form-control" ><br>

						<input id="boton-form-registro" type="submit" value="Sign In" class="btn btn-ttc" name="boton_registro">
						<a href="index.php">
						<input id="boton-form-registro" type="button" value="Login" class="btn btn-ttc" onclick="">
						</a>
					</div><!-- form-group -->


				</form>
				

			</div><!-- form-cont -->
		</div><!-- panel-registro class panel panel-default -->
	</div><!-- container -->
</section>
	
</body>
</html>


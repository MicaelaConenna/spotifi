<?php

require_once("clases/BaseDatos.php");
$baseDatos=new BaseDatos("localhost","spotifi");//Creo la base de datos
$tk=$_GET['tk'];


$sql="select * from usuario where token='$tk'";

$consulta=mysqli_query($baseDatos->conexion,$sql) or die ("No se pudo realizar la insercion de datos en la base de datos");

if(mysqli_num_rows($consulta)==0){
		
	$mensaje= "Lo sentimos, pero no se pudo completar el registro.<br/>
		Intentelo nuevamente";
}else{
	$fila=mysqli_fetch_assoc($consulta);
	$email=$fila['email'];
	$id_usuario=$fila['id_usuario'];
	
	
	$sql="update usuario set estado_registro=1 where id_usuario=$id_usuario";
	$consulta=mysqli_query($baseDatos->conexion,$sql) or die ("No se pudo realizar la insercion de datos en la base de datos");
	session_start();

     				$_SESSION['log']=1;
					$_SESSION['admin']=$fila['es_admin'];
					$_SESSION['nombre']=$fila['nombre'];
					$_SESSION['id']=$fila['id_usuario'];

     				setcookie('user',$email,time()+(86400*20),"/");

     				$mensaje="Bienvenido a Spotify ".$fila['nombre'].'<br /><a href="principal.php">Ingresar al sitio</a>';

			     
	
}	



?>


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
			
				<?php echo $mensaje; ?>
			</div><!-- form-cont -->
		</div><!-- panel-login class panel panel-default -->
	</div><!-- container -->
</section>
	
</body>
</html>

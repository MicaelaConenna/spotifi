<?php 
 session_start();
require_once("/clases/BaseDatos.php");
 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Spotify</title>
    <link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/funcionesReproductor.js"></script>
	<link rel="stylesheet" href="estilos/estilos_r.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-sm-9">
            	
            	<div class="row  bg-primary">
                	<div class="col-sm-12 bg_blanco">
                    	
                	<form>
                        <div class="col-sm-12">
                        	<div class="row menu_iconos">
                                <div class="col-sm-1"><img class="img-responsive" src="imagenes/play.png" /></div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                      <input type="text" class="form-control" placeholder="Buscar">
                                      <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Ir</button>
                                      </span>                                     
                                    </div><!-- /input-group -->
                                  </div><!-- /.col-lg-6 -->
                                 
                                  <div class="col-sm-5">
                                  		 <ul class="nav nav-pills">
                                         <?php
										 if(isset($_SESSION['id'])){
										 ?>
                                          <li role="presentation"><a title="Mi cuenta" href="mi_cuenta.php">Bienvenido/a <?php echo $_SESSION['nombre']; ?></a></li>
                                          <li role="presentation"><a title="?" href="#"><img src="imagenes/icono_nube.png" class="img-responsive" /></a></li>			<li role="presentation" class="dropdown">
                                          <a title="Playlist" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                <span><img src="imagenes/corchea.png" class="img-responsive" /></span>
                                                <span class="caret"></span>
                                              </a>
                                              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                <li><a href="#">Crear Playlist</a></li>
                                                <li><a href="#">Importar/exportar</a></li>
                                               
                                              </ul>
                                          
                                           </li>
                                           <?php
										   if(isset($_SESSION['admin']) && $_SESSION['admin']!=0){
										   ?>
                                          <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>	
                                          <?php
										   }//si es admin
										   
										 }else{// si esta logueado
										  ?>
                                          <a href="index.php">Iniciar sesión</a> |  <a href="registro.php">Registrarse</a>
                                          <?php
										 }
										  ?>
                                        </ul>
                                  
                                  </div>
                                 
                                </div>
                            </div><!-- /.row -->                            
                        </form>
                        </div>
                    </div> 
                    <!-- Fila playlist-->
                    <div class="row">
                    	<div class="col-sm-4 bg_blanco">
                        	<div class="row">
                            	<div class="col-sm-12 bg_gris">
                                <?php
                                if(isset($_SESSION['log'])){
                                
								?>
                                	<h3>Mis Playlist</h3>
                                    <ul class="list-unstyled alto_lista_lista">
                                    <?php
									$id=$_SESSION['id'];
									$baseDatos=new BaseDatos("localhost","spotifi");
									$sql="select * from playlist where id_usuario=$id";
									$consulta=mysqli_query($baseDatos->conexion,$sql) or die ("No se pudo realizar la insercion de datos en la base de datos");
									while($fila=mysqli_fetch_assoc($consulta)){	
									?>
                                    	<li><a href="?id=<?php echo $fila['id_playlist']; ?>"> <span class="glyphicon glyphicon-play" aria-hidden="true"></span> <?php echo $fila['nombre']; ?></a></li>
                                        <?php
									}
										?>
                                       
                                    </ul>
                                    <h3>Favoritas</h3>
                                    <ul class="list-unstyled alto_lista_lista">
                                    <?php
									$sql="select favorita.*, playlist.nombre
									 from favorita, playlist 
									 where favorita.id_playlist=playlist.id_playlist
									 AND favorita.id_usuario=$id";
									$consulta=mysqli_query($baseDatos->conexion,$sql) or die ("No se pudo realizar la insercion de datos en la base de datos");
									while($fila=mysqli_fetch_assoc($consulta)){	
									?>
                                    	<li><a href="?id=<?php echo $fila['id_playlist']; ?>"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> <?php echo $fila['nombre']; ?></a><li>
                                        <?php
									}
										?>
                                    </ul>
                                    <?php
								}else{//si no esta logueado mostramos otra cosa
									?>
                                 
                                    <?php
								}// fin del elsee
									?>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 bg_blanco">
                        	<div class="row">
                            	<div class="col-sm-12 contenedor_lista">
                                <?php
								if(isset($_GET['id'])){
									$id=$_GET['id'];
									$sql="select * from playlist where id_playlist=$id";
									$consulta=mysqli_query($baseDatos->conexion,$sql) or die ("No se pudo realizar la insercion de datos en la base de datos");
									$fila=mysqli_fetch_assoc($consulta);
									
								?>
                                <img width="70" src="fotos_playlist/<?php echo $fila['foto'] ?>" /><h3><?php echo $fila['nombre'] ?></h3>
                                <div id="reproductorBox">
   </div>
   <select  id = "selectTrack" multiple onchange="cambiarTrack(this.options[this.selectedIndex]);">
   	<?php
	$id=$_GET['id'];
	$baseDatos=new BaseDatos("localhost","spotifi");
									echo $sql="select cancion_playlist.*, cancion.*
									  from cancion_playlist, cancion 
									  where cancion.id_cancion=cancion_playlist.id_cancion
									  AND cancion_playlist.id_playlist=$id";
									$consulta=mysqli_query($baseDatos->conexion,$sql) or die ("No se pudo realizar la insercion de datos en la base de datos");
									while($fila=mysqli_fetch_assoc($consulta)){	
	?>   
      <option path="mp3/<?php echo $fila['archivo']; ?>"><?php echo $fila['titulo'] ?></option>
      <?php
								}
	  ?>
      
   </select>
   <script>cargarReproductor();</script>
								
                                <?php
								}else{
								?>
								<div class="row">
                                	<div class="col-sm-6">
                                    	<h4 class="alinear_centro"><span class="glyphicon glyphicon-play" aria-hidden="true"></span> Playlist más reproducidas</h4>
                                        <ul class="list-unstyled">
                                    <?php
									
									$baseDatos=new BaseDatos("localhost","spotifi");
									$sql="select * from playlist order by cantidad_reproduccion DESC limit 5";
									$consulta=mysqli_query($baseDatos->conexion,$sql) or die ("No se pudo realizar la insercion de datos en la base de datos");
									while($fila=mysqli_fetch_assoc($consulta)){	
									?>
                                    	<li><a href="?id=<?php echo $fila['id_playlist']; ?>"> <span class="glyphicon glyphicon-play" aria-hidden="true"></span> <?php echo $fila['nombre']; ?></a></li>
                                        <?php
									}
										?>
                                       
                                    </ul>
                                    </div>
                                    <div class="col-sm-6">
                                    	<h4 class="alinear_centro"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Playlist más votadas</h4>
                                        <ul class="list-unstyled">
                                    <?php
									
									$baseDatos=new BaseDatos("localhost","spotifi");
									$sql="SELECT voto.id_playlist, COUNT(*) cantidad, playlist.*
									FROM voto, playlist
									WHERE voto.id_playlist=playlist.id_playlist
									GROUP BY voto.id_playlist
									order by cantidad DESC limit 5";
																		$consulta=mysqli_query($baseDatos->conexion,$sql) or die ("No se pudo realizar la insercion de datos en la base de datos");
									while($fila=mysqli_fetch_assoc($consulta)){	
									?>
                                    	<li><a href="?id=<?php echo $fila['id_playlist']; ?>"> <span class="glyphicon glyphicon-play" aria-hidden="true"></span> <?php echo $fila['nombre']; ?></a></li>
                                        <?php
									}
										?>
                                       
                                    </ul>
                                        
                                    </div>
                                </div>
                                 <?php
								}
								?>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <!-- fin Fila Playlist -->
                     
                </div>          
            <?php
				if(isset($_SESSION['id'])){
			?>
        	<div class="col-sm-3">
            	<h3>Seguiendo a</h3>
                <?php
				$id=$_SESSION['id'];
				$baseDatos=new BaseDatos("localhost","spotifi");
									$sql="SELECT seguidor_usuario.*, usuario.* 
									FROM seguidor_usuario, usuario
									WHERE seguidor_usuario.id_usuario=usuario.id_usuario
									AND seguidor_usuario.id_seguidor=$id";
																		$consulta=mysqli_query($baseDatos->conexion,$sql) or die ("No se pudo realizar la insercion de datos en la base de datos");
									while($fila=mysqli_fetch_assoc($consulta)){	
				?>
                <p><?php echo $fila['nombre']; ?></p>
                <?php
									}
				?>
                <h3>Seguidores</h3>
                 <?php
				$id=$_SESSION['id'];
				$baseDatos=new BaseDatos("localhost","spotifi");
									$sql="SELECT seguidor_usuario.*, usuario.* 
									FROM seguidor_usuario, usuario
									WHERE seguidor_usuario.id_seguidor=usuario.id_usuario
									AND seguidor_usuario.id_usuario=$id";
																		$consulta=mysqli_query($baseDatos->conexion,$sql) or die ("No se pudo realizar la insercion de datos en la base de datos");
									while($fila=mysqli_fetch_assoc($consulta)){	
				?>
                <p><?php echo $fila['nombre']; ?></p>
               <?php
									}
			   ?> 
            </div>
            <?php
				}
			?>
         </div>
     </div>
   
</body>
</html>
<?php 
 session_start();
	if (!isset($_SESSION['log'])) {
		session_destroy();
		echo"<script language='javascript'>window.location='index.php'</script>;";
 }
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<p>Esta es la pagina principal </p>	
</body>
</html>
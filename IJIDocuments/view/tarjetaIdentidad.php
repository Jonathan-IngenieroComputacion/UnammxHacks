<?php
require_once '../config/config.php';
require_once '../model/conexion.php';
$coneccion=new PDO('mysql:dbname=ijidocument;host=127.0.0.1','root','');
$sql="SELECT * FROM usuarios WHERE ID = :id";
$consulta=$coneccion->prepare($sql);
$consulta->execute(array(':id'=> $_SESSION['usuario']['id']));
$resultado = $consulta->fetch();

//die();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarjeta de Identidad</title>
    <link rel="stylesheet" href="../source/stile/EstiloTar.css">
</head>
<body>
	<div class="tarjeta">
		<h1>Tarjeta de identidad</h1>
		<div class="foto">
			<p class="fotito">Foto</p>
			<img class="imagen" src="../source/users/<?=$_SESSION['usuario']['nombre']?>/IMAGE/Fotografia.jpeg" alt="">
		</div>
		<p class="datos">
			Apellidos:<?=$resultado['apellidos']?>
			<br><br>
			Nombre:<?=$resultado['nombre']?>
			<br><br>
			CURP:<?=$resultado['curp']?>
			<br><br>
			Fecha de Nacimiento:<?=$resultado['nacimiento']?>
			<br><br>
			Correo:<?=$resultado['correo']?>
			<br><br>
			Domicilio:<?=$resultado['domicilio']?>
		</p>
	</div>
</body>
</html>
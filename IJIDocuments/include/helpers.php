<?php
function mostrarError($errores,$campo){
	$alerta = "";
	if(isset($errores[$campo]) && !empty($campo)){
		$alerta = $errores[$campo];
	}
	return $alerta;
}
function mostrarDatos($errores,$campo){
	$dato = "";
	if(isset($errores[$campo]) && !empty($campo)){
		$dato = $errores[$campo];
	}
	return $dato;
}
function borrarErrores(){

	if(isset($_SESSION['errores'])){

		unset($_SESSION['errores']);
	}
}
?>
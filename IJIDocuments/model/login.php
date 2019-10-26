<?php   
require_once '../config/config.php';
require_once 'conexion.php';
/*Si ya tiene un inicio de sesion regresa a entradas*/
if (isset($_SESSION['usuario'])) {
	header('Location: ../view/documents.php');
	die();
}
if (isset($_POST)) {
	/*Array errores*/
	$errores_log = array();
	$datos_log = array();
	$usuario = array();
	$id = false;
	$contra_validado = false;
	$correo_validado = false;

	$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING) : '';
	$password = isset($_POST['password']) ? trim($_POST['password']) : '';

	if(!empty($email) && filter_var($email , FILTER_VALIDATE_EMAIL)){
		$correo_validate = true;
		$correo = $conexion->prepare('SELECT * FROM usuarios WHERE correo = :email LIMIT 1');
		$correo->execute(array(':email' => $email));
		$resultado_correo = $correo->fetch();
		if ($resultado_correo !== false) {
			$correo_validado = true;
			$id = $resultado_correo['ID'];

		}else{
			$errores_log['email'] = 'Email incorrecto.';
		}
	}else{
		$errores_log['email'] = 'Ingrese un email.';
	}

	if (!empty($password)) {
		$password_validado = true;
		$contra = $conexion->prepare("SELECT * FROM usuarios WHERE correo = :email LIMIT 1");
		$contra->execute(array(':email' => $email));
		$resultado_password = $contra->fetch();
		$verify = password_verify($password, $resultado_password['password']);
		if ($verify) {
			$contra_validado = true;
		}else{
			$errores_log['password'] = 'Contraseña incorrecta';
		}
	}else{
		$errores_log['password'] = 'Ingrese una contraseña';
	}

	$datos_log['email'] = $email;

	$busqueda_user = $conexion->prepare("SELECT * FROM usuarios WHERE ID = :id LIMIT 1");
	$busqueda_user->execute(array(':id' => $id));
	$resultado_busqueda = $busqueda_user->fetch();

	$nombre_Array = $resultado_busqueda['nombre'];
	$apellidos_Array = $resultado_busqueda['apellidos'];
	$usuario['nombre'] = $nombre_Array;
	$usuario['apellidos'] = $apellidos_Array;

	if (count($errores_log) == 0) {
		if ($contra_validado == true && $correo_validado == true) {
			$_SESSION['usuario'] = $usuario;
			header('Location: ../view/documents.php');
		}
	}else{
		$_SESSION['datos_log'] = $datos_log;
		$_SESSION['errores_log'] = $errores_log;
		header('Location: ../index.php');
	}
}
?>
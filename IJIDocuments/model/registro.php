<?PHP 
require_once '../config/config.php';
require_once '../model/conexion.php';

if (isset($_POST)) {
	// Array de errores
	$errores = array();

	/*Obtener valores*/
	$name = isset($_POST['nombre']) ? filter_var(trim($_POST['nombre']), FILTER_SANITIZE_STRING) :false;
	$apellidos = isset($_POST['apellidos']) ? filter_var(trim($_POST['apellidos']), FILTER_SANITIZE_STRING) :false;
	$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING) :false;
	$password = isset($_POST['password']) ? filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING) :false;
	$password2 = isset($_POST['password2']) ? filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING) :false;
	$curp = isset($_POST['curp']) ? filter_var(trim($_POST['curp']), FILTER_SANITIZE_STRING) :false;
	$rfc = isset($_POST['rfc']) ? filter_var(trim($_POST['rfc']), FILTER_SANITIZE_STRING) :false;
	$fecha = isset($_POST['fecha']) ? date('Y-m-d',strtotime($_POST['fecha'])) : false;
	$edad = isset($_POST['edad']) ? $_POST['edad'] : false;
	$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : false;
	$nacionalidad = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : false;
	$estadoCivil = isset($_POST['estado']) ? $_POST['estado'] : false;
	$domicilio = isset($_POST['domicilio']) ? filter_var(trim($_POST['domicilio']), FILTER_SANITIZE_STRING) : false;
	/*Validando nombre*/
	if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)){
		$name_validado = true;
	}else{
		$errores['name'] = 'Ingrese un nombre valido.';
	}

	/*Validando apellidos*/
	if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
		$apellidos_validados = true;
	}else{
		$errores['apellidos'] = 'Ingrese los apellidos de forma correcta valido.';
	}
	
	if(!empty($domicilio)){
		$apellidos_validados = true;
	}else{
		$errores['domicilio'] = 'Ingrese un domicilio valido.';
	}

	/*Validando curp*/
	if(!empty($curp)){
		$curp_validado = true;
	}else{
		$errores['curp'] = 'Ingrese el codigo de curp';
	}
	/*Validando rfc*/
	if(!empty($rfc)){
		$rfc_validado = true;
	}else{
		$errores['rfc'] = 'Ingrese el codigo de rfc';
	}


	/*Validando email*/
	if( !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email_validado = true;

		/*Consulta para verificar datos repetidos*/
		$comprobar_email = $conexion->prepare('SELECT * FROM usuarios WHERE email = :email LIMIT 1');
		$comprobar_email->execute(array(':email' => $email));

		// El metodo fetch nos va a devolver el resultado o false en caso de que no haya resultado.
		$resultado_email = $comprobar_email->fetch();
		// Si resultado es diferente a false entonces significa que ya existe el usuario.
		if ($resultado_email != false) {
			$errores['email'] = 'El email ya existe <br/>';
		}
	}else{
		$errores['email'] = 'Ingrese un email validos <br/>';
	}

	/*Validando password*/
	if(!empty($password)){
		if (!empty($password2)) {
			if($password == $password2){
				$passwords_validate = true;
			}else{
				$errores['passwords'] = 'Las contraseñas no son iguales.';
			}
		}else{
			$errores['password2'] = 'Repita la contraseña';
		}
	}elseif(empty($password) && empty($password2)){
		$errores['password2'] = 'Repita la contraseña';
		$errores['password'] = 'Ingrese la contraseña.';
	}elseif(empty($password) && !empty($password2)){
		$errores['password'] = 'Ingrese la contraseña.';
	}
	$datos = array();
	$datos['name'] = $name;
	$datos['apellidos'] = $apellidos;
	$datos['email'] = $email;

	/*Ingresando Datos*/
	$guardar_usuario = false;

	if (count($errores) == 0 && $accedido == true) {
		$guardar_usuario = true;

		//Cifrar Contraseña
		$password_segurity = password_hash($password, PASSWORD_BCRYPT ,	['cost' => 4]);
		$sql = "INSERT INTO usuarios VALUES(null, :nombre, :apellidos, :email, :password_segurity , :curp, :rfc, :nacimiento, :domicilio, :edad, :sexo, :nacionalidad, :estadocivil;";
		$insertar = $conexion->prepare($sql);
		$insertar->execute(array(':nombre' => $name, ':apellidos' => $apellidos, ':email' => $email, ':password_segurity' => $password_segurity, ':curp' => $curp, ':rfc' => $rfc, ':nacimiento' => $fecha, ':domicilio' => $domicilio, ':edad' => $edad, ':sexo' => $sexo, ':nacionalidad' => $nacionalidad, ':estadocivil' => $estadoCivil));
		if($insertar){
			header('Location: ../login_admin.php');
		}else{
			$_SESSION['errores']['general'] = 'Fallo al guardar el usuario!!';
			header('location: ../login_admin.php');
		}

	}else{
		$_SESSION['datos'] = $datos;
		$_SESSION['errores'] = $errores;
		header('Location: ../view/session/registro.php');
	}
}
?>
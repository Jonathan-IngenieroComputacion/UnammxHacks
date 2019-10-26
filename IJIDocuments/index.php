<?PHP require_once 'config/config.php'; ?>
<?PHP require_once 'model/conexion.php';?>
<?PHP require_once 'include/helpers.php';?>
<?php
if (isset($_SESSION['usuario'])) {
	header('Location: view/documents.php');
	die();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8"/>
	<title>Login</title>
	<link rel="stylesheet" href="source/stile/Estilos.css">
	<link rel="stylesheet" href="source/stile/normalize.css">
</head>
<script type="text/javascript">
		function Register(){
			document.getElementById("log").style.display = "none";
			document.getElementById("regis").style.display = "block";
		}
		function Login(){
			document.getElementById("log").style.display = "block";
			document.getElementById("regis").style.display = "none";
		}
</script>
<body>
	<img class="logo" src="source/Image/Logo.png">
	<div id="log" class="bloque login">
		<h3>Ingresar</h3>
		<form action="model/login.php" method="POST"> 
			<label for="email">Email:</label>
			<input class="date" type="email" name="email" value="<?PHP echo isset($_SESSION['errores_log']) ? mostrarDatos($_SESSION['datos_log'], 'email') : ''; ?>"/>
			<?PHP echo isset($_SESSION['errores_log']) ? mostrarError($_SESSION['errores_log'], 'email') : '' ?>

			<label for="password">Contraseña:</label>
			<input class="date" type="password" name="password" />
			<?PHP echo isset($_SESSION['errores_log']) ? mostrarError($_SESSION['errores_log'], 'password') : '' ?>

			<input type="submit" value="Entrar" />
		</form>
		<p><a onclick="Register()">Registrar</a></p>
	</div>
	<div id="regis" class="bloque register">

							<!--Registro-->
		<!--Mostrar Errores-->
		<?php if(isset($_SESSION['errores'])) : ?>
			<?php echo "<script>"; echo "Register()"; echo "</script>"?>
		<?php endif;?>
		<h3>Registro</h3>
		<form action="model/registro.php" method="POST"> 
			<label for="nombre">Nombre:</label>
			<input class="date" type="text" name="nombre" value="<?PHP echo isset($_SESSION['errores']) ? mostrarDatos($_SESSION['datos'], 'name') : ''; ?>" />
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'name') : ''; ?>

			<label for="apellidos">Apellidos:</label>
			<input class="date" type="text" name="apellidos" value="<?PHP echo isset($_SESSION['errores']) ? mostrarDatos($_SESSION['datos'], 'apellidos') : ''; ?>"/>
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

			<label for="email">Email:</label>
			<input class="date" type="email" name="email" value="<?PHP echo isset($_SESSION['errores']) ? mostrarDatos($_SESSION['datos'], 'email') : ''; ?>"/>
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

			<label for="password">Contraseña:</label>
			<input class="date" type="password" name="password" />
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

			<label for="password">Confirmar Contraseña:</label>
			<input class="date" type="password" name="password2" />
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password2') : ''; ?>
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'passwords') : ''; ?>

			<label for="curp">Ingrese Curp:</label>
			<input class="date" type="text" name="curp" value="<?PHP echo isset($_SESSION['errores']) ? mostrarDatos($_SESSION['datos'], 'curp') : ''; ?>" />
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'curp') : ''; ?>

			<label for="rfc">Ingrese RFC:</label>
			<input class="date" type="text" name="rfc" value="<?PHP echo isset($_SESSION['errores']) ? mostrarDatos($_SESSION['datos'], 'rfc') : ''; ?>"/>
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'rfc') : ''; ?>

			<label for="fecha">Ingrese su fecha de nacimiento:</label>
			<input type="date" name="fecha" min="1950-01-01" max="2019-10-26" value="<?php echo date('Y-m-d'); ?>">

			<label for="">Domicilio:</label>
			<input class="date" type="text" name="domicilio" value="<?PHP echo isset($_SESSION['errores']) ? mostrarDatos($_SESSION['datos'], 'rfc') : ''; ?>"/>
			<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'domicilio') : ''; ?>
			
			<label for="edad">Ingrese su edad:</label>
			<select name = "edad">
				<?php for($i = 1; $i<=100; $i++): ?>
				<option value="<?= $i ?>"><?= $i ?></option>
				<?php endfor; ?>
			</select>

			<label for="sexo">Sexo:</label>
			<select name = "sexo">
				<option value="hombre">Hombre</option>
				<option value="mujer">Mujer</option>
				<option value="indistinto">Indistinto</option>
			</select>

			<label for="nacionalidad">Nacionalidad:</label>
			<select name = nacionalidad>
				<option value="Mexicana">Mexicana</option>
				<option value="Extranjera">Extranjera</option>
			</select>

			<label for="estado">Estado Civil:</label>
			<select name = estado>
				<option value="soltero">Soltero</option>
				<option value="casado">Casado</option>
				<option value="viudo">Viudo</option>
			</select>

			<input type="submit" name="submit" value="Registrar" />
		</form>
		<?php borrarErrores(); ?>
		<p><a onclick="Login()">Login</a></p>
	</div>
</body>
</html>
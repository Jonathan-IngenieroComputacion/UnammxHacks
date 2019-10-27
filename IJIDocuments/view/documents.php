<?PHP
require_once '../config/config.php';
require_once '../model/conexion.php';
$sql = "SELECT * FROM usuarios WHERE ID = :id;";
$iduser1 = $_SESSION['usuario']['id'];
$consulta = $conexion->prepare($sql);
$consulta->execute(array('id' => $iduser1));
$resultados = $consulta->fetch();
$usuario=$_SESSION['usuario']['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>IJIDocument</title>
    <link rel="stylesheet" type ="text/css" href="../source/stile/EstiloPag.css">
    <link rel="stylesheet" href="../source/stile/normalize.css">
</head>	
<style>
#header {
    margin:auto;
    width:1400px;
    font-family:Arial, Helvetica, sans-serif;
}
ul, ol {
    list-style:none;
}
.nav > li {
    float:left;
}
.nav li a {
    background-color: #A40606;
    color:#fff;
    text-decoration:none;
    padding:20px 125px;
    display:block;
}
.nav li a:hover {
    background-color: #5BC0BE;
}
.nav li ul {
    z-index:1;
    display:none;
    position:absolute;
    min-width:140px;
}
.nav li:hover > ul {
    display:block;
}
.nav li ul li {
    position:relative;
}
.nav li ul li ul {
    right:14 px;
    top:0px;
}
.ima{
position:absolute;
top:2%;
left:2%;
}
a{
    color: #fff;
}
    </style>	
<body>	
	<header>
		<div class="cuadrodefondo"></div>
    </header>
    <div id="header">
			<ul class="nav">
            
				<li><a href="documents.php"></a></li>
				<li><a href="">Servicios</a>
					<ul>
						<li><a href="">Acta de nacimiento</a></li>
						<li><a href="">Curp</a></li>
						<li><a href="">INE</a></li>
						<li><a href="">Comprobante de domicilio</a>
						<li><a href="">Cartilla militar</a>
						<li><a href="">RFC</a>
						</li>
					</ul>
				</li>
				<li><a href="">Perfil</a>
					<ul>
						<li><a href="">Configuracion</a></li>
						<li><a href="">Codigo QR</a></li>
						<li><a href="SubirArchivo.php">Agregar nuevos documentos</a></li>
						<li><a href="../model/cerrar.php">Cerrar Sesion</a></li>
					</ul>
				</li>
				<li><a href="tarjetaIdentidad.php">Hoja de identidad</a></li>
			</ul>
        </div>
        <br>
    <a href="documents.php"><img src="../source/Image/Logo.png" height = "18%" width = "20%" class="ima"/></a>
	<br><br><br><br><br><br>
	<div class="botoncurp">Curp:<?=$resultados['curp']?><br><br>
	<a href="https://www.gob.mx/curp/">Actualizar Documento</a><a href="../model/descargar.php?file=../source/users/<?php echo $usuario; ?>/<?php echo "PDF"; ?>/<?php echo "curp"; ?>.pdf"><button>Descargar</button></a>
	</div> 
	<br><br><br><br><br><br><br><br><br>
	<div class="botoncurp">RFC:<?=$resultados['rfc']?><br><br>
	<a href="https://www.sat.gob.mx/tramites/operacion/28753/obten-tu-rfc-con-la-clave-unica-de-registro-de-poblacion-(curp)">Actualizar Documento</a><a href="../model/descargar.php?file=../source/users/<?php echo $usuario; ?>/<?php echo "PDF"; ?>/<?php echo "rfc"; ?>.pdf"><button>Descargar</button></a>
	</div>
	<br><br><br><br><br><br><br><br><br>
	<div class="botondoc">Acta de nacimiento<br><br>
	<a href="https://www.gob.mx/tramites/ficha/expedicion-de-la-copia-certificada-del-acta-de-nacimiento-en-linea/RENAPO187">Actualizar Documento</a><a href="../model/descargar.php?file=../source/users/<?php echo $usuario; ?>/<?php echo "PDF"; ?>/<?php echo "acta"; ?>.pdf"><button>Descargar</button></a>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<div class="botonine">Ine<br><br>
	<a href="https://www.ine.mx/renovacion-credencial-votar-18/">Actualizar Documento    </a><a href="../model/descargar.php?file=../source/users/<?php echo $usuario; ?>/<?php echo "PDF"; ?>/<?php echo "INE"; ?>.pdf"><button>Descargar</button></a>
	</div><br>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../source/stile/Style.css">
	<link rel="stylesheet" href="../source/stile/normalize.css">
    <title>Subir Archivo</title>
    <style>
        body{
            background = #0A100D;
        }
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
    </style>
</head>
<body>
<form action="../model/SubirArchivo.php" id="contact_form abajo" method="POST" enctype="multipart/form-data">
        <label for="subject">Subir Archivo</label><br/><br/>    
        <input type="file"  name="archivo"><br/><br/>
        <label for="subject"class = "label1">Selecciona la categoria</label><br/><br/>
        <select name="categoria" id="subject_input">
            <option value="curp">Curp</option>
            <option value="INE">INE</option>
            <option value="rfc">RFC</option>
            <option value="acta">Acta de Nacimiento</option>
            <option value="licencia">Licencia</option>
            <option value="fotografia">Fotografia infantil</option>
        </select><br/>
        <input type="submit" id="form_button" value="Enviar">
    </form>
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
						<li><a href="">Agregar nuevos documentos</a></li>
						<li><a href="../model/cerrar.php">Cerrar Sesion</a></li>
					</ul>
				</li>
				<li><a href="tarjetaIdentidad.php">Hoja de identidad</a></li>
			</ul>
        </div>
        <br>
    <a href="documents.php"><img src="../source/Image/Logo.png" height = "18%" width = "20%" class="ima"/></a>
</body>
</html>
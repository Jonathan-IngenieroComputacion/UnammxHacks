<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../source/stile/estilo.css">
	<link rel="stylesheet" href="../source/stile/normalize.css">
    <title>Subir Archivo</title>
</head>
<body>
    <form action="../model/SubirArchivo.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="archivo">
        <select name="categoria">
            <option value="curp">Curp</option>
            <option value="rfc">RFC</option>
            <option value="acta">Acta de Nacimiento</option>
            <option value="licencia">Licencia</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
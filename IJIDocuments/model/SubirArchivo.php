<?php
require_once '../config/config.php';
require_once 'conexion.php';
$usuario = $_SESSION['usuario'];
$user = $usuario['nombre'];
if(!is_dir("../source/users/$user")){
    echo 'mundo';
    mkdir("../source/users/$user",0777) or die('No se puede crear la carpeta');
}   
if(!is_dir("../source/users/$user/PDF")){
    mkdir("../source/users/$user/PDF",0777) or die('No se puede crear la carpeta');
}
if(!is_dir("../source/users/$user/IMAGE")){
    mkdir("../source/users/$user/IMAGE",0777) or die('No se puede crear la carpeta');
}
$categoria = $_POST['categoria'];
$archivo = $_FILES['archivo'];
$nombre = $archivo['tmp_name'];
$tipo = $archivo['type'];
if($tipo == 'application/pdf'){
    move_uploaded_file($nombre,'../source/users/'.$user."/PDF/$categoria.pdf");
    header("Location: ../view/documents.php");
}else if($tipo == 'image/jpeg'){
    move_uploaded_file($nombre,'../source/users/'.$user."/IMAGE/$categoria.jpeg");
    header("Location: ../view/documents.php");
}else if($tipo == 'image/png'){
    move_uploaded_file($nombre,'../source/users/'.$user."/IMAGE/$categoria.png");
    header("Location: ../view/documents.php");
}else if($tipo == 'image/jpg'){
    move_uploaded_file($nombre,'../source/users/'.$user."/IMAGE/$categoria.jpg");
    header("Location: ../view/documents.php");
}else{
    echo 'Este tipo de archivo no esta admitido';
    header('Refresh: 2; url = ../view/SubirArchivo.php');
}
?>
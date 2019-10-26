<?PHP
session_start();
try{
    $conexion = new PDO(DNS,USER,PASSWORD);
}catch(PDOException $e){
    echo 'Falló la conexión: ' . $e->getMessage();
}
?>
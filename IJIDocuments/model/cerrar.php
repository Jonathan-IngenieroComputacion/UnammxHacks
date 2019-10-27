<?PHP
session_start();
session_destroy();
$_SESSION = array();

header('Location: ../index.php');
die();
?>
<?php 
session_start();
include_once 'conexion.php';

$usuario = $_GET['usuario'];
$contrasena = $_GET['contrasena'];
$contrasena2 = $_GET['contrasena2'];

$sql_usser = 'SELECT * FROM usuario where nombre=?  and estado=1';
$sentencia_usser = $pdo->prepare($sql_usser);
$sentencia_usser->execute(array($usuario));
$resultado = $sentencia_usser->fetch();

if(!$resultado){
   die();
}

if (password_verify($contrasena,$resultado['contrasena'])) {
    echo '¡La contraseña es válida! <br>';
    $_SESSION['admin'] = $usuario;
    header('location:template.php');
} else {
    echo 'La contraseña no es válida.';
    die();
}

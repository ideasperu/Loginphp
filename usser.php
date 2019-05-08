<?php 
include_once 'conexion.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];

/* setencias mysql PDO consultar usuario para no repetir*/
$sql_usser = 'SELECT * FROM usuario where nombre=? and estado=1';
$sentencia_user = $pdo->prepare($sql_usser);
$sentencia_user->execute(array($usuario));
$resultado_usser =$sentencia_user->fetch();

//var_dump($resultado_usser); datos del formulario
if ($resultado_usser) {
    echo 'el usuario ya existe en la base de datos';
    die();
}else{

    $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    //verificar contrasena con la encryptada
    if (password_verify($contrasena2, $contrasena)) {
        //si mi contrasena es valida, paso a insertar usuario
        if ($_POST) {
            # code...
            $sql_agregar = 'INSERT INTO usuario(nombre,contrasena,estado) values (?,?,1)';
            $sentencia_agregar = $pdo->prepare($sql_agregar);

            if ($sentencia_agregar->execute(array($usuario,$contrasena))) {
                # code...
                //mensjae de agregar
            }else{
                //mensaje, error al agregar usuario
            }

            //finalizar pdo consultar musql 
            $sentencia_agregar=null;
            $pdo=null;
            header('location:usuarios.php');

        }
    }else{ echo 'no coinciden las contraseñas'; }
}


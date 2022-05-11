<?php
// RECOGEMOS LAS VARIBALES DEL FORMULARIO DEL LOGIN.
$nombre = $_POST['nick_usuario'];
$contra = $_POST['contra_usuario'];
// CONEXION CON LA BASE DE DATOS.
$connection = mysqli_connect('localhost', 'root', '', 'bd_ourschool');
// CON ESTA CONSULTA LO QUE HACEMOS ES BUSCAR EN LA BD A VER SI HAY ALGUN USUARIO CON LOS MISMOS VALORES QUE NOS ESTAN PASANDO POR EL FORMULARIO.
$sql = "SELECT * FROM tbl_usuario WHERE nombre_usuario = '{$nombre}' AND contra_usuario = '{$contra}';" ;

$result = mysqli_query($connection, $sql);
$num = mysqli_num_rows($result); // PASAMOS EL VALOR DE UN ARRAY A UN STRING.
// SI NOS DEVUELVE UN 1 SERA QUE EL USUARIO QUE NOS ESTAN ENTRANDO SI QUE EST EN LA BD.
if($num == 1){
    session_start();
    $_SESSION['nombre_usu'] = $nombre; // CREAMOS LA SESION HACIENDO QUE ESTA FUNCIONE POR EL NOMBRE DEL USUARIO, QUE ES POR LO QUE HACEMOS EL LOGIN, TAMBIEN SE PODRIA HACER POR EL CORREO.
    header('Location: ../view/actividades.php');
} else { // SI NO ES UN 1 REDIRIGIREMOS LE DIREMOS AL USUARIO QUE PRUEBE OTRA VEZ YA QUE ESE USUARIO Y PASSWORD NO ESTAN BIEN, ESTO LO PASAREMOS POR LA ID A LOGIN.PHP CON UN MENSAJE '?LOGIN=ERROR'
    header('Location: ../view/login.php?login=error');
}
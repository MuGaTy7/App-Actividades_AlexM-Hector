<?php
    
$nombre = $_POST['nick_usuario'];
$contra = $_POST['contra_usuario'];

$connection = mysqli_connect('localhost', 'root', '', 'bd_ourschool');

$sql = "SELECT * FROM tbl_usuario WHERE nombre_usuario = '{$nombre}' AND contra_usuario = '{$contra}';" ;

$result = mysqli_query($connection, $sql);
$num = mysqli_num_rows($result);

if($num == 1){
    session_start();
    $_SESSION['nombre_usu'] = $nombre;
    header('Location: ../view/actividades.php');
} else {
    header('Location: ../view/login.php?login=error');
}
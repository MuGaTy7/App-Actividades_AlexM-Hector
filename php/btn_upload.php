<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/fondo.css">
</head>
<body>
    
</body>
</html>
<?php
// INICIAMOS LA SESION
session_start();
// Y AQUI LO QUE HACEMOS ES VER SI HAY SESION INICIADA, SI LA HAY PODREMOS IR AL FORMULARIO PARA SUBIR ACTIVIDADES Y SINO LA HAY NOS REDIRIGIRÁ AL LOGIN.
if(isset($_SESSION["nombre_usu"])){
    header("Location: ../view/subir.actividad.php");
}else{
    header("Location: ../view/login.php");
}

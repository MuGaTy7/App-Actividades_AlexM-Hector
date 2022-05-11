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
<?php

$nombre = $_POST['nick_usuario'];
$correo = $_POST['email_usuario'];
$contra = $_POST['contra_usuario'];

if (empty($nombre) or empty($correo) or empty($contra)) {
    header('Location: ../view/registro.php?registro=vacio');
} else {
    $connection = mysqli_connect('localhost', 'root', '', 'bd_ourschool');

    $correo_encontrado = false;

    $cons = "SELECT correo_usuario FROM tbl_usuario;";
    $comprobar = mysqli_query($connection,$cons);

    foreach ($comprobar as $key => $tabla) {
        foreach ($tabla as $atributo => $email) {
            if ($correo == $email){
                $correo_encontrado = true;
                }
            }
        }
        if (!$correo_encontrado){
            $sql = "INSERT INTO `tbl_usuario` (`nombre_usuario`,`correo_usuario`, `contra_usuario`) VALUES ('$nombre','$correo','$contra')";
            $insert = mysqli_query($connection, $sql);
            ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    function aviso(url) {
                        Swal.fire({
                                title: 'Usuario creado!',
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Volver'
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = url;
                                }
                            })
                    }

                    aviso('../view/login.php');
                </script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <?php
        } else {
        
            ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        function aviso(url) {
                            Swal.fire({
                                    title: 'Ya existe una cuenta con este correo!',
                                    icon: 'warning ',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Volver'
                                })
                                .then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = url;
                                    }
                                })
                        }

                        aviso('../view/registro.php');
                    </script>
                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <?php                       
        }
    }

?>
</body>
</html>
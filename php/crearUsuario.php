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
// GUARDAMOS LOS CAMPOS QUE ENVIAMOS DEL FORMULARIO EN VARIABLES PARA DESPUÉS METERLAS A LA HORA DE INSERTAR UN USUARIO.
$nombre = $_POST['nick_usuario'];
$correo = $_POST['email_usuario'];
$contra = $_POST['contra_usuario'];
// AQUI MIRAREMOS QUE TODOS LOS CAMPOS ESTEN LLENOS, SI HAY ALGUNO VACIO NOS REDIRIGIRA A EL FORMULARIO OTRA VEZ DANDONÓS UN MENSAJE.
if (empty($nombre) or empty($correo) or empty($contra)) {
    header('Location: ../view/registro.php?registro=vacio');
} else {
    // CONEXIÓN CON BD
    $connection = mysqli_connect('localhost', 'root', '', 'bd_ourschool');
    // ESTA VARIABLE COMPROBARA QUE EL CORREO QUE INTRODUCIMOS NO ESTE REPETIDO EN NINGUN OTRO REGITRO DE LS BASE DE DATOS.
    $correo_encontrado = false;
    // SELECIONAMOS TODOS LOS CORREOS DE LA BD
    $cons = "SELECT correo_usuario FROM tbl_usuario;";
    $comprobar = mysqli_query($connection,$cons);
    
    foreach ($comprobar as $key => $tabla) {
        foreach ($tabla as $atributo => $email) {
            if ($correo == $email){ // COMPROBAMOS SI EL CORREO DEL FORMULARIO ES IGUAL QUE ALGUNO DE LA BD
                $correo_encontrado = true; // AQUI PONDREMOS LA VARIBALE CORREO ENCONTRADO EN TRUE.
                }
            }
        }
        if (!$correo_encontrado){ // SI EL CORREO ES NUEVO, ES DECIR NO LO HA ENCONTRADO EN LA BD PROCEDEREMOS A REALIZAR LA CONSULTA DEL INSERT DE DATOS.
            /*
            Insertaremos en la tabla de usuarios todos los datos recogidos del formulario como el nombre, el correo y la contraseña.
            */
            $sql = "INSERT INTO `tbl_usuario` (`nombre_usuario`,`correo_usuario`, `contra_usuario`) VALUES ('$nombre','$correo','$contra')";
            $insert = mysqli_query($connection, $sql);
            ?>
                <!-- SCRIPT PARA REDIRIGIR A EL LOGIN, EN EL CASO DE HABER CREADO EL USUARIO. -->
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
            <!-- SCRIPT PARA REDIRIGIR AL FORMULARIO EN CASO DE QUE EL USUARIO NO SE HAYA CREADO DEBIDO A QUE EL CORREO YA EXISTE. -->
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        function aviso(url) {
                            Swal.fire({
                                    title: 'Ya existe una cuenta con este correo!',
                                    icon: 'warning',
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
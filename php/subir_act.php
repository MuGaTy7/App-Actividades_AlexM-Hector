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
    // RECOGER VARIABLE DEL FORMULARIO DE SUBIR_ACTIVIDAD Y LAS VARIBALES DEL FORMULARIO DE SUBIR.ACTIVIDAD:
    session_start();
    $titulo = $_POST['titulo'];
    $desc = $_POST['descripcion'];
    $foto = $_FILES['foto'];
    $usuario = $_SESSION['nombre_usu'];

    // ENCONTRAR EL ID DEL USUARIO QUE SUBE LA FOTO:
    $connection = mysqli_connect('localhost', 'root', '', 'bd_ourschool');
    $sql1 = "SELECT id_usuario FROM tbl_usuario WHERE nombre_usuario = '$usuario';"; 
    $buscar = mysqli_query($connection, $sql1);
    $row = mysqli_fetch_array($buscar);

    $usuario_fk = $row[0]; // PASARLO DE ARRAY A STRING

    $opcion = $_POST['opcion'];
    $topic = $_POST['topic'];

    if ($opcion == 'true') { // DEPENDIENDO DE LO QUE ENVIEMOS EN OPCION PONDREMOS LA VARIABLE $PUBLIO_PRIVADO EN PUBLICO SI ES TRUE Y EN PRIVADO SI ES FALSE
        $publico_privado = "Publico";
    } else if ($opcion == 'false') { // LO PONDREMOS EN PRIVADO EN EL CASO DE QUE SEA FALSE LO QUE RECIBE. 
        $publico_privado = "Privado";
    }

    $path = "/www/App-Actividades_AlexM-Hector/img"; // PARA SUBIR LA ACTIVIDAD SI QUE PONDREMOS LA RUTA RELATIVA PARA ASI PODER SUBIR LA FOTO DESDE CUALQUIER DIRECTORIO DE NUESTRO PC.
    $destino = $_SERVER['DOCUMENT_ROOT'].$path."/".$foto['name'];

    if(($foto['size']<1000*1024) && ($foto['type']=="image/jpeg" || $foto['type']=="image/png" || $foto['type']=="image/gif")) {
        $exito = move_uploaded_file($foto['tmp_name'], $destino); // AQUI LO QUE HACEMOS ES MOVER LA IMAGEN A LA RUTA ESPECIFICADA ANTERIORMENTE QUE ES LA DE IMG DE NUESTRA ACTIVIDAD.
        if ($exito) {
            // HACEMOS LA CONEXION CON LA BASE DE DATOS Y SUBIMOS LOS DATOS A LA TABLA CORRESPONDIENTE: (tbl_actividad)
            $destino = $foto['name'];
            $connection = mysqli_connect('localhost', 'root', '', 'bd_ourschool');
            /*
            Insertamos en el tabla actividad todos los valores de esta ( el nombre, una descripción, la foto, si es pública o privada , el tema o topic de la actividad y el propio autor) 
            en values pondremos la variables que son estos datos que queremos insertar, las variables están definidas arriba.
            */
            $sql = "INSERT INTO tbl_actividad (nombre_actividad, desc_actividad, foto_actividad, opcion_actividad, topic_actividad, autor_actividad, usuario_fk) VALUES ('$titulo','$desc','$destino','$publico_privado','$topic', '$usuario', $usuario_fk);";
            $insert= mysqli_query($connection, $sql);
            ?>
            <!-- SCRIPT PARA REDIRIGIR A ACTIVIDADES EN EL CASO DE QUE SUBAMOS LA ACTIVIDAD CON ÉXITO -->
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    function aviso(url) {
                        Swal.fire({
                                title: 'Post subido correctamente!',
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
                aviso('../view/actividades.php');
            </script>
        <?php
        }
    } else {
        ?>
        <!-- SCRIPT PARA REDIRIGIR OTRA VEZ AL FORMULARIO DE SUBIR ACTIVIDAD PORQUE HAY ALGO MAL -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function aviso(url) {
                    Swal.fire({
                            title: 'El archivo es demasiado grande o no tiene el formato adecuado',
                            icon: 'error',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Volver'
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = url;
                            }
                        })
                }
                aviso('../view/subir.actividad.php');
            </script>
        <?php
    }
    ?>
</body>
</html>


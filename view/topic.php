<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrado</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.html">#Our School</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                        <li class="nav-item">
                            <a class="nav-link" href="./nosotros.php">Sobre nosotros</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./actividades.php">Actividades</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./mis.actividades.php">Mis actividades</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->

                            <a href='../php/btn_upload.php'><button class='btn btn-light form-control me-1' type='button'><i
                            class='fa-solid fa-arrow-up-from-bracket'></i></button></a>
                            <a href='../php/log_out.php'><button class='btn btn-light form-control ms-1' type='button'>Log out</button></a>
                    </form>
                </div>
            </div>
        </nav>
    
    <?php
    // RECOGEMOS EL TOPIC POR EL QUE HEMOS FILTRADO PARA AHORA MOSTRAR SOLO LAS ACTIVIDADES CON ESE TOPIC:
    $topic_act = $_GET['topic'];
    
    echo "<div class='column-1 padding-m'>";
        echo "<h4 class='padding-m'>Actividades filtradas por - <b>$topic_act</b></h4>";
    echo "</div>";
    
    // CONEXION CON LA BASE DE DATOS:
    $connection = mysqli_connect('localhost', 'root', '', 'bd_ourschool');
    // COMO HEMOS DICHO ANTES EN ESTA CONSULTA LO QUE HAREMOS SERA BUSCAR AQUELLAS ACTIVIDADES, SOLO AQUELLAS, QUE TENGAN EN EL CAMPO TOPIC DE LA BD EL TOPIC QUE HEMOS OBTENIDO DE LA URL.
    $sql = "SELECT * FROM tbl_actividad WHERE topic_actividad = '$topic_act';";
    $actividades_topic = mysqli_query($connection, $sql);

    $ruta = "../img/"; // RUTA RELATIVA

    foreach ($actividades_topic as $actividades) {
        $rutacompleta = $ruta.$actividades['foto_actividad']; // RUTA RELATIVA + NOMBRE DE LA FOTO + EXTENSIÓN
        echo "<div class='column-3 padding-mobile'>";
                    echo "<a href='./actividad.php?id={$actividades['id_actividad']}'><img src='{$rutacompleta}' class='target'></a>";

                    echo "<div style='float: right;' class='padding-m'>";
                        echo "<button class='btn btn-light m-1' type='submit'><i class='fa-solid fa-link'></i></button>";
                        echo "<a href='./actividad_like.php'><button class='btn btn-light m-1' type='submit'><i class='fa-solid fa-heart'></i></button></a>";
                    echo "</div>";
                echo "</div>";
    }
    ?>

</body>
</html>
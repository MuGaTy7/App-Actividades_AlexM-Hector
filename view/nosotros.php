<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre nosotros</title>
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
                        <a class="nav-link active disabled" aria-current="page" href="#">Sobre nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./actividades.php">Actividades</a>
                    </li>

                    <?php
                    session_start(); // INICIAMOS LA SESION
                    // INICIAMOS LA SESION Y BASICAMENTE LO QUE HACEMOS ES COMPROBAR QUE HAYA SESION, SI LA HAY MIS ACTIVIDADES REDIRIGIR?? A MISACTIVIDADES Y SINO HAY SESION REDIRIGIR?? AL LOGIN.
                    if(isset($_SESSION["nombre_usu"])) {
                        echo "<li class='nav-item'>";
                            echo "<a class='nav-link' href='./mis.actividades.php'>Mis actividades</a>";
                        echo "</li>";
                    } else {
                        echo "<li class='nav-item'>";
                            echo "<a class='nav-link' href='./login.php'>Mis actividades</a>";
                        echo "</li>";
                    }
                    ?>

                </ul>
                <form class="d-flex">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                    
                    <a href='../php/btn_upload.php'><button class='btn btn-light form-control me-1' type='button'><i
                        class='fa-solid fa-arrow-up-from-bracket'></i></button></a>
                        <?php
                            // AQUI HACEMOS ALGO PARECIDO A LO DE ARRIBA, SI HAY SESION APRECERA UN BOTON DE LOG OUT Y SINO LA HAY NOS SALDRA EL BOTON DE ACCEDER PARA INICIARLA.
                            if(isset($_SESSION["nombre_usu"])){
                                echo "<a href='../php/log_out.php'><button class='btn btn-light form-control ms-1' type='button'>Log out</button></a>";
                            }else{
                                echo "<a href='../view/login.php'><button class='btn btn-light form-control ms-1' type='button'>Acceder</button></a>";
                            }
                        ?>

                </form>
            </div>
        </div>
    </nav>
    <!-- Topics -->

    <div class="row-c padding-m">
        <div class="column-66 padding-m padding-right">
            <h5>Topics</h5>
            <!-- AQUI EN CADA BOTON LO QUE HACEMOS ES ENVIAR POR LA URL EL TOPIC POR EL QUE QUEREMOS FILTRAR PARA QUE ASI EN TOPIC.PHP PODAMOS FILTRAR POR ESE TOPIC, COMPARANDO EN LA BD AQUELLAS ACTIVIDADES QUE TENGAN ESE ATRIBUTO.  -->
            <a href="./topic.php?topic=matematicas"><button type="button" class="btn btn-primary mt-1">matem??ticas</button></a>
            <a href="./topic.php?topic=informatica"><button type="button" class="btn btn-info mt-1">inform??tica</button></a>
            <a href="./topic.php?topic=deportes"><button type="button" class="btn btn-danger mt-1">deportes</button></a>
            <a href="./topic.php?topic=fisica"><button type="button" class="btn btn-secondary mt-1">f??sica</button></a>
        </div>
    </div>

    <!-- Intro -->
    <header class="text-white flex padding-l">
        <h1 style="color: black;"><strong>#Our School</strong></h1>
    </header>
    <div class="row-c padding-m">
        <div class="column-1 padding-m">
            <h5 style="margin-top: 10px;">Introducci??n a nuestra p??gina web:</h5>
        </div>
        <div class="column-66 padding-m padding-right">
            <!-- <h2><strong>#AppName</strong> es un club para explorar, desarrollar y compartir nuestra creatividad natural</h2> -->
            <h4>OurSchool es una app donde estudiantes y alumnos comparten recursos sobre varias materias. Los usuarios podr??n decir si p??blicaci??n es p??blica con el objetivo de que la vea todo el mundo o privada para que el propio usuario solo pueda acceder a esa actividad en ???Mis actividades???. Creemos que esta aplicaci??n puede ayudar a fomentar una buena relaci??n entre alumnos y profesores, es importante el buen rollo para que la educaci??n sea m??s amena.</h4>
        </div>
        <div style ="padding-top: 0px;" class="column-33 padding-m padding-right">
            <!-- <h2><strong>#AppName</strong> es un club para explorar, desarrollar y compartir nuestra creatividad natural</h2> -->
            <img style="width: 220px;" src="../img/intro.png" alt="">
        </div>
    </div>

    <!-- Random de actividades -->

    <div class="row-c padding-m">
        <div class="column-1 padding-m">
            <h5>Subidas recientemente</h5>
        </div>

        <div class="column-1 padding-s">

            <?php
                $connection = mysqli_connect('localhost', 'root', '', 'bd_ourschool');
                /*
                Con esta consulta mostraremos todas las actividades pero quedandos con las que cumplan el requisito de ser publicas ( en opci??n_actividad).
                Adem??s las motraremos en un order para qedarnos con las ??ltimas actividade subidas, para ello lo ordenaremos por id_activida de forma descediente,
                debido a que la primera actividad contine el id 1, la segunda el 2??? y ponemos un limite 4 y de esta forma nos quedaremos con las cuatro ??ltimas.
                */
                $sql = "SELECT * FROM tbl_actividad WHERE opcion_actividad = 'Publico' ORDER BY id_actividad DESC LIMIT 4;";
                $query= mysqli_query($connection, $sql);

                $ruta = "../img/"; // RUTA RELATIVA DE LA FOTO

                foreach ($query as $recientes) {
                    $rutacompleta = $ruta.$recientes['foto_actividad'];

                    echo "<div class='column-4 padding-s'>";
                        // ESTO ESTA HECHO PARA QUE AL HACER CLICK EN UNA FOTO ESTA NOS REDIRIGA A ACTIVIDAD Y ENVIE POR LA URL EL ID DE ESA ACTIVIDAD QUE ESTAMOS PULSANDO.
                        echo "<a href='./actividad.php?id={$recientes['id_actividad']}'><img src='{$rutacompleta}' class='target'></a>";
                    echo "</div>";
                }

            ?> 
        </div>
    </div>

</body>

</html>
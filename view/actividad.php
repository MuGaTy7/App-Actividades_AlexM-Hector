<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descrcipción Actividad :)</title>
     <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../css/act.css">
</head>
<body>
    
    <?php
    // RECOGEMOS EN UNA VARIABLE EL ID DE LA FOTO QUE ENVIAMOS POR LA URL:
    $id_act = $_GET['id'];
    // SELECIONAMOS TODO EL CONTENIDO DE DICHA FOTO:
    $connection = mysqli_connect('localhost', 'root', '', 'bd_ourschool');
    $sql3 = "SELECT * FROM tbl_actividad WHERE id_actividad = $id_act;";
    $find = mysqli_query($connection, $sql3);
    
    $ruta = $_SERVER['SERVER_NAME']."/www/App-Actividades_AlexM-Hector/img/";

    foreach ($find as $actividad) {
        $rutacompleta = "http://".$ruta.$actividad['foto_actividad'];
        echo "<a href='./actividades.php'><button class='btn_volver'><</button></a>";
        echo "<div>";
            echo "<p><b>Nombre: </b>".$actividad['nombre_actividad']."</p>";
            echo "<img src='{$rutacompleta}' class='target'>";
            echo "<p style='margin-top: 16px;'><b>Descripción: </b>".$actividad['desc_actividad']."</p>";
            echo "<p><b>Opción: </b>".$actividad['opcion_actividad']."</p>";
            echo "<p><b>Topic: </b>".$actividad['topic_actividad']."</p>";
        echo "</div>";
    }
    ?>

</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../css/subir_act.css">
    <title>Sube tu actividad favorita!</title>
</head>

<body>
    <a href="./actividades.php"><button class="btn_volver"><</button></a>

    <form action="../php/subir_act.php" method="post" enctype="multipart/form-data">
        <h1><span>Publicar</span> Post</h1>
        <input placeholder="Introduce un titulo..." type="text" name="titulo" required/>
        <input placeholder="Escriba una descripción para la publicación..." type="text" name="descripcion" required/>
        <input type="file" name="foto" placeholder="Inserte una fotografía..." required>
        <select name="topic" required>
            <option>Matematicas</option>
            <option>Informatica</option>
            <option>Fisica</option>
            <option>Deportes</option>
        </select>
        <br><br>
        <div>
            <label for="opcion">Público</label>
            <input type="radio" name="opcion" value="true" required>
        </div>
        <div>
            <label for="opcion">Privado</label>
            <input type="radio" name="opcion" value="false" required>
        </div>
        
        <button class="btn">Submit</button>
    </form>
</body>

</html>
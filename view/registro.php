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
    <link rel="stylesheet" href="../css/registro.css">
    <!-- <link rel="stylesheet" href=""> -->
    <title>Crear cuenta</title>
</head>

<body>

    <a href="./actividades.php"><button class="btn_volver"><</button></a>
    <form action="../php/crearUsuario.php" method="post">
        <h1><span>Crear</span> Cuenta</h1>
        <p class="text">Regístrate para ver fotos y vídeos de tus amigos y poder compartir contenido de tu escuela :)</p>
        <?php
            if (isset($_GET['registro'])) {
                echo '<p>Ups! Te has dejado algun campo vacío!</p>';
            }
        ?> 
        <input placeholder="Nombre de usuario" name="nick_usuario" type="text" />
        <input placeholder="Correo electrónico" name="email_usuario" type="email" />
        <input placeholder="Contraseña" name="contra_usuario" type="password" />
        <a href="./login.php"><p class="text">¿Tienes una cuenta? Entrar</p></a>
        <button class="btn">Sign up</button><br><br>
    </form>

</body>

</html>
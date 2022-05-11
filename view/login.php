<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" cntent="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../css/login.css">
    <title>Inicio de sesión:</title>
</head>

<body>
    <!-- ENVIAMOS EL FORMULARIO DE LOGIN A LOGIN USUARIO PARA ALLI RECOGER LOS DATOS Y COMPROBARLOS CON LOS DE LA BD Y SI COINCIDEN PERMITIR AL USUARIO ENTRAR -->
    <a href="../index.html"><button class="btn_volver"><</button></a>
    <form action="../php/loginUsuario.php" method="post">
        <h1><span>Iniciar</span> Sesión</h1>
        <?php
        // AQUI LO QUE HAREMOS SERA RECOGER EL MENSAJE QUE ENVIAMOS DESDE EL LOGIN USUARIO Y SI ESTE TIENE ALGO, ES DECIR, NO ESTA VACIO, LO QUE QUERRÁ DECIR QUE HAY ALGO INCORRECTO NOS SALTARA ESE MENSAJE.
            if (isset($_GET['login'])) {
                echo '<p>Usuario y/o contraseña incorrectos! :(</p>';
            }
        ?> 
        <input placeholder="Nombre de usuario" type="text" name="nick_usuario"/>
        <input placeholder="Contraseña" type="password" name="contra_usuario"/>
        <a href="./registro.php"><p class="text">¿Todavía no tienes cuenta? Regístrate</p></a>
        <button class="btn">Log in</button>
    </form>
</body>

</html>
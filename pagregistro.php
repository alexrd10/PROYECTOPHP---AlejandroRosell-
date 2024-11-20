<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles_register.css">
    <title>Registro de Usuario</title>
</head>
<body>
    <h1>Registro de Usuario:</h1>
    <form method="get" action="validarregistro.php">
        <?php
            include("errorlogin.php");
        ?>
        <label for="nomusu">Nombre de Usuario: </label>
        <input type="text" id="nomusu" name="nomusu">
        <label for="mail">Correo Electrónico: </label>
        <input type="email" id="mail" name="mail">
        <label for="contra">Contraseña: </label>
        <input type="password" id="contra" name="contra">
        <p>¿Te has quedado atascado?  <a href="index.php">Volver al incio</a></p>
        <p>¿Tienes una cuenta?  <a href="paginises.php">Iniciar sesión</a></p>
        <input type="submit" value="Registrarse">
    </form>

</body>
</html>
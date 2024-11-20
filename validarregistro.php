<?php
        /* Incluir script de conexion a la base de datos */
        include("conexion.php");

        /* Validar datos */
        if (!empty($_REQUEST['nomusu']) && !empty($_REQUEST['mail']) && !empty($_REQUEST['contra'])) {

            # Recogo los datos
            $nombreusuario = $_REQUEST['nomusu'];
            $contraseña = $_REQUEST['contra'];
            $correo = $_REQUEST['mail'];

            # Insertar datos en la BD
            $sql = "insert into usuarios (nombre, email, contraseña, fecha_creacion) values ('$nombreusuario', '$correo', '$contraseña', now())";

            $conn->query($sql);
            $conn->close();

            header("Location: paginises.php");

        }
        else{
            session_start();
            $_SESSION["msg"] = "Faltan parámetros";
            header("Location: pagregistro.php");
        }
    ?>
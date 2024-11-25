<?php
        include("conexion.php");

        if (!empty($_REQUEST['nomusu']) && !empty($_REQUEST['contra'])) {
            $nombreusuario = $_REQUEST['nomusu'];
            $contraseña = $_REQUEST['contra'];

            $sql = "select * from usuarios where nombre='$nombreusuario' and contraseña='$contraseña'";

            $result = $conn->query($sql);

            $row_count = $result->num_rows;

            if ($sql == "select * from usuarios where nombre='admin' and contraseña='123'" && $row_count >= 1) {
                session_start();
                $_SESSION['usuario'] = $nombreusuario;
                header("Location: pagadmin.php");
            }
            elseif ($row_count >= 1) {
                session_start();
                $_SESSION['usuario'] = $nombreusuario;
                header("Location: pagusuario.php");
            }
            else {
                session_start();
                $_SESSION['msg2'] = "Usuario o contraseña incorrectos";
                header("Location: paginises.php");
            }
        }
        else {
            session_start();
            $_SESSION['msg'] = "Faltan parámetros";
            header("Location: paginises.php");
        }

    ?>
<?php
    include("conexion.php");
    if (isset($_REQUEST['eliminar'])) {
        $eliminar = $_REQUEST['eliminar'];
        $sql5 = "delete from pedidos where id_pedido = '$eliminar'";
        $result5 = $conn->query($sql5);
        header("Location: pagadmin.php");
    }
    if (isset($_REQUEST['eliminar2'])) {
        $eliminar2 = $_REQUEST['eliminar2'];
        $sql6 = "delete from usuarios where id = '$eliminar2'";
        $result6 = $conn->query($sql6);
        header("Location: pagadmin.php");
    }
?>
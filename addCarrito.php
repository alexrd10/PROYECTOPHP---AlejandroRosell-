<?php
session_start();
$productoscarrito = array();
if (isset($_SESSION['carrito'])) {
    $productoscarrito = $_SESSION['carrito'];
}
if (isset($_REQUEST['nombreprod']) && isset($_REQUEST['cantidad'])) {
    $producto = $_REQUEST['nombreprod'];
    $cantidad = $_REQUEST['cantidad'];
    if (isset($productoscarrito[$producto])) {
        $productoscarrito[$producto] += $cantidad;
    }else {
        $productoscarrito[$producto] = $cantidad;
    }
}
$_SESSION['carrito'] = $productoscarrito;
if (isset($_SESSION['preciototal']) && isset($_SESSION['carrito']) && isset($_SESSION['usuario'])) {
    $preciototal = $_SESSION['preciototal'];
    $usu = $_SESSION['usuario'];
    if (isset($_REQUEST['finalizar']) && $_REQUEST['finalizar'] == 1 && $preciototal != 0) {
        include("conexion.php");
        $sql = "Insert into pedidos (usuario, importe_total, fecha) values ('$usu', '$preciototal', now())";
        $conn->query($sql);
    }
}
if (isset($_REQUEST['vaciar']) && $_REQUEST['vaciar'] == 1) {
    unset($_SESSION['carrito']);
}
header("Location: pagusuario.php");
?>
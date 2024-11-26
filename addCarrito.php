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

if (isset($_REQUEST['vaciar']) && $_REQUEST['vaciar'] == 1) {
    unset($_SESSION['carrito']);
}
header("Location: pagusuario.php")
?>
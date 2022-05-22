<?php

$codigo = $_GET['id'];
include("recursos.php");
$info = $producto->consultarUnProducto($codigo);

$det = $info[0]['detalle'];
$prec = $info[0]['precioUnitario'];

date_default_timezone_set('America/Argentina/Cordoba');
$fecha = date("Y/m/d");
$hora = date('H:i:s');
$cant = 1;

$operacion->insertarVenta($det, $prec, $cant, $codigo, $fecha, $hora);

header("Location: carritoCompras.php");

?>
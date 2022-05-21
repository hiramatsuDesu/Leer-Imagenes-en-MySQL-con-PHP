<?php
    include('clases/baseDatos.php');
    include('clases/productos.php');
    include('clases/cajero.php');
    include('clases/venta.php');

    define('HOST', 'localhost');
    define('USUARIO', 'root');
    define('CLAVE', '');
    define('BASE', 'practica');

    $base = new Base_Datos(HOST, USUARIO, CLAVE, BASE);
    $producto = new Producto($base);
    $caj = new Cajero($base);
    $operacion = new Venta($base); 
?>
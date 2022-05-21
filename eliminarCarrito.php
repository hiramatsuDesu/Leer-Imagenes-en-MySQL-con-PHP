<?php
include("recursos.php");
$operacion->eliminarVenta($_GET['clave']);

header("Location: index.php");
?>
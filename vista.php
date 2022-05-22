<?php

include("conexion.php");

if(!empty($_GET['id'])){
    $result = $bd->query("SELECT imagen FROM productos WHERE id_producto={$_GET['id']}");
    if($result -> num_rows >0){
        $imgDatos=$result->fetch_assoc();
        header("Content-type: image/jpeg");
        echo $imgDatos['imagen'];
    }else{
        echo 'No hay imagenes cargadas de este producto';
    }
}

?>
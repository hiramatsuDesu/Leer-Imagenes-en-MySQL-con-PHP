<?php
class Producto{
    private $baseDatos;

    function __construct($base){
        $this -> baseDatos = $base;
    }

    public function insertarProductos($detalle, $precio, $cant){
        $resp = $this -> baseDatos -> ejecutarQuery("INSERT INTO productos VALUES(DEFAULT, '$detalle', $precio, $cant)");

        return $resp;
    }

    public function seleccionarProductos(){
        $resp = $this ->baseDatos -> ejecutarQuery("SELECT * FROM productos");

        return $resp;
    }

    public function modificarProducto($id, $detalle, $precio, $cant){
        $resp = $this -> baseDatos -> ejecutarQuery("UPDATE productos SET detalle = '$detalle', precioUnitario= '$precio', cantidad=$cant WHERE id_producto = $id");

        return $resp;
    }

    public function consultarUnProducto($id){
        $resp = $this -> baseDatos -> ejecutarQuery("SELECT * FROM productos WHERE id_producto = $id ");
        return $resp;
    }

    public function eliminarProducto($id){
        $resp = $this -> baseDatos -> ejecutarQuery("DELETE FROM productos WHERE id_producto = $id");

        return $res;
    }

}
?>
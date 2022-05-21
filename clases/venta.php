<?php
class Venta{
    private $baseDatos;

    function __construct($base){
        $this->baseDatos=$base;
    }

    public function mostrarVenta(){
        $resp = $this->baseDatos->ejecutarQuery("SELECT * FROM ventaprod");
        return $resp;
    }

    public function mostrarVentaIndividualmente($id){
        $resp = $this->baseDatos->ejecutarQuery("SELECT * FROM ventaprod WHERE id_operacion=$id");
        return $resp;
    }

    public function insertarVenta($detalle, $total, $cantidad, $id_producto, $fecha, $hora){
        $resp = $this->baseDatos->ejecutarQuery("INSERT INTO ventaprod VALUES(DEFAULT,  '$detalle', $total, '$cantidad', $id_producto, '$fecha', '$hora')");

        return $resp;
    }

    public function modificarVenta($ide_operacion, $cantidad, $precioTotal){
        $resp = $this->baseDatos->ejecutarQuery("UPDATE ventaprod SET cantidad='$cantidad', total ='$precioTotal' WHERE id_operacion = '$ide_operacion'");

        return $resp;
    }

    public function eliminarVenta($id_operacion){
        $resp = $this->baseDatos->ejecutarQuery("DELETE FROM ventaprod WHERE id_operacion = '$id_operacion'");

        return $resp;
    }
}

?>
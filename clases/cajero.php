<?php
class Cajero{
    private $baseDatos;

    function __construct($base){
        $this->baseDatos= $base;
    }

    public function insertarCajero($nombre, $apellido){
        $resp = $this->baseDatos->ejecutarQuery("INSERT INTO cajeros VALUES (DEFAULT, '$nombre', '$apellido')");
        return $resp;
    }

    public function seleccionarCajero(){
        $resp = $this->baseDatos->ejecutarQuery("SELECT * FROM cajeros");
        return $resp;
    }

    public function modificarDatosCajero($id, $nombre, $apellido){
        $resp = $this->baseDatos->ejecutarQuery("UPDATE cajeros SET nombre='$nombre', apellido='$apellido' WHERE id_cajero=$id");
        return $resp;
    }

    public function seleccionarUnCajero($id){
        $resp = $this->baseDatos->ejecutarQuery("SELECT * FROM cajeros WHERE id_cajero= $id");
        return $resp;
    }

    public function borrarDatosCajero($id){
        $resp = $this->baseDatos->ejecutarQuery("DELETE FROM cajeros WHERE id_cajero=$id");
        return $resp;
    }
}

?>
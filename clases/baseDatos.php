<?php

class Base_Datos{
    private $conexion;

    function __construct($servidor, $usuario, $clave, $nombreBase){
        $this->_connect($servidor, $usuario, $clave, $nombreBase);
    }

    function __destruct(){
        $this->conexion->close();
    }

    private function _connect($servidor, $usuario, $clave, $nombreBase){
        $this ->conexion = new mysqli($servidor, $usuario, $clave, $nombreBase);
    }

    public function ejecutarQuery($codigo){
        $tipo = strtoupper(substr($codigo, 0, 6));

        switch($tipo){
            case 'INSERT': 
                $resultado = $this->conexion->query($codigo);
                break;

            case 'SELECT':
                $listar=[];
                $resultado = $this->conexion->query($codigo);
                while($fila = $resultado->fetch_assoc()){
                    $listar[]=$fila;
                }
                return $listar;
                break;
                

            case 'UPDATE':
                $resultado = $this->conexion->query($codigo);
                break;

            case 'DELETE':
                $resultado = $this->conexion->query($codigo);
                break;
        }
    }

}

?>
<?php
class Conectar{
    public static function conexion(){
        $conexion = new mysqli('localhost', 'UserVisor', 'bTGv7o5TWec0SS3c', 'WEBdb');        
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>
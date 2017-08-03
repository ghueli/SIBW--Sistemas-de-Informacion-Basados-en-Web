<?php
    
    // contraseña: bTGv7o5TWec0SS3c
    $conexion = mysql_connect ('localhost', 'UserVisor', 'bTGv7o5TWec0SS3c');

    if(!$conexion){
        
        die('No pudo conectarse: ' . mysql_error());
        
    }

    if (!mysql_select_db ('WEBdb', $conexion)) {
    
        die('No se pudo conectar : ' . mysql_error());
    
    }

    mysql_query("SET NAMES 'utf8'");

?>
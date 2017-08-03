<?php
    function getProhibidas() {
        $conexion = Conectar::conexion();  
        
        $prohibidas;
        
        $result = $conexion->query("SELECT * FROM prohibidas;");
        while($filas=$result->fetch_assoc()){
            $prohibidas[]=$filas;
        }
        
        $palabraProhibida;
        
        foreach($prohibidas as $datoProhib){
            $palabraProhibida[] = $datoProhib['Palabra'];
        }  
        
        return $palabraProhibida;
    }
?>


<?php
class seccionesModel{
    private $db;
    private $secciones;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->secciones=array();
    }
    public function getSecciones(){
        $consulta=$this->db->query("SELECT * FROM seccion;");
        while($filas=$consulta->fetch_assoc()){
            $this->secciones[]=$filas;
        }
        return $this->secciones;
    }
 
    public function getSeccionesMenosEsa($nombre){
        $consulta=$this->db->query("SELECT * FROM seccion WHERE Nombre!='".$nombre."';");
        while($filas=$consulta->fetch_assoc()){
            $this->secciones[]=$filas;
        }
        return $this->secciones;
    }
    
    public function getSeccionById($idSec){
        $consulta=$this->db->query("SELECT * FROM seccion WHERE ID = '".$idSec."';");
        while($filas=$consulta->fetch_assoc()){
            $this->secciones[]=$filas;
        }
        return $this->secciones;
    }
    
    public function getSeccionByNombre($nombre){
        $consulta=$this->db->query("SELECT * FROM seccion WHERE Nombre = '".$nombre."';");
        while($filas=$consulta->fetch_assoc()){
            $this->secciones[]=$filas;
        }
        return $this->secciones;
    }
    
    public function incluirSeccion($nombre, $padre){
        $seccionElegida = $this->getSeccionByNombre($nombre);
        if($seccionElegida[0]['Nombre'] == $nombre){
            return true;
        }else{
            $result=$this->db->query("INSERT INTO seccion (ID, Nombre, Padre) VALUES (NULL, '".$nombre."', '".$padre."');");
            if(!$result){
                return false;
            }
        }
        return true;
    }
    
    public function eliminarSeccion($idSeccion){
        
            $result=$this->db->query("DELETE FROM seccion WHERE ID = '".$idSeccion."';");
            if(!$result){
                return false;
            }
            
        return true;
    }
    
    public function modificarSeccion($idSec, $nombre, $padre) {    
        $result = $this->db->query("UPDATE seccion SET Nombre = '".$nombre."', Padre = '".$padre."' WHERE ID=$idSec;");
        
        if(!$result){
            return false;
        }
        
        return true;
    }
}
?>
<?php
class publicidadModel{
    private $db;
    private $publicidad;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->publicidad=array();
    }
    
    public function getPublicidad(){
        $consulta=$this->db->query("SELECT * FROM publicidad;");
        while($filas=$consulta->fetch_assoc()){
            $this->publicidad[]=$filas;
        }
        return $this->publicidad;
    }
    
    public function getPublicidadByImagen($imagen){
        $consulta=$this->db->query("SELECT * FROM publicidad WHERE imagen='".$imagen."';");
        while($filas=$consulta->fetch_assoc()){
            $this->publicidad[]=$filas;
        }
        return $this->publicidad;
    }

    public function incluirPublicidad($imagen, $url){
        $publiElegida = $this->getPublicidadByImagen($imagen);
        if($publiElegida[0]['imagen'] == $imagen){
            return true;
        }else{
            $result=$this->db->query("INSERT INTO publicidad (ID, imagen, url, Pulsaciones) VALUES (NULL, '".$imagen."', '".$url."', 0);");
            if(!$result){
                return false;
            }
        }
        return true;
    }
    
    public function eliminarPublicidad($idPubli){
        
            $result=$this->db->query("DELETE FROM publicidad WHERE ID = '".$idPubli."';");
            if(!$result){
                return false;
            }
            
        return true;
    }
    
    public function modificarPublicidad($idPubli, $nombre, $url) {    
        $result = $this->db->query("UPDATE publicidad SET imagen = '".$nombre."', url = '".$url."' WHERE ID=$idPubli;");
        
        if(!$result){
            return false;
        }
        
        return true;
    }
    
}
?>
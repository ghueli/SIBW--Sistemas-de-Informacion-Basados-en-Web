<?php
class imagenesModel{
    private $db;
    private $imagenes;
    private $imagen;
    private $imagenElegida;

    public function __construct(){
        $this->db=Conectar::conexion();
        $this->imagenes=array();
    }
    
    public function getImagenes(){
        $consulta=$this->db->query("SELECT * FROM imagen;");
        while($filas=$consulta->fetch_assoc()){
            $this->imagenes[]=$filas;
        }
        return $this->imagenes;
    }
    
    public function incluirImagen($nombre, $alt, $seccion, $pie){
        $imagenElegida = $this->getImagenByNombre($nombre);
        if($imagenElegida[0]['Nombre'] == $nombre){
            return true;
        }else{
            $result=$this->db->query("INSERT INTO imagen (ID, Nombre, Alt, Categoria, Pie) VALUES (NULL, '".$nombre."', '".$alt."', '".$seccion."', '".$pie."');");
            if(!$result){
                return false;
            }
        }
        return true;
    }
    
    public function getImagenByNombre($nombre){
        $consulta=$this->db->query("SELECT * FROM imagen WHERE Nombre='".$nombre."';");
        while($filas=$consulta->fetch_assoc()){
            $this->imagen[]=$filas;
        }
        return $this->imagen;
    }
}
?>
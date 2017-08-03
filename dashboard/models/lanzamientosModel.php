<?php
class lanzamientosModel{
    private $db;
    private $lanzamientos;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->lanzamientos=array();
    }
    public function getLanzamientos(){
        $consulta=$this->db->query("SELECT * FROM lanzamiento;");
        while($filas=$consulta->fetch_assoc()){
            $this->lanzamientos[]=$filas;
        }
        return $this->lanzamientos;
    }
}
?>
<?php
class usuariosModel{
    private $db;
    private $usuarios;

    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }
    public function getUsuarios(){
        $consulta=$this->db->query("SELECT * FROM usuario;");
        while($filas=$consulta->fetch_assoc()){
            $this->usuarios[]=$filas;
        }
        return $this->usuarios;
    }
    public function getUsuariosMenosEl($nombre){
        $consulta=$this->db->query("SELECT * FROM usuario WHERE NombreUsuario!='".$nombre."';");
        while($filas=$consulta->fetch_assoc()){
            $this->usuarios[]=$filas;
        }
        return $this->usuarios;
    }
    public function getUsuarioByNombre($nombreUsu){
        $consulta=$this->db->query("SELECT * FROM usuario WHERE NombreUsuario='".$nombreUsu."'");
        while($filas=$consulta->fetch_assoc()){
            $this->usuarios[]=$filas;
        }
        return $this->usuarios;
    }
    
    public function getUsuarioById($idUsu){
        $consulta=$this->db->query("SELECT * FROM usuario WHERE ID='".$idUsu."'");
        while($filas=$consulta->fetch_assoc()){
            $this->usuarios[]=$filas;
        }
        return $this->usuarios;
    }
    
    public function registrar($username, $password) {
        
        $consulta = $this->db->query("SELECT * FROM usuario WHERE NombreUsuario='".$username."'");
        if(!$consulta){
            return false;
        }
        
        if($consulta->num_rows>0){
            return false;
        }
        
        $consulta = $this->db->query("INSERT INTO usuario (ID, NombreUsuario, Contraseña, Privilegios) VALUES (NULL, '".$username."', '".$password."',0);");
        
        if(!$consulta){
            return false;
        }
        
        return true;
    }
    
    public function buscar($username, $password) {
        
        $result = $this->db->query("SELECT * FROM usuario WHERE (NombreUsuario='".$username."') && (Contraseña='".$password."');");
        if(!$result){
            return false;
        }
        
        if($result->num_rows<1){
            return false;
        }
        
        return true;
    }
}
?>
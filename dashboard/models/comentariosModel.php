<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of comentariosModel
 *
 * @author Alejandro
 */
class comentariosModel {
    private $db;
    private $comentarios;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->comentarios=array();
    }
    
    public function getComentarios(){
        $consulta=$this->db->query("SELECT * FROM comentario;");
        while($filas=$consulta->fetch_assoc()){
            $this->comentarios[]=$filas;
        }
        return $this->comentarios;
    }
    
    public function insertComentario($ip,$username,$email,$date,$texto) {    
        $result = $this->db->query("INSERT INTO comentario (ID, Ip, Nombre, Correo, FechayHora, Texto) VALUES (NULL, '".$ip."', '".$username."', '".$email."', '".$date."', '".$texto."');");
        
        if(!$result){
            return false;
        }
        
        return true;
    }
    
    public function eliminarComentario($id) {    
        $result = $this->db->query("DELETE FROM comentario WHERE ID=$id;");
        
        if(!$result){
            return false;
        }
        
        return true;
    }
    
    public function modificarComentario($id, $name, $email, $texto) {    
        $result = $this->db->query("UPDATE comentario SET Nombre = '".$name."', Correo = '".$email."', Texto = '".$texto."' WHERE ID=$id;");
        
        if(!$result){
            return false;
        }
        
        return true;
    }
}

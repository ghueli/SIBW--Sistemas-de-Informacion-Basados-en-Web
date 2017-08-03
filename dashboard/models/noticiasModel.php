<?php
class noticiasModel{
    private $db;
    private $noticias;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->noticias=array();
    }
    public function getNoticias(){
        $consulta=$this->db->query("SELECT noticia.*, imagen.Nombre, imagen.Alt, usuario.NombreUsuario FROM noticia INNER JOIN imagen ON noticia.Imagen = imagen.ID INNER JOIN usuario ON noticia.Autor = usuario.ID;");
        while($filas=$consulta->fetch_assoc()){
            $this->noticias[]=$filas;
        }
        return $this->noticias;
    }
    
    public function getNoticiasPublicadas(){
        $consulta=$this->db->query("SELECT noticia.*, imagen.Nombre, imagen.Alt, usuario.NombreUsuario FROM noticia INNER JOIN imagen ON noticia.Imagen = imagen.ID INNER JOIN usuario ON noticia.Autor = usuario.ID WHERE Estado = 'Publicado' ORDER BY ID DESC;");
        while($filas=$consulta->fetch_assoc()){
            $this->noticias[]=$filas;
        }
        return $this->noticias;
    }
    
    public function getNoticiasById($idNoti){
        $consulta=$this->db->query("(SELECT noticia.*, imagen.Nombre, imagen.Alt, imagen.Pie, usuario.NombreUsuario FROM noticia INNER JOIN imagen ON noticia.Imagen = imagen.ID INNER JOIN usuario ON noticia.Autor = usuario.ID WHERE noticia.ID=$idNoti) UNION (SELECT noticia.*, imagen.Nombre, imagen.Alt, imagen.Pie, usuario.NombreUsuario FROM noticia INNER JOIN imagen ON noticia.ImagenCuerpo = imagen.ID INNER JOIN usuario ON noticia.Autor = usuario.ID WHERE noticia.ID=$idNoti);");
        while($filas=$consulta->fetch_assoc()){
            $this->noticias[]=$filas;
        }
        return $this->noticias;
    }
    public function getNoticiasRelacionadas($idNoti, $rel){
        $consulta=$this->db->query("(SELECT noticia.*, imagen.Nombre, imagen.Alt FROM noticia INNER JOIN imagen ON noticia.Imagen = imagen.ID WHERE (noticia.Etiquetas='".$rel."') && (noticia.ID!=$idNoti));");
        while($filas=$consulta->fetch_assoc()){
            $this->noticias[]=$filas;
        }
        return $this->noticias;
    }
    
    public function incluirNoticia($TituloP, $Titulo, $Subtitulo, $Entradilla, $Cuerpo, $Imagen, $ImagenCuerpo, $Video, $Autor, $Fecha, $Etiquetas, $Seccion){
        $result=$this->db->query("INSERT INTO noticia (ID, TituloP, Titulo, Subtitulo, Entradilla, Cuerpo, Imagen, ImagenCuerpo, Video, Autor, FechaPubli, FechaEdi, Etiquetas, Seccion, Estado) VALUES (NULL, '".$TituloP."', '".$Titulo."', '".$Subtitulo."', '".$Entradilla."', '".$Cuerpo."', '".$Imagen."', '".$ImagenCuerpo."', '".$Video."', '".$Autor."', '".$Fecha."', '".$Fecha."', '".$Etiquetas."', '".$Seccion."', 'Pendiente');");
        if(!$result){
            return false;
        }
        
        return true;
    }
    
    public function eliminarNoticia($idNoti) {    
        $result = $this->db->query("DELETE FROM noticia WHERE ID=$idNoti;");
        
        if(!$result){
            return false;
        }
        
        return true;
    }
    
    public function modificarNoticia($idNoti, $TituloP, $Titulo, $Subtitulo, $Entradilla, $Cuerpo, $Imagen, $ImagenCuerpo, $Video, $Autor, $FechaEdi, $Etiquetas, $Seccion) {    
        $result = $this->db->query("UPDATE noticia SET TituloP = '".$TituloP."', Titulo = '".$Titulo."', Subtitulo = '".$Subtitulo."', Entradilla = '".$Entradilla."', Cuerpo = '".$Cuerpo."', Imagen = '".$Imagen."', ImagenCuerpo = '".$ImagenCuerpo."', Video = '".$Video."', Autor = '".$Autor."', FechaEdi = '".$FechaEdi."', Etiquetas = '".$Etiquetas."', Seccion = '".$Seccion."' WHERE ID=$idNoti;");
        
        if(!$result){
            return false;
        }
        
        return true;
    }
    
    public function modificarEstadoNoticia($idNoti, $Estado, $Fecha) {    
        $result = $this->db->query("UPDATE noticia SET FechaPubli = '".$Fecha."', Estado = '".$Estado."' WHERE ID=$idNoti;");
        
        if(!$result){
            return false;
        }
        
        return true;
    }
    
    public function getNoticiasLike($cadena){
        //$consulta=$this->db->query("SELECT noticia.*, imagen.Nombre, imagen.Alt, usuario.NombreUsuario FROM noticia INNER JOIN imagen ON noticia.Imagen = imagen.ID INNER JOIN usuario ON noticia.Autor = usuario.ID WHERE noticia.Titulo LIKE '%".$cadena."%'  OR noticia.Entradilla LIKE '%".$cadena."%';");
        $consulta=$this->db->query("SELECT noticia.* FROM noticia WHERE noticia.Titulo LIKE '%".$cadena."%'  OR noticia.Entradilla LIKE '%".$cadena."%';");
        while($filas=$consulta->fetch_assoc()){
            $this->noticias[]=$filas;
        }
        return $this->noticias;
    }
    
    public function getNoticiasPublicadasLike($cadena){
        $consulta=$this->db->query("SELECT noticia.* FROM noticia WHERE Estado = 'Publicado' AND (noticia.Titulo LIKE '%".$cadena."%' OR noticia.Entradilla LIKE '%".$cadena."%');");
        while($filas=$consulta->fetch_assoc()){
            $this->noticias[]=$filas;
        }
        return $this->noticias;
    }
    
}
?>
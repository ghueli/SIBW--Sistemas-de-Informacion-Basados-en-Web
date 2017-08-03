<?php
//Llamada al modelo
include("models/publicidadModel.php");
$publi=new publicidadModel();
$publi1=new publicidadModel();
$datosPublicidad=$publi->getPublicidad();

if(isset($_REQUEST['id'])){
    $not2=new noticiasModel();
}

if(isset($_REQUEST['rel'])){
    $tagNoticia=$_GET['rel'];
        
    $datosNoticiaRelacionadas=$not2->getNoticiasRelacionadas($idNoticia, $tagNoticia);
}

//Llamada a la vista

if(isset($_REQUEST['sec']) && $_GET['sec']=='GestorPublicidad'){
    include("views/contentGestionPublicidad.php");
    include("views/sidebar.php");
}else include("views/sidebar.php");
?>
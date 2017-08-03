<?php
//Llamada al modelo
//include("models/noticiasModel.php");
$not=new noticiasModel();
$not1=new noticiasModel();
$not2=new noticiasModel();


$datosNoticias=$not->getNoticiasPublicadas();
$datosNoticiasTodas=$not2->getNoticias();


//Llamada a la vista
if(isset($_REQUEST['id'])){
    $idNoticia=$_GET['id'];
    $datosNoticiaIndividual=$not1->getNoticiasById($idNoticia);
    if(!isset($_REQUEST['imp'])){
        include("views/contentNoticiasIndividual.php"); 
    }
    
}else if((isset($_REQUEST['sec']) && $_GET['sec']=='Noticias') || !isset($_REQUEST['sec'])){
    include("views/contentNoticias.php");
}
?>
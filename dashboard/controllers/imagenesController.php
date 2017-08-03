<?php
//Llamada al modelo
include("models/imagenesModel.php");
$img=new imagenesModel();
$img1=new imagenesModel();
$img2=new imagenesModel();
$datosImagenes=$img->getImagenes();
 
//Llamada a la vista
if(isset($_REQUEST['sec']) && $_GET['sec']=='Galeria'){
    include("views/contentGaleria.php");
}
?>
<?php
//Llamada al modelo
include("models/seccionesModel.php");
$seccion=new seccionesModel();
$seccion1=new seccionesModel();
$seccion2=new seccionesModel();
$seccion3=new seccionesModel();
$seccion4=new seccionesModel();
$seccion5=new seccionesModel();
$seccion6=new seccionesModel();
$datosSecciones=$seccion->getSecciones();
 
//Llamada a la vista
include("views/header.php");
?>
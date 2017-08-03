<?php
//Llamada al modelo
include("models/comentariosModel.php");
$com=new comentariosModel();
$datosComentarios=$com->getComentarios();

$comentario=new comentariosModel();

?>

<?php
require("db/db.php");

//Recupera sesion abierta
session_start();
include("models/noticiasModel.php");
require("controllers/usuariosController.php");

if(isset($_GET['q'])){
    $notBuscadas=new noticiasModel();
    $notBuscadasPublicadas=new noticiasModel();
    $eJefe = false;
    
    if(isset($_SESSION['usuario'])){
        $usu = $usuario->getUsuarioByNombre($_SESSION['usuario']);

        if($usu[0]['Privilegios']==1){
            $eJefe = true;
        }

    }
    
    $q=$_GET['q'];

    if($eJefe)
        $result = $notBuscadas->getNoticiasLike($q);
    else
        $result = $notBuscadas->getNoticiasPublicadasLike($q);
    
    foreach ($result as $titulo) {
        echo "<a class='enlaceBuscador' href='index.php?rel=". $titulo["Etiquetas"] ."&sec=Noticias&id=". $titulo["ID"] ."'>".$titulo['Titulo']."</a><hr/>";
    }
    
}else if(isset($_REQUEST['imp']) ){
    require("controllers/noticiasController.php");
    $idNoticia=$_GET['id'];
    $datosNoticiaIndividual=$not1->getNoticiasById($idNoticia);
    require("views/contentImprimir.php");
}else{
    include("controllers/seccionesController.php");
    require("views/content.php");
    include("controllers/publicidadController.php");
    include("views/footer.php");
    
}
?>
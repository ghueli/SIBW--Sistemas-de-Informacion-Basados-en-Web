<?php

    $seccion='Noticias';
    if(isset($_REQUEST['sec'])){
        $seccion=$_GET['sec'];
    }

    switch($seccion){
        case 'Galeria':
            require("./controllers/imagenesController.php");
            break;
        case 'Login':
            require("./views/login.php");
            break;
        case 'Registrarse':
            require("./views/registrarse.php");
            break;
        case 'Lanzamientos':
            require("./controllers/lanzamientosController.php");
            break;
        case 'GestorComentarios':
            require("./views/contentGestionComentarios.php");
            break;
        case 'GestorNoticias':
            require("./views/contentGestionNoticias.php");
            break;
        case 'GestorSecciones':
            require("./views/contentGestionSecciones.php");
            break;  
        default:
            require("./controllers/noticiasController.php");
            break;
    }
?>
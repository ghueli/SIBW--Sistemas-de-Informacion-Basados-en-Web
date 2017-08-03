<div id="derecha">
    <div id="sidebar">
        <?php
            $editorJefe = false;
            $redactor = false;
            $colaborador = false;
            
            if(isset($_SESSION['usuario'])){
                $usu = $usuario->getUsuarioByNombre($_SESSION['usuario']);
                
                if($usu[0]['Privilegios']==1){
                    echo "<p class='tituloRelac'>Gestion de Contenidos</p>";
                    $editorJefe = true;
                }else if($usu[0]['Privilegios']==2){
                    echo "<p class='tituloRelac'>Gestion de Contenidos</p>";
                    $redactor = true;
                }else if($usu[0]['Privilegios']==3){
                    echo "<p class='tituloRelac'>Gestion de Contenidos</p>";
                    $colaborador = true;
                }else{
                    echo "<p class='tituloRelac'>Publicidad</p>";
                }
                
            }else if(isset($_REQUEST['id'])){
                echo "<p class='tituloRelac'>Relacionadas</p>";
            }else{
                echo "<p class='tituloRelac'>Publicidad</p>";
            }
        ?>
        

        <div id="publi">

            <hr/>
            <ul>
                <?php
                    if($editorJefe){
                        echo 
                            "<li>
                             <a href='index.php?sec=GestorComentarios'><h3>Gestor de Comentarios</h3></a>
                             <a href='index.php?sec=GestorNoticias'><h3>Gestor de Noticias</h3></a>
                             <a href='index.php?sec=GestorPublicidad'><h3>Gestor de Publicidad</h3></a>
                             <a href='index.php?sec=GestorSecciones'><h3>Gestor de Secciones</h3></a>
                             <a href='index.php?sec=GestorOrganizador'><h3>Organizador Página</h3></a>";
                        echo"   </li>";
                    }else if($redactor || $colaborador){
                        echo 
                            "<li>
                             <a href='index.php?sec=GestorNoticias'><h3>Gestor de Noticias</h3></a>
                            </li>";
                    }else if(isset($_REQUEST['id'])){
                        $idNoticia=$_GET['id'];
                        $datosNoticiaIndividual=$not1->getNoticiasById($idNoticia);
                        
                        foreach($datosNoticiaRelacionadas as $datoRel){
                            echo 
                                "<li>
                                 <a href='index.php?rel=". $datoRel["Etiquetas"] ."&sec=Noticias&id=". $datoRel["ID"] ."'><h3>" . $datoRel["TituloP"] . "</h3></a>
                                 <a href='index.php?rel=". $datoRel["Etiquetas"] ."&sec=Noticias&id=". $datoRel["ID"] ."'><img src=" . $datoRel["Nombre"] . " alt=" . $datoRel["Alt"] . "/></a>
                                 </li>";
                        }   
                    }else{
                
                        foreach($datosPublicidad as $datoPubli){
                            echo 
                                "<li><a href=" . $datoPubli['url'] . "><img src=" . $datoPubli['imagen'] . " alt='Timo Nintendo'/></a></li>";
                        }
                    }
                ?>
            </ul>
            <style type="text/css">
                a   {color: black;   text-decoration: none;}
            </style>
        </div>
    </div>
    <?php
        if(!isset($_REQUEST['id']) && !$editorJefe && !$redactor && !$colaborador){
            include("views/redesSociales.php");
        }
    ?>
</div>

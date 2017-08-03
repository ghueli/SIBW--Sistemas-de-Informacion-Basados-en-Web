
<div id="content">
    <div id="individual">
     <!--$datosNoticiaIndividual-->
    <?php
    
        include("controllers/comentariosController.php");
        
        $editorJefe = false;
        $redactor = false;
        $colaborador = false;

        if(isset($_SESSION['usuario'])){
            $usu = $usuario->getUsuarioByNombre($_SESSION['usuario']);
            $nombreUsuario = $usu[0]['NombreUsuario'];
            $tipoUsuario = $usu[0]['Privilegios'];

            if($tipoUsuario==1){
                $editorJefe = true;
            }else if($tipoUsuario==2){
                $redactor = true;
            }else if($tipoUsuario==3){
                $colaborador = true;
            }
        }
        
        if(isset($_POST['enviar'])){
            $username = $_POST['autor'];
            $email = $_POST['email'];
            $texto = $_POST['texto'];

            function getRealIP()
            {

                if (!empty($_SERVER['HTTP_CLIENT_IP']))
                    return $_SERVER['HTTP_CLIENT_IP'];

                if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
                    return $_SERVER['HTTP_X_FORWARDED_FOR'];

                return $_SERVER['REMOTE_ADDR'];

            }

            $ip = getRealIP();

            $date = getdate();

            if($date['hours']<10){
                $date['hours'] = "0".$date['hours'];
            }
            if($date['minutes']<10){
                $date['minutes'] = "0".$date['minutes'];
            }

            $hoy = $date['mday']."/".$date['mon']."/".$date['year']." - ".$date['hours'].":".$date['minutes'];

            $result = $comentario->insertComentario($ip, $username, $email, $hoy, $texto);
            
            header("location:index.php?rel=". $datosNoticiasIndividual[0]['Etiquetas'] ."&sec=Noticias&id=". $_GET[id] ."");
        }
    
        echo
            "<p class='seccion'>" . $seccion . "</p>
                
            <div id='funciones'>";
            
                if(isset($_POST['editarNoticia'])){

                    echo    "<form method='POST' enctype='multipart/form-data'>
                        <table>
                            <tr>
                                <td>Titulo de Portada*:</td>
                                <td><textarea name='tituloP' id='textComment' rows='2' cols='50' maxlength='96' required placeholder='Titulo llamativo' >".$datosNoticiaIndividual[0]['TituloP']."</textarea></td>
                            </tr>
                            <tr>
                                <td>Titulo*:</td>
                                <td><textarea name='titulo' id='textComment' rows='2' cols='50' maxlength='96' required placeholder='Titulo'>".$datosNoticiaIndividual[0]['Titulo']."</textarea></td>
                            </tr>
                            <tr>
                                <td>Subtitulo*:</td>
                                <td><textarea name='subtitulo' id='textComment' rows='2' cols='50' maxlength='96' required placeholder='Subtitulo'>".$datosNoticiaIndividual[0]['Subtitulo']."</textarea></td>
                            </tr>
                            <tr>
                                <td>Entradilla*:</td>
                                <td><textarea name='entradilla' id='textComment' rows='4' cols='50' required placeholder='Entradilla'>".$datosNoticiaIndividual[0]['Entradilla']."</textarea></td>
                            </tr>
                            <tr>
                                <td>Cuerpo*:</td>
                                <td><textarea name='cuerpo' id='textComment' rows='15' cols='50' required placeholder='Cuerpo de la noticia'>".$datosNoticiaIndividual[0]['Cuerpo']."</textarea></td>
                            </tr>
                            <tr>
                                <td></td>";
                ?>
                                <td><p id="warning">Las dos imagenes tienen que ser diferentes</p></td>
                <?php
                            echo "</tr>
                            <tr>
                                <td>Imagen de Portada*:</td>
                                <td><input type='file' name='imagen' accept='image/*' /></td>
                                <input type='hidden' value=".$datosNoticiaIndividual[0]['Imagen']." name='imagen'/>
                            </tr>
                            <tr>
                                <td>Alt imagen Portada:</td>
                                <td><textarea name='altImgPortada' id='textComment' rows='1' cols='50' maxlength='46' placeholder='Rellenar solo si se sube archivo arriba' ></textarea></td>
                            </tr>
                            <tr>
                                <td>Pie Foto Portada:</td>
                                <td><textarea name='pieImgPortada' id='textComment' rows='1' cols='50' maxlength='46' placeholder='Rellenar solo si se sube archivo arriba' ></textarea></td>
                            </tr>
                            <tr>
                                <td>Imagen del Cuerpo*:</td>
                                <td><input type='file' name='imagenCuerpo' accept='image/*' /></td>
                                <input type='hidden' value=".$datosNoticiaIndividual[0]['ImagenCuerpo']." name='imagenCuerpo'/>
                            </tr>
                            <tr>
                                <td>Alt imagen Cuerpo:</td>
                                <td><textarea name='altImgCuerpo' id='textComment' rows='1' cols='50' maxlength='46' placeholder='Rellenar solo si se sube archivo arriba' ></textarea></td>
                            </tr>
                            <tr>
                                <td>Pie Foto Cuerpo:</td>
                                <td><textarea name='pieImgCuerpo' id='textComment' rows='1' cols='50' maxlength='46' placeholder='Rellenar solo si se sube archivo arriba' ></textarea></td>
                            </tr>
                            <tr>
                                <td>Video:</td>
                                <td><textarea name='video' id='textComment' rows='2' cols='50' maxlength='96' placeholder='Enlace del Video en Youtube'>".$datosNoticiaIndividual[0]['Video']."</textarea></td>
                            </tr>";

                            $datosAutor = $usuario1->getUsuarioById($datosNoticiaIndividual[0]['Autor']);
                            $nombreAutor = $datosAutor[0]['NombreUsuario'];

                            $autores =  $usuario3->getUsuariosMenosEl($nombreAutor);

                            echo 
                                "<tr>
                                <td>Autor*:</td>
                                <td><select name='autor' id='textComment' required >
                                    <option selected>".$nombreAutor."</option>";
                                    foreach($autores as $opcion){
                                        echo "<option>".$opcion['NombreUsuario']."</option>";              
                                    }
                            echo 
                                "</select></td>
                            </tr>
                            <tr>
                                <td>Etiqueta*:</td>
                                <td><textarea name='etiqueta' id='textComment' rows='1' cols='50' maxlength='46' required placeholder='Etiqueta' >".$datosNoticiaIndividual[0]['Etiquetas']."</textarea></td>
                            </tr>
                            <tr>";

                            $datosSeccion = $seccion1->getSeccionById($datosNoticiaIndividual[0]['Seccion']);
                            $nombreSec = $datosSeccion[0]['Nombre'];

                            $seccionesMenosUna = $seccion5->getSeccionesMenosEsa($nombreSec);

                            echo 
                                "<tr>
                                <td>Seccion*:</td>
                                <td><select name='seccion' id='textComment' required >
                                    <option selected>".$nombreSec."</option>";
                                    foreach($seccionesMenosUna as $opcion){
                                        echo "<option>".$opcion['Nombre']."</option>";              
                                    }
                            echo 
                                "</select></td>
                            </tr>
                            <tr>
                                <td><button value=".$datosNoticiaIndividual[0]['ID']." name='modificarFinal'>Modificar Noticia</button></td>
                                <td><input type='reset' value='Reset' /></td>
                                <td><button name='cancelar' >Cancelar</button></td>
                            </tr>
                        </table>
                    </form>
                    <hr/>";

                }else if (isset($_POST['modificarFinal'])) {  
            
                    $seccion = $_POST['seccion'];


                    if(is_uploaded_file($_FILES['imagen']['tmp_name'])) { // verifica haya sido cargado el archivo 
                        $ruta = "imagenes/".$_FILES['imagen']['name'];
                        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

                        $alt1 = $_POST['altImgPortada'];
                        $pie1 = $_POST['pieImgPortada'];
                        $result = $img1->incluirImagen($ruta, $alt1, $seccion, $pie1);
                        $datosImagen = $img1->getImagenByNombre($ruta);
                        $imagen = $datosImagen[0]['ID'];

                    }else{
                        $imagen = $_POST['imagen'];
                    }
                    if(is_uploaded_file($_FILES['imagenCuerpo']['tmp_name'])) { // verifica haya sido cargado el archivo 
                        $rutaCuerpo = "imagenes/".$_FILES['imagenCuerpo']['name'];
                        move_uploaded_file($_FILES['imagenCuerpo']['tmp_name'], $rutaCuerpo);

                        $alt2 = $_POST['altImgCuerpo'];
                        $pie2 = $_POST['pieImgCuerpo'];
                        $result = $img2->incluirImagen($rutaCuerpo, $alt2, $seccion, $pie2);
                        $datosImagenCuerpo = $img2->getImagenByNombre($rutaCuerpo);
                        $imagenCuerpo = $datosImagenCuerpo[0]['ID'];

                    }else{
                        $imagenCuerpo = $_POST['imagenCuerpo'];
                    }

                    $idNoticia = $_POST['modificarFinal'];
                    $tituloP = $_POST['tituloP'];
                    $titulo = $_POST['titulo'];
                    $subtitulo = $_POST['subtitulo'];
                    $entradilla = $_POST['entradilla'];
                    $cuerpo = $_POST['cuerpo'];
                    $video = $_POST['video'];
                    $autor = $_POST['autor'];
                    $etiqueta = $_POST['etiqueta'];

                    $date = getdate();

                    if($date['hours']<10){
                        $date['hours'] = "0".$date['hours'];
                    }
                    if($date['minutes']<10){
                        $date['minutes'] = "0".$date['minutes'];
                    }

                    $hoy = $date['mday']."/".$date['mon']."/".$date['year']." - ".$date['hours'].":".$date['minutes'];

                    $datosSeccion1 = $seccion2->getSeccionByNombre($seccion);
                    $idSeccion = $datosSeccion1[0]['ID'];

                    $datosAutor1 = $usuario2->getUsuarioByNombre($autor);
                    $idAutor = $datosAutor1[0]['ID'];

                    $result = $not2->modificarNoticia($idNoticia, $tituloP, $titulo, $subtitulo, $entradilla, $cuerpo, $imagen, $imagenCuerpo, $video, $idAutor, $hoy, $etiqueta, $idSeccion);

                    header("location:index.php?rel=". $datosNoticiasIndividual[0]['Etiquetas'] ."&sec=Noticias&id=". $datosNoticiaIndividual[0]['ID'] ."");

                }

            echo "</div>  
            
            <form method='POST'><label class='titulo'>" . $datosNoticiaIndividual[0]['Titulo'] . "&nbsp; &nbsp;</label>";
                if($editorJefe){    
                    echo "<button name=editarNoticia>Editar Noticia</button>";
                }
            echo "</form> 
            <p class='subtitulo'>" . $datosNoticiaIndividual[0]['Subtitulo'] . "</p>";
        
    ?>

    <div class="imgRRSS">

        <div class="img">

            <figure class="img1">
                <?php
                    echo
                        "<img src=". $datosNoticiaIndividual[0]['Nombre'] . " alt=" . $datosNoticiaIndividual[0]['Alt'] ." class='imgNoti'/>
                        <figcation>". $datosNoticiaIndividual[0]['Pie'] . "</figcation>";
                ?>
            </figure>
                
        </div>

        <div class="RRSS">

            <ul>
                <li>
                    <INPUT class="btnComment" type="image" src="./imagenes/coments.png" value="" onClick="Desplegar()"/>
                </li>

                <div id="comentarios">
                    <ul id="listaComentarios">
                        <li class="tituloComment">Comentarios</li>
                        <hr/>
                        <?php
                            foreach($datosComentarios as $datoCom){
                                echo 
                                    "<ul>
                                        <li>".$datoCom["Nombre"].", escribió:</li>
                                        <li>".$datoCom["FechayHora"]."</li>
                                        <li><p>".$datoCom["Texto"]."</p></li>
                                    </ul>
                                    <hr/>";
                            }   
                        ?>
                    </ul>
                    <ul class="comment3">
                        <?php if(isset($_SESSION['usuario'])){
                        echo "<form id='comment3' method='POST' >";?>
                                <table>
                                    <tr>
                                        <p>Escribe tu comentario:</p>
                                    </tr>
                                    <tr>
                                        <td>Autor:</td>
                                        <td><input type="text" name="autor" id="autor" required placeholder="Nombre o seudonimo"/></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><input type="text" name="email" id="email" required pattern = "[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+\.+[a-zA-Z0-9]{2,4}$" placeholder="name@server.com" /></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><textarea name="texto" id='textComment' rows='5' cols='30' onkeyup='comprobar()' required placeholder='Comentario'></textarea></td>
                                    </tr>
                                    <tr>
                                        <td><button name="enviar">Enviar</button></td>
                                        <td><input type="reset" value="Reset"></td>
                                    </tr>
                                </table>
                            </form>
                        <?php }else{ 
                            echo "<p>Para escribir un comentario tienes que iniciar sesion</p>
                                    <form action='index.php?sec=Login' method='POST'>
                                        <input type='submit' value='Iniciar Sesión' />
                                    </form>"; 
                        }
                        ?>
                        <br/>
                    </ul>

                </div>

                <li>
                    <INPUT class="twitter" type="image" src="./imagenes/Twitter.png" value="" onClick="popUp('<?php echo $datosNoticiaIndividual[0]["Titulo"] ?>','<?php echo  $datosNoticiaIndividual[0]["Nombre"] ?>','Twitter')"/>
                </li>
                <li>
                    <INPUT class="Facebook" type="image" src="./imagenes/Facebook.png" value="" onClick="popUp('<?php echo $datosNoticiaIndividual[0]["Titulo"] ?>','<?php echo  $datosNoticiaIndividual[0]["Nombre"] ?>','Facebook')"/>
                </li>
                <li>
                    <?php
                        echo
                            "<a title='Formato de impresión' href=index.php?sec=Noticias&id=". $datosNoticiaIndividual[0]["ID"] ."&imp=1 target='_blank'><img src='./imagenes/botonimprimir.jpg' alt='Imprimir' class='Imprimir' /></a>";
                    ?>
                    
                </li>

            </ul>

        </div>

    </div>
    <div id="auxiliar">
    <?php
        $video = $datosNoticiaIndividual[0]['Video'];
        echo
            "<p class='entradilla'>". $datosNoticiaIndividual[0]['Entradilla'] . "</p>
            <p class='autor'>". $datosNoticiaIndividual[0]['NombreUsuario'] . "</p>
            <p class='fecha'> Fecha Publicación: ". $datosNoticiaIndividual[0]['FechaPubli'] . ", Fecha Modificación: ". $datosNoticiaIndividual[0]['FechaEdi'] . "</p>";
            if($video!=''){
                echo "<iframe width='560' height='315' src='" . $video . "' frameborder='0' allowfullscreen></iframe>";
            }else{
                echo "<figure class='imgCuerpo'>
                    <img src=". $datosNoticiaIndividual[1]['Nombre'] . " alt=". $datosNoticiaIndividual[1]['Alt'] . " class='imgCuerpo' />
                    <figcation>". $datosNoticiaIndividual[1]['Pie'] . "</figcation>
                </figure>";
            }
            echo "<p class='cuerpo'>".$datosNoticiaIndividual[0]['Cuerpo']."</p>";
    ?>
    </div>
    </div>   
    <!-- Javascript -->
        <script language="JavaScript" src="./js/funciones.js"></script> 
</div>
    
    

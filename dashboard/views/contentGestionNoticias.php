<div id="content">
    <div id="funciones">
    <?php
        include("controllers/noticiasController.php");
        include("controllers/imagenesController.php");
        
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
        
    
        echo
        "<p class='seccion'>" . $seccion . "</p>";
        
        if(isset($_POST['incluirFinal'])){
            
            $seccion = $_POST['seccion'];
            
            if(is_uploaded_file($_FILES['imagen']['tmp_name'])) { // verifica haya sido cargado el archivo 
                $ruta = "imagenes/".$_FILES['imagen']['name'];
                move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
            }
            if(is_uploaded_file($_FILES['imagenCuerpo']['tmp_name'])) { // verifica haya sido cargado el archivo 
                $rutaCuerpo = "imagenes/".$_FILES['imagenCuerpo']['name'];
                move_uploaded_file($_FILES['imagenCuerpo']['tmp_name'], $rutaCuerpo);
            }
            
            $alt1 = $_POST['altImgPortada'];
            $pie1 = $_POST['pieImgPortada'];
            $result = $img1->incluirImagen($ruta, $alt1, $seccion, $pie1);
            $alt2 = $_POST['altImgCuerpo'];
            $pie2 = $_POST['pieImgCuerpo'];
            $result = $img2->incluirImagen($rutaCuerpo, $alt2, $seccion, $pie2);
            $datosImagen = $img1->getImagenByNombre($ruta);
            $datosImagenCuerpo = $img2->getImagenByNombre($rutaCuerpo);
            
            $tituloP = $_POST['tituloP'];
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $entradilla = $_POST['entradilla'];
            $cuerpo = $_POST['cuerpo'];
            $imagen = $datosImagen[0]['ID'];
            $imagenCuerpo = $datosImagenCuerpo[0]['ID'];
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

            $hoy = $date['mday']."/".$date['mon']."/".$date['year'];
            
            $datosSeccion1 = $seccion2->getSeccionByNombre($seccion);
            $idSeccion = $datosSeccion1[0]['ID'];
            
            $datosAutor1 = $usuario2->getUsuarioByNombre($autor);
            $idAutor = $datosAutor1[0]['ID'];
            
            $result = $not2->incluirNoticia($tituloP, $titulo, $subtitulo, $entradilla, $cuerpo, $imagen, $imagenCuerpo, $video, $idAutor, $hoy, $etiqueta, $idSeccion);
            
            header("location:index.php?sec=GestorNoticias");
            
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
            
            header("location:index.php?sec=GestorNoticias");
            
        }else if(isset($_POST['modificarNoticia'])){
            
            $idNoticia = $_POST['modificarNoticia'];
            $tituloP = $_POST['tituloP'];
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $entradilla = $_POST['entradilla'];
            $cuerpo = $_POST['cuerpo'];
            $imagen = $_POST['imagen'];
            $imagenCuerpo = $_POST['imagenCuerpo'];
            $video = $_POST['video'];
            $autor = $_POST['autor'];
            $etiqueta = $_POST['etiqueta'];
            $seccion = $_POST['seccion'];
     
        echo    "<form method='POST' enctype='multipart/form-data'>
                <table>
                    <tr>
                        <td>Titulo de Portada*:</td>
                        <td><textarea name='tituloP' id='textComment' rows='2' cols='50' maxlength='96' required placeholder='Titulo llamativo' >".$tituloP."</textarea></td>
                    </tr>
                    <tr>
                        <td>Titulo*:</td>
                        <td><textarea name='titulo' id='textComment' rows='2' cols='50' maxlength='96' required placeholder='Titulo'>".$titulo."</textarea></td>
                    </tr>
                    <tr>
                        <td>Subtitulo*:</td>
                        <td><textarea name='subtitulo' id='textComment' rows='2' cols='50' maxlength='96' required placeholder='Subtitulo'>".$subtitulo."</textarea></td>
                    </tr>
                    <tr>
                        <td>Entradilla*:</td>
                        <td><textarea name='entradilla' id='textComment' rows='4' cols='50' required placeholder='Entradilla'>".$entradilla."</textarea></td>
                    </tr>
                    <tr>
                        <td>Cuerpo*:</td>
                        <td><textarea name='cuerpo' id='textComment' rows='15' cols='50' required placeholder='Cuerpo de la noticia'>".$cuerpo."</textarea></td>
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
                        <input type='hidden' value=".$imagen." name='imagen'/>
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
                        <input type='hidden' value=".$imagenCuerpo." name='imagenCuerpo'/>
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
                        <td><textarea name='video' id='textComment' rows='2' cols='50' maxlength='96' placeholder='Enlace del Video en Youtube'>".$video."</textarea></td>
                    </tr>";
                    
                    $datosAutor = $usuario1->getUsuarioById($autor);
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
                        <td><textarea name='etiqueta' id='textComment' rows='1' cols='50' maxlength='46' required placeholder='Etiqueta' >".$etiqueta."</textarea></td>
                    </tr>
                    <tr>";
        
                    $datosSeccion = $seccion1->getSeccionById($seccion);
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
                        <td><button value=".$idNoticia." name='modificarFinal'>Modificar Noticia</button></td>
                        <td><input type='reset' value='Reset' /></td>
                    </tr>
                </table>
            </form>
            <hr/>";
    ?>
    <?php
        }else if(isset($_POST['modificarEstado'])){
            
            $estado = $_POST['modificarEstado'];
            $idNoticia = $_POST['idNoticia'];
            
            if($estado == 'Publicado'){
                $estado = 'Pendiente';
            }else $estado = 'Publicado';
            
            $date = getdate();

            if($date['hours']<10){
                $date['hours'] = "0".$date['hours'];
            }
            if($date['minutes']<10){
                $date['minutes'] = "0".$date['minutes'];
            }

            $hoy = $date['mday']."/".$date['mon']."/".$date['year'];
            
            $result = $not2->modificarEstadoNoticia($idNoticia, $estado, $hoy);
            
            header("location:index.php?sec=GestorNoticias");
            
        }else if(isset($_POST['eliminarNoticia'])){
            
            $idNoticia = $_POST['eliminarNoticia'];
            
            $result = $not2->eliminarNoticia($idNoticia);
            
            header("location:index.php?sec=GestorNoticias");
            
        }else if(isset($_POST['incluirNoticia'])){   
    ?>
            <form method='POST' enctype='multipart/form-data' >
                <table>
                    <tr>
                        <td>Titulo de Portada*:</td>
                        <td><textarea name="tituloP" id='textComment' rows='2' cols='50' maxlength="96" required placeholder='Titulo llamativo' ></textarea></td>
                    </tr>
                    <tr>
                        <td>Titulo*:</td>
                        <td><textarea name="titulo" id='textComment' rows='2' cols='50' maxlength="96" required placeholder='Titulo'></textarea></td>
                    </tr>
                    <tr>
                        <td>Subtitulo*:</td>
                        <td><textarea name="subtitulo" id='textComment' rows='2' cols='50' maxlength="96" required placeholder='Subtitulo'></textarea></td>
                    </tr>
                    <tr>
                        <td>Entradilla*:</td>
                        <td><textarea name="entradilla" id='textComment' rows='4' cols='50' required placeholder='Entradilla'></textarea></td>
                    </tr>
                    <tr>
                        <td>Cuerpo*:</td>
                        <td><textarea name="cuerpo" id='textComment' rows='15' cols='50' required placeholder='Cuerpo de la noticia'></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><p id="warning">Las dos imagenes tienen que ser diferentes</p></td>
                    <tr>
                        <td>Imagen de Portada*:</td>
                        <td><input type="file" name="imagen" accept='image/*' required /></td>
                    </tr>
                    <tr>
                        <td>Alt imagen Portada:</td>
                        <td><textarea name='altImgPortada' id='textComment' rows='1' cols='50' maxlength='46' required placeholder='Alt de la imagen de portada' ></textarea></td>
                    </tr>
                    <tr>
                        <td>Pie Foto Portada:</td>
                        <td><textarea name='pieImgPortada' id='textComment' rows='1' cols='50' required maxlength='46' placeholder='Pie de la foto de portada' ></textarea></td>
                    </tr>
                    <tr>
                        <td>Imagen del Cuerpo*:</td>
                        <td><input type="file" name="imagenCuerpo" accept='image/*' required /></td>
                    </tr>
                    <tr>
                        <td>Alt imagen Cuerpo:</td>
                        <td><textarea name='altImgCuerpo' id='textComment' rows='1' cols='50' maxlength='46' required placeholder='Alt de la imagen del cuerpo' ></textarea></td>
                    </tr>
                    <tr>
                        <td>Pie Foto Cuerpo:</td>
                        <td><textarea name='pieImgCuerpo' id='textComment' rows='1' cols='50' maxlength='46' required placeholder='Pie de la imagen del cuerpo' ></textarea></td>
                    </tr>
                    <tr>
                        <td>Video:</td>
                        <td><textarea name="video" id='textComment' rows='2' cols='50' maxlength="96" placeholder='Enlace del Video en Youtube'></textarea></td>
                    </tr>
    <?php
                    if($editorJefe){
                        $autores =  $usuario3->getUsuarios();

                        echo
                        "<tr>
                            <td>Autor*:</td>
                            <td><select name='autor' id='textComment' required >";
                                foreach($autores as $opcion){
                                    echo "<option>".$opcion['NombreUsuario']."</option>";              
                                }

                        echo 
                            "</select></td>
                        </tr>";
                        
                    }else if($redactor || $colaborador){
                        echo
                        "<tr>
                            <td>Autor*:</td>
                            <td>
                                <select name='autor' id='textComment' required >
                                <option selected>".$nombreUsuario."</option></select>
                            </td>
                        </tr>";
                    }
                    
    ?>
                    <tr>
                        <td>Etiqueta*:</td>
                        <td><textarea name="etiqueta" id='textComment' rows='1' cols='50' maxlength="46" required placeholder='Etiqueta' ></textarea></td>
                    </tr>
                    
    <?php
                        echo
                        "<tr>
                            <td>Sección*:</td>
                            <td><select name='seccion' id='textComment' required >";
                                foreach($datosSecciones as $opcion){
                                    echo "<option>".$opcion['Nombre']."</option>";              
                                }

                        echo 
                            "</select></td>
                        </tr>";
    ?>
      
                    <tr>
                        <td><button name="incluirFinal">Añadir Noticia</button></td>
                        <td><input type="reset" value="Reset" /></td>
                    </tr>
                </table>
            </form>
            <hr/>
    <?php
        }
    ?>   
        <ul id="botones">
            <li><form method="POST"><button name="incluirNoticia">Incluir Nueva Noticia</button></form></li>
        </ul>
        <hr/> 
    </div>
    <div id="listaNoticias">
    <?php
        if($editorJefe){
            foreach ($datosSecciones as $secc){
                if($secc['Padre']==1){
                    echo "<h3>Noticias ".$secc['Nombre']."</h3><hr/>";
                    foreach($datosNoticiasTodas as $datoNot){
                        if($datoNot['Seccion']==$secc['ID']){
                            echo 
                                "<ul>
                                    <li><h4>".$datoNot["Titulo"]."</h4></li>
                                    <li class='infoNoticia'>Autor: ".$datoNot["NombreUsuario"]."</li>
                                    <li class='infoNoticia'>Fecha Publicación: ".$datoNot["FechaPubli"]."</li>
                                    <li class='infoNoticia'>Fecha Edición: ".$datoNot["FechaEdi"]."</li>
                                    <li class='infoNoticia'>Estado: ".$datoNot["Estado"]."</li>
                                    <br/>
                                    <br/>
                                    <li>    
                                    <form method='POST' class='botonFuncion'>
                                        <input type='hidden' value=".$datoNot["ID"]." name='idNoticia'/>
                                        <input type='hidden' value='".$datoNot["TituloP"]."' name='tituloP'/>
                                        <input type='hidden' value='".$datoNot["Titulo"]."' name='titulo'/>
                                        <input type='hidden' value='".$datoNot["Subtitulo"]."' name='subtitulo'/>
                                        <input type='hidden' value='".$datoNot["Entradilla"]."' name='entradilla'/>
                                        <input type='hidden' value='".$datoNot["Cuerpo"]."' name='cuerpo'/>
                                        <input type='hidden' value=".$datoNot["Imagen"]." name='imagen'/>
                                        <input type='hidden' value=".$datoNot["ImagenCuerpo"]." name='imagenCuerpo'/>
                                        <input type='hidden' value='".$datoNot["Video"]."' name='video'/>
                                        <input type='hidden' value='".$datoNot["Autor"]."' name='autor'/>
                                        <input type='hidden' value='".$datoNot["Etiquetas"]."' name='etiqueta'/>
                                        <input type='hidden' value=".$datoNot["Seccion"]." name='seccion'/>
                                        <button value=".$datoNot["ID"]." name='modificarNoticia'>Ver / Modificar Noticia</button>
                                    </form>
                                    <form method='POST' class='botonFuncion'>
                                        <input type='hidden' value=".$datoNot["ID"]." name='idNoticia'/>
                                        <button value='".$datoNot['Estado']."' name='modificarEstado'>Cambiar Estado</button>
                                    </form>
                                    <form method='POST' class='botonFuncion'><button value=".$datoNot["ID"]." name='eliminarNoticia'>Eliminar Noticia</button></form>                    
                                    </li>
                                </ul>
                                <br/>
                                <hr class='fin' />
                                ";
                        }
                    }
                }
            }
        }
    ?>
    </div>
</div>
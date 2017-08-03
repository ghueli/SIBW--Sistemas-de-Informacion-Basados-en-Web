<div id="content">
    <div id="funciones">
    <?php
    
        echo
        "<p class='seccion'>" . $seccion . "</p>";
        
        if(isset($_POST['incluirPublicidad'])){
            
            echo    "<form method='POST' enctype='multipart/form-data'>
                <table>
                    <tr>
                        <td>Imagen de Publicidad*:</td>
                        <td><input type='file' name='imagen' accept='image/*' /></td>
                    </tr>
                    <tr>
                        <td>URL*:</td>
                        <td><textarea name='url' id='textComment' rows='2' cols='50' required placeholder='url'></textarea></td>
                    </tr>
                    <tr>
                        <td><button name='incluirPublicidadFinal'>Añadir Publicidad</button></td>
                        <td><input type='reset' value='Reset' /></td>
                    </tr>
                </table>
                <hr/>";
            
        }else if(isset($_POST['incluirPublicidadFinal'])){
            
            if(is_uploaded_file($_FILES['imagen']['tmp_name'])) { // verifica haya sido cargado el archivo 
                $ruta = "imagenes/".$_FILES['imagen']['name'];
                move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
            }
            
            $url = $_POST['url'];
            
            $result = $publi->incluirPublicidad($ruta, $url);
            
            header("location:index.php?sec=GestorPublicidad");
            
        }else if(isset($_POST['eliminarPublicidad'])){
            
            $idPubli = $_POST['eliminarPublicidad'];
            
            $result = $publi->eliminarPublicidad($idPubli);
            
            header("location:index.php?sec=GestorPublicidad");
            
        }else if(isset($_POST['modificarPublicidad'])){
            
            $idPubli = $_POST['modificarPublicidad'];
            $url = $_POST['url'];
            $imagen = $_POST['imagen'];
            
            echo    "<form method='POST' enctype='multipart/form-data'>
                <table>
                    <tr>
                        <input type='hidden' value=".$imagen." name='imagen'/>
                        <td>Imagen de Publicidad*:</td>
                        <td><input type='file' name='imagen' accept='image/*' /></td>
                    </tr>
                    <tr>
                        <td>URL*:</td>
                        <td><textarea name='url' id='textComment' rows='2' cols='50' required placeholder='url'>".$url."</textarea></td>
                    </tr>
                    <tr>
                        <td><button value=".$idPubli." name='modificarPublicidadFinal'>Enviar Modificación</button></td>
                        <td><input type='reset' value='Reset' /></td>
                    </tr>
                </table>
                <hr/>";
            
        }else if(isset($_POST['modificarPublicidadFinal'])){
            
            if(is_uploaded_file($_FILES['imagen']['tmp_name'])) { // verifica haya sido cargado el archivo 
                $ruta = "imagenes/".$_FILES['imagen']['name'];
                move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
                
            }else{
                $ruta = $_POST['imagen'];
            }
            
            $idPubli = $_POST['modificarPublicidadFinal'];
            $url = $_POST['url'];
            
            $result = $publi1->modificarPublicidad($idPubli, $ruta, $url);
            
            //header("location:index.php?sec=GestorPublicidad");
            
        }
        
    ?>  
        <ul id="botones">
            <li><form method="POST"><button name="incluirPublicidad">Incluir Publicidad</button></form></li>
        </ul>
        <hr/>    
    <?php
        
    ?>
    </div>
    <div id="listaComentarios">
    <?php
        foreach($datosPublicidad as $publi){
            echo 
                "<ul>
                    <li><img class='listaImg' src='".$publi['imagen']."' /></li>
                    <li>  
                        <form method='POST' class='botonFuncion'>
                            <input type='hidden' value=".$publi["imagen"]." name='imagen'/>
                            <input type='hidden' value=".$publi["url"]." name='url'/>
                            <button value='".$publi["ID"]."' name='modificarPublicidad'>Modificar Publicidad</button>
                        </form>
                        <form method='POST' class='botonFuncion'><button value='".$publi["ID"]."' name='eliminarPublicidad'>Eliminar Publicidad</button></form> 
                    </li>
                </ul>
                <br/>
                <hr class='fin' />
                ";
        }
    ?>
    </div>
</div>
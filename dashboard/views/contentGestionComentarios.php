<div id="content">
    <div id="funciones">
    <?php
        include("controllers/comentariosController.php");
    
        echo
        "<p class='seccion'>" . $seccion . "</p>";
        
        if(isset($_POST['enviarModificacion'])){
            $idComentario = $_POST['idComentario'];
            $username = $_POST['autor'];
            $email = $_POST['email'];
            $texto = $_POST['texto'];
            $result = $comentario->modificarComentario($idComentario, $username, $email, $texto);
            
            header("location:index.php?sec=GestorComentarios");
        }else if(isset($_POST['modificarComentario'])){
    ?>
            <form id='comment3' method='POST' >
                <table>
                    <tr>
                        <p>Escribe tu comentario:</p>
                    </tr>
                    <tr>
                        <td>Autor:</td>
    <?php
                    echo "
                        <input type='hidden' name='idComentario' id='idComentario' value='".$_POST['idComentario']."'/>
                        <td><input type='text' name='autor' id='autor' required placeholder='".$_POST['autor']."' value='".$_POST['autor']."'/></td>
    
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type='text' name='email' id='email' required pattern = '[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+\.+[a-zA-Z0-9]{2,4}$' placeholder='".$_POST['email']."' value='".$_POST['email']."' /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><textarea name='texto' id='textComment' rows='5' cols='30' onkeyup='comprobar()' required placeholder='Comentario'>".$_POST['modificarComentario']."</textarea></td>";
    ?>
                    </tr>
                    <tr>
                        <td><button name="enviarModificacion">Enviar Modificacion</button></td>
                        <td><input type="reset" value="Reset"></td>
                    </tr>
                </table>
                <hr/>
            </form>
    <?php
        }else if(isset($_POST['eliminarComentario'])){
            $result = $comentario->eliminarComentario($_POST['eliminarComentario']);
            
            header("location:index.php?sec=GestorComentarios");
        }else if(isset($_POST['enviar'])){
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
            
            header("location:index.php?sec=GestorComentarios");
            
        }else if(isset($_POST['incluirComentario'])){   
    ?>
            <form id='comment3' method='POST' >
                <table>
                    <tr>
                        <p>Escribe tu comentario:</p>
                    </tr>
                    <tr>
                        <td>Autor:</td>
                        <td><input type="text" name="autor" id="autor" required placeholder="Nombre o seudonimo" /></td>
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
            <hr/>
    <?php
        }
    ?>
           
        <ul id="botones">
            <li><form method="POST"><button name="incluirComentario">Incluir Comentario</button></form></li>
        </ul>
        <hr/> 
            
    <?php
        
    ?>
    </div>
    <div id="listaComentarios">
    <?php
        foreach($datosComentarios as $datoCom){
            echo 
                "<ul>
                    <li>".$datoCom["Nombre"].", escribió:</li>
                    <li>".$datoCom["FechayHora"]."</li>
                    <li><p>".$datoCom["Texto"]."</p></li>
                    <li>    
                        <form method='POST' class='botonFuncion'>
                            <input type='hidden' value=".$datoCom["ID"]." name='idComentario'/>
                            <input type='hidden' value=".$datoCom["Nombre"]." name='autor'/>
                            <input type='hidden' value=".$datoCom["Correo"]." name='email'/>
                            <button value='".$datoCom["Texto"]."' name='modificarComentario'>Modificar Comentario</button>
                        </form>
                        <form method='POST' class='botonFuncion'><button value='".$datoCom["ID"]."' name='eliminarComentario'>Eliminar Comentario</button></form> 
                    </li>
                </ul>
                <br/>
                <hr class='fin' />
                ";
        }
    ?>
    </div>
</div>
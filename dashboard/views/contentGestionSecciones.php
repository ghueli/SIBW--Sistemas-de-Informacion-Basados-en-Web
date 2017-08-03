<div id="content">
    <div id="funciones">
    <?php
    
        echo
        "<p class='seccion'>" . $seccion . "</p>";
        
        if(isset($_POST['incluirSeccion'])){
            
    ?>     
        
            <form method='POST' class='botonFuncion'>
                <label>Nombre de la sección:</label>
                <input type='text' name='nombreSeccion'/>
                <br/><br/>
                <button value='".$secc["ID"]."' name='incluirFinal'>Añadir Sección</button>
            </form>
            <hr/>
            
    <?php    
    
        }else if(isset($_POST['incluirFinal'])){
            
            $nombreSec = $_POST['nombreSeccion'];
            $padreSec = 0;
            
            $result = $seccion3->incluirSeccion($nombreSec, $padreSec);
            
            header("location:index.php?sec=GestorSecciones");
            
        }else if(isset($_POST['eliminarSeccion'])){
            
            $result = $seccion3->eliminarSeccion($_POST['eliminarSeccion']);
            
            header("location:index.php?sec=GestorSecciones");
            
        }else if(isset($_POST['incluirSubseccion'])){
            
            $nombreSec = $_POST['nombreSeccion'];
            $idSecc = $_POST['incluirSubseccion'];
            
        
        echo"   <form method='POST' class='botonFuncion'>
                <label>Incluir subsección a ".$nombreSec.":</label>
                <input type='text' name='nombreSubSeccion'/>
                <input type='hidden' value=".$nombreSec." name='nombrePadre'/>
                <br/><br/>
                <button value='".$idSecc."' name='incluirSubseccionFinal'>Añadir Subsección</button>
            </form>
            <hr/>";          
        }else if(isset($_POST['incluirSubseccionFinal'])){
            
            $idPadre = $_POST['incluirSubseccionFinal'];
            $nombreSec = $_POST['nombreSubSeccion'];
              
            $result = $seccion3->incluirSeccion($nombreSec, $idPadre);
            
            header("location:index.php?sec=GestorSecciones");
            
        }else if(isset($_POST['modificarSeccion'])){
            
            $nombreSec = $_POST['nombreSeccion'];
            $idSecc = $_POST['modificarSeccion'];
            $idPadre = $_POST['numeroPadre'];
            
            if($idPadre !== '0'){
                $datosPadre = $seccion4->getSeccionById($idPadre);
                $nombrePadre = $datosPadre[0]['Nombre'];
            }else{
                $nombrePadre = "Ninguno";
            }
            
            echo"   <form method='POST' class='botonFuncion'>
                <label>Nombre de la Sección:</label>
                <input type='text' placeholder='".$nombreSec."' value ='".$nombreSec."' name='nombreSeccion'/>
                <br/><br/>";

                $seccionesMenosUna = $seccion5->getSeccionesMenosEsa($nombrePadre);

  
            echo "<label>Nombre de sección padre :</label>
                <select name='nombrePadre' id='textComment' required >
                    <option selected>".$nombrePadre."</option>";
                    foreach($seccionesMenosUna as $opcion){
                        if($opcion['Nombre']!=$nombreSec){
                            echo "<option>".$opcion['Nombre']."</option>";    
                        }
                    }
            echo "</select>
                <br/><br/>   
                <button value='".$idSecc."' name='modificarSeccionFinal'>Enviar Modificación</button>
            </form>
            <hr/>";    
            
        }else if(isset($_POST['modificarSeccionFinal'])){
            
            $nombreSec = $_POST['nombreSeccion'];
            $idSecc = $_POST['modificarSeccionFinal'];
            $nombrePadre = $_POST['nombrePadre'];
         
            $datosPadre = $seccion4->getSeccionByNombre($nombrePadre);
            $idPadre = $datosPadre[0]['ID'];
            
            $result = $seccion4->modificarSeccion($idSecc, $nombreSec, $idPadre);
            
            header("location:index.php?sec=GestorSecciones");
        }
        
    ?>
           
        <ul id="botones">
            <li><form method="POST"><button name="incluirSeccion">Incluir Seccion</button></form></li>
        </ul>
        <hr/>    
    <?php
        
    ?>
    </div>
    <div id="listaComentarios">
    <?php
        foreach($datosSecciones as $secc){
            
//            if($secc["Padre"]!=0){ 
//                $datosSiHayPadre = $seccion6->getSeccionById($secc["Padre"]);
//                $nombreSiHayPadre = $datosSiHayPadre[0]['Nombre']." / ";
//            }else{
//                $nombreSiHayPadre = "";
//            }
            
            echo 
                "<ul>
                    <li><h4>".$secc["Nombre"]."</h4></li>
                    <li>  
                        <form method='POST' class='botonFuncion'>
                            <input type='hidden' value=".$secc["Nombre"]." name='nombreSeccion'/>
                            <input type='hidden' value='".$secc["Padre"]."' name='numeroPadre'/>
                            <button value='".$secc["ID"]."' name='modificarSeccion'>Modificar Sección</button>
                        </form>
                        <form method='POST' class='botonFuncion'>
                            <input type='hidden' value=".$secc["Nombre"]." name='nombreSeccion'/>
                            <button value='".$secc["ID"]."' name='incluirSubseccion'>Incluir Subseccion</button>
                        </form>
                        <form method='POST' class='botonFuncion'><button value='".$secc["ID"]."' name='eliminarSeccion'>Eliminar Sección</button></form> 
                    </li>
                </ul>
                <br/>
                <hr class='fin' />
                ";
        }
    ?>
    </div>
</div>
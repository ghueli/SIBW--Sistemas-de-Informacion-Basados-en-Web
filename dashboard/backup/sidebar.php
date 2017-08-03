<?php

    $seleccion = 'SELECT * FROM publicidad';
    $publi = mysql_query ($seleccion, $conexion);

    $fila = mysql_fetch_row ($publi);

?>

<div id="sidebar">
    
    <p class="tituloRelac">Publicidad</p>
    
    <div id="publi">
                
        <hr/>
        <ul>
            
            <?php
            
                for($contador = 0; $contador < mysql_num_rows($publi); $contador++){
                    echo 
                        "<li><a href=" . $fila[2] . "><img src=" . $fila[1] . " alt='Timo Nintendo'/></a></li>";
                    $fila = mysql_fetch_row ($publi);
                }
            
            ?>
            

        </ul>
        
    </div>
</div>
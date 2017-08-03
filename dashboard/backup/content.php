<?php

    $seleccion = 'SELECT TituloP, Entradilla, Imagen FROM noticia';
    $noticias = mysql_query ($seleccion, $conexion);

    $fila = mysql_fetch_row ($noticias);

?>
        <div id="content">
            <div class="principal">

                <?php

                    $selecImg = "SELECT Nombre FROM imagen WHERE ID = '".$fila[2]."'";
                    $img = mysql_query ($selecImg, $conexion);

                    $filaImg = mysql_fetch_row ($img);

                    echo '<a title="Noticia Principal" href="html/noticia.html"><img src="' . $filaImg[0] . '" alt="ZeldaDLC"/></a>';

                ?>

            </div>
            <div class="tresColumnas">
                
            <!-- noticias columna 1 -->
            <div id="columna1">
                <ul>
                    <li>
                        
                        <?php
                        
                        $fila = mysql_fetch_row ($noticias);
                        
                        echo '<h2 id="titular2">' . $fila[0] . '</h2>';
                        
                        $selecImg = "SELECT Nombre FROM imagen WHERE ID = '".$fila[2]."'";
                        $img = mysql_query ($selecImg, $conexion);
                        
                        $filaImg = mysql_fetch_row ($img);

                        echo '<img src="' . $filaImg[0] . '" alt="Timo Nintendo" />';

                        echo '<p>' . $fila[1] . '</p>';
                             
                        ?>
                             
                    </li>
                    <li>
                        
                        <?php
                        
                        $fila = mysql_fetch_row ($noticias);
                        
                        echo '<h2 id="titular2">' . $fila[0] . '</h2>';
                        
                        $selecImg = "SELECT Nombre FROM imagen WHERE ID = '".$fila[2]."'";
                        $img = mysql_query ($selecImg, $conexion);
                        
                        $filaImg = mysql_fetch_row ($img);

                        echo '<img src="' . $filaImg[0] . '" alt="Borderlands 3"  />';

                        echo '<p>' . $fila[1] . '</p>';
                        
                        ?>
                        
                    </li>
                    <li>
                        
                        <?php
                        
                        $fila = mysql_fetch_row ($noticias);
                        
                        echo '<h2 id="titular2">' . $fila[0] . '</h2>';
                            
                        ?>
                            
                    </li>
                </ul>
            </div>
                
            <!-- noticias columna 2 -->
            <div id="columna2">
                <ul>
                    <li>
                        
                        <?php
                        
                        $fila = mysql_fetch_row ($noticias);
                        
                        echo '<h2 id="titular2">' . $fila[0] . '</h2>';
                        
                        $selecImg = "SELECT Nombre FROM imagen WHERE ID = '".$fila[2]."'";
                        $img = mysql_query ($selecImg, $conexion);
                        
                        $filaImg = mysql_fetch_row ($img);

                        echo '<img src="' . $filaImg[0] . '" alt="Videojuegos más vendidos" />';

                        echo '<p>' . $fila[1] . '</p>';
                             
                        ?>
                            
                    </li>
                    <li>
                        <?php
                        
                        $fila = mysql_fetch_row ($noticias);
                        
                        echo '<h2 id="titular2">' . $fila[0] . '</h2>';
                        
                        $selecImg = "SELECT Nombre FROM imagen WHERE ID = '".$fila[2]."'";
                        $img = mysql_query ($selecImg, $conexion);
                        
                        $filaImg = mysql_fetch_row ($img);

                        echo '<img src="' . $filaImg[0] . '" alt="LEGO City Undercover" />';

                        echo '<p>' . $fila[1] . '</p>';
                             
                        ?>
                    </li>
                    <li>
                        <?php
                        
                        $fila = mysql_fetch_row ($noticias);
                        
                        echo '<h2 id="titular2">' . $fila[0] . '</h2>';
                        
                        $selecImg = "SELECT Nombre FROM imagen WHERE ID = '".$fila[2]."'";
                        $img = mysql_query ($selecImg, $conexion);
                        
                        $filaImg = mysql_fetch_row ($img);

                        echo '<img src="' . $filaImg[0] . '" alt="Horizon PS4/PS4 Pro" />';
                        
                        ?>
                    </li>
                </ul>
            </div>
                
            <!-- noticias columna 3 -->
            <div id="columna3">
                <ul>
                    <li>
                        <?php
                        
                        $fila = mysql_fetch_row ($noticias);
                        
                        echo '<h2 id="titular2">' . $fila[0] . '</h2>';
                        
                        $selecImg = "SELECT Nombre FROM imagen WHERE ID = '".$fila[2]."'";
                        $img = mysql_query ($selecImg, $conexion);
                        
                        $filaImg = mysql_fetch_row ($img);

                        echo '<img src="' . $filaImg[0] . '" alt="marzo2017" />';
                        
                        ?>
                    </li>
                    <li>
                        <?php
                        
                        $fila = mysql_fetch_row ($noticias);
                        
                        echo '<h2 id="titular2">' . $fila[0] . '</h2>';
                        
                        $selecImg = "SELECT Nombre FROM imagen WHERE ID = '".$fila[2]."'";
                        $img = mysql_query ($selecImg, $conexion);
                        
                        $filaImg = mysql_fetch_row ($img);

                        echo '<img src="' . $filaImg[0] . '" alt="psPlus Marzo"  width = "300px" height = "150px"/>';
                        
                        ?>
                    </li>
                    <li>
                        <?php
                        
                        $fila = mysql_fetch_row ($noticias);
                        
                        echo '<h2 id="titular2">' . $fila[0] . '</h2>';
                        
                        $selecImg = "SELECT Nombre FROM imagen WHERE ID = '".$fila[2]."'";
                        $img = mysql_query ($selecImg, $conexion);
                        
                        $filaImg = mysql_fetch_row ($img);

                        echo '<img src="' . $filaImg[0] . '" alt="Nier:Automata" />';
                        
                        ?>
                    </li>
                    <li>
                        <?php
                        
                        $fila = mysql_fetch_row ($noticias);
                        
                        echo '<h2 id="titular2">' . $fila[0] . '</h2>';
                        
                        $selecImg = "SELECT Nombre FROM imagen WHERE ID = '".$fila[2]."'";
                        $img = mysql_query ($selecImg, $conexion);
                        
                        $filaImg = mysql_fetch_row ($img);

                        echo '<img src="' . $filaImg[0] . '" alt="ZeldaFin" />';
                        
                        ?>
                    </li>
                </ul>
            </div>
            </div>
            
        </div>
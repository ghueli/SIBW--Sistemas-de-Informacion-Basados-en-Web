<?php
    
    include "connectDB.php";

    $seleccion = 'SELECT * FROM seccion';
    $secciones = mysql_query ($seleccion, $conexion);

    $fila = mysql_fetch_row ($secciones);

?>
<!DOCTYPE html>
<html>
    <!-- Autores -->
    <!-- Guillermo Hueli Campos -->
    <!-- Alejandro García Vallecillo -->
    
    
    <!-- Cabecera de portada.html -->
    <head>
    
        <!-- Necesario para incluir tildes -->
        <meta charset="UTF-8"/>
        <!-- Titulo de portada.html -->
        <title>Mad Gamer</title>
        <!-- Hoja de estilos -->
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <!-- Icono de la web -->
        <link rel="icon" href="Imagenes/favicon.ico" type="image/x-icon"/>
    
    </head>
    
    <!-- Cuerpo de portada.html -->
    <body>

        <!-- Division en la web que pertenece al header -->
        <div class="header">
        
            <!-- Imagen de cabecera de portada.html -->
            <img src="imagenes/cabecera5.png" alt="MadGamer"/>
            
            <div class="nav">

                <ul>

                    <?php
                    
                        for($contador = 0; $contador < mysql_num_rows($secciones); $contador++){
                            echo
                                '<li><a href="' . $fila[2] . '">' . $fila[1] . '</a></li>';
                            $fila = mysql_fetch_row ($secciones);
                        }
                    
                    ?>

                </ul>

            </div>
        
        </div>
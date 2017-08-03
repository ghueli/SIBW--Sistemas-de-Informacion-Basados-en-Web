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
        
        <style>
            
            body{
                width: 1000px;
                margin: auto;
            }
            
            .nWeb{
                font-size: 45px;
                text-align: center;
                clear: both;
                
            }
            
            .logo{
                float:left;
                width: 200px;
                height: 50px;
            }            
            
            .general{
                text-align: justify;
            }
            
            .titulo{
    
                font-size: 35px;
                font-weight: bold;

            }

            .subtitulo{

                font-size: 25px;
                font-style: italic;

            }

            .entradilla2{

                font-size: 25px;
                font-weight: bold;
            

            }
            
            .autor, .fecha{
                
                font-size: 20px;
                
            }

            .cuerpo{
                font-size: 27px;
                column-count: 2;
            }
            
            #imgCuerpo{
                text-align: center;
               
            }
            
            #imgCuerpo img{
                width: 1000px;
               
            }
        
        </style>
        
        <!-- Icono de la web -->
        <link rel="icon" href="../Imagenes/favicon.ico" type="image/x-icon">
    
    </head>
    
    <!-- Cuerpo de portada.html -->
    <body>

        <!-- Division en la web que pertenece al header -->
        <div class="header">
            <img class="logo" src="./imagenes/cabecera5.png" alt="MadGamer"/>
            <p class="nWeb">MAD GAMER</p>
            <hr class="linea"/>
        </div>
        
        
        
        <!-- Division en la web que pertenece al contenido -->
        <div class="general">
            
            <h2>Noticias</h2>
            
            <?php
                echo 
                    "<p class='titulo'>" . $datosNoticiaIndividual[0]['Titulo'] . "</p>
                    <p class='subtitulo'>" . $datosNoticiaIndividual[0]['Subtitulo'] . "</p>
                    <p class='entradilla2'>" . $datosNoticiaIndividual[0]['Entradilla'] . "</p>
                    <p class='fecha'> Fecha Publicación: ". $datosNoticiaIndividual[0]['FechaPubli'] . ", Fecha Modificación: ". $datosNoticiaIndividual[0]['FechaEdi'] . "</p>
                    <p class='autor'>". $datosNoticiaIndividual[0]['NombreUsuario'] . "</p>
                    <div id='imgCuerpo'><img src=". $datosNoticiaIndividual[1]['Nombre'] ." alt=". $datosNoticiaIndividual[1]['Alt'] ." class='imagen' />
                    <p>". $datosNoticiaIndividual[1]['Pie'] . "<p></div>
                    
                    ". $datosNoticiaIndividual[0]['Cuerpo'] ."";
        
         
            ?>
            
                                  
        </div>
    
    </body>

</html>
    
    

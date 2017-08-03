
<div id="content">
    <?php
        echo "<p class='seccion'>" . $seccion . "</p>";
        $contador = 0;
        echo "<div class='titulillo'>
        <a   href='index.php?rel=". $datosNoticias[$contador]["Etiquetas"] ."&sec=Noticias&id=". $datosNoticias[$contador]["ID"] ."'><h2>" . $datosNoticias[$contador]["TituloP"] . "</h2></a>
        </div>";
    ?>
    <div class="principal">
        <?php
            
            for(; $contador<1; $contador++){
                echo "<a href='index.php?rel=". $datosNoticias[$contador]["Etiquetas"] ."&sec=Noticias&id=". $datosNoticias[$contador]["ID"] ."'><img src=" . $datosNoticias[$contador]["Nombre"] . " alt=" . $datosNoticias[$contador]["Alt"] . "/></a>";
            }
        ?>
    </div>
    <div class="tresColumnas">

        <!-- noticias columna 1 -->
        <div id="columna1">
            <ul>
                <?php
                    for(; $contador<4; $contador++) {
                        echo 
                             "<li>
                             <a href='index.php?rel=". $datosNoticias[$contador]["Etiquetas"] ."&sec=Noticias&id=". $datosNoticias[$contador]["ID"] ."'><h2>" . $datosNoticias[$contador]["TituloP"] . "</h2></a>
                             <a href='index.php?rel=". $datosNoticias[$contador]["Etiquetas"] ."&sec=Noticias&id=". $datosNoticias[$contador]["ID"] ."'><img src=" . $datosNoticias[$contador]["Nombre"] . " alt=" . $datosNoticias[$contador]["Alt"] . "/></a>
                             </li>";

                    }
                ?>
            </ul>
        </div>
        <!-- noticias columna 1 -->
        <div id="columna2">
            <ul>
                <?php
                    for(; $contador<7; $contador++) {
                        echo 
                             "<li>
                             <a href='index.php?rel=". $datosNoticias[$contador]["Etiquetas"] ."&sec=Noticias&id=". $datosNoticias[$contador]["ID"] ."'><h2>" . $datosNoticias[$contador]["TituloP"] . "</h2></a>
                             <a href='index.php?rel=". $datosNoticias[$contador]["Etiquetas"] ."&sec=Noticias&id=". $datosNoticias[$contador]["ID"] ."'><img src=" . $datosNoticias[$contador]["Nombre"] . " alt=" . $datosNoticias[$contador]["Alt"] . "/></a>
                             </li>";

                    }
                ?>
            </ul>
        </div>
        <!-- noticias columna 1 -->
        <div id="columna3">
            <ul>
                <?php
                    for(; $contador<10; $contador++) {
                        echo 
                             "<li>
                             <a href='index.php?rel=". $datosNoticias[$contador]["Etiquetas"] ."&sec=Noticias&id=". $datosNoticias[$contador]["ID"] ."'><h2>" . $datosNoticias[$contador]["TituloP"] . "</h2></a>
                             <a href='index.php?rel=". $datosNoticias[$contador]["Etiquetas"] ."&sec=Noticias&id=". $datosNoticias[$contador]["ID"] ."'><img src=" . $datosNoticias[$contador]["Nombre"] . " alt=" . $datosNoticias[$contador]["Alt"] . "/></a>
                             </li>";

                    }
                ?>
            </ul>
        </div>
    </div>
</div>
    
    

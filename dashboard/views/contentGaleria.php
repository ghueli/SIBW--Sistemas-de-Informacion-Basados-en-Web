
<div id="content">
    <?php
        echo "<p class='seccion'>" . $seccion . "</p>";
    ?>
    <div id="galeria">
        <ul>
            <?php
                foreach($datosImagenes as $datoImg) {
                    echo "<li><img src=" . $datoImg["Nombre"] . " alt=" . $datoImg["Alt"] . " /></li>";
                }
            ?>
        </ul>
    </div>
</div>
    
    

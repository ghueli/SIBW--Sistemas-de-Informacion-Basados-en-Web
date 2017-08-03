<div id="content">
    <?php
        echo "<p class='seccion'>" . $seccion . "</p>";
    ?>
    <div id="lanzamientos">
        <table border="0" rules="rows" id="tabla">
            <tr id="nombres">
              <td id="fecha">Fecha</td>
              <td id="titulo">Titulo</td>
              <td id="plataforma">Plataforma</td>
            </tr>
            <?php
                $i = 0;
                foreach($datosLanzamientos as $datoLan) {
                    if($i%2==0){
                        echo "<tr bgcolor='#FBCC94' >
                                <td id='fecha'>". $datoLan["Fecha"] ."</td>
                                <td id='titulo'>". $datoLan["Nombre"] ."</td>
                                <td id='plataforma'>". $datoLan["Plataforma"] ."</td>
                              </tr>";
                    }else{
                        echo "<tr>
                                <td id='fecha'>". $datoLan["Fecha"] ."</td>
                                <td id='titulo'>". $datoLan["Nombre"] ."</td>
                                <td id='plataforma'>". $datoLan["Plataforma"] ."</td>
                              </tr>";
                    }
                    $i++;
                }
            ?>
        </table>
    </div>
</div>
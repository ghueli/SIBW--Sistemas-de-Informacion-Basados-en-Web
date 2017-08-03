
<?php

    header('Content-Type: text/html; charset=utf-8');

    // Incluye la cabecera de la web
    include "header.php";
?>

<!-- Division en la web que pertenece al contenido -->
<div class="general">

    <?php

        // Incluye el contenido de la web
        include "content.php";
        include "sidebar.php";
    ?>
    <div class="iconosSociales">
        <li>
            <a href="https://es-es.facebook.com/"><img id="faceIcon" src="imagenes/Facebook.png" alt="Facebook" /></a>
        </li>
        <li>
            <a href="https://twitter.com/?lang=es"><img id="twitterIcon" src="imagenes/Twitter.png" alt="Twitter" /></a>
        </li>
    </div>
    <p class="fin"></p>    
</div>

<?php
    // Incluye el footer de la web
    include "footer.php";
?>
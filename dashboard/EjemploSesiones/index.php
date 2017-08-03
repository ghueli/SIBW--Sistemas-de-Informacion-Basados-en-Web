<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Sesiones: Página 1</title>
    </head>
    <body>
        <?php
            if(isset($_SESSION['usuario'])){
                //Si estando el usuario identificado accede a la página por segunda vez o más,
                //entonces se muestra un mensaje avisando de que la seccion esta activa
                echo "<p>Ha vuelto a la página 1. Su sesion está activa y la inicio como ". $_SESSION['usuario']."</p>";
                echo "<p><a href='sesionPagina_3.php'>Cerrar sesion</a></p>";
            }else{
        ?>
                <!-- si accede a la pagina sin estar identificado se le muestra un formulario -->
                <form action="sesionPagina_2.php" method="POST">
                    <p>Nombre de usuario: <input type="text" placeholder="Escriba su nombre" name="usuario" required/></p>
                    <input type="submit" value="Pulse aqui para iniciar la sesion" />
                </form>
        <?php
            }
        ?>
            <p><a href="sesionPagina_2.php">Ir a la pagina 2</a></p>
    </body>
</html>
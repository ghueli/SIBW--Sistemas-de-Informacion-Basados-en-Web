<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Sesiones: Pagina 2</title>
    </head>
    <body>
        <?php
            if(isset($_POST['usuario'])){
                $_SESSION['usuario'] = $_POST['usuario'];
                echo "Esta en la pagina 2 y ha iniciado la sesion como: ".$_POST['usuario'];
            }else{
                if(isset($_SESSION['usuario'])){
                    echo "Ha vuelto a la pagina 2. Su sesion sigue activa y la inició como: ".$_SESSION['usuario'];
                    echo "<p>Otra informacion de su sesion es la siguiente:";
                        echo "<p>session_id: ".session_id()."</p>";
                        echo "<p>session_name: ".session_name()."</p>";
                        print_r(session_get_cookie_params());
                }else{
                    echo "Aviso: Acceso restringido. Debe iniciar sesion dando su nombre.";
                }
            }
        ?>
        <p><a href="index.php">Ir a la pagina 1</a></p>
    </body>
</html>
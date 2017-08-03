<div id="content">
    <div id="formularioLogin">
        <?php
        
            //include("controllers/usuariosController.php");
            
            $result = false;
        
            if(isset($_POST['registrarse'])){
                $username = $_POST['usuario'];
                $password = $_POST['contrasenia'];
                
                $result = $usuario->registrar($username, $password);
            }
        ?>
        <?php
                echo "<p class='seccion'>" . $seccion . "</p>";
                
                if(!$result){
                    if(isset($_POST['registrarse'])){
                        echo "<p style='color:red'>Error en el registro, puede que el usuario ya esté registrado</p>";
                    }
        ?>
        
                    <form method="POST">
                        <p>Nombre de usuario: <input type="text" placeholder="Escriba su nombre" name="usuario" required/></p>
                        <p>Contraseña: <input type="password" placeholder="Escriba su contraseña" name="contrasenia" required/></p>
                        <input type="submit" value="Registrarse" name="registrarse" />
                    </form>
        <?php
                }else{ echo "<p>Usuario registrado con exito.</p>";
        ?>
                    <form action="index.php?sec=Login" method="POST">
                        <input type="submit" value="Loguearse" />
                    </form>
        <?php
                }
        ?>
    </div>
</div>
<div id="content">
    <div id="formularioLogin">
        <?php
        
            //include("controllers/usuariosController.php");
            
            $result = false;
        
            if(isset($_POST['inisesion'])){
                $username = $_POST['usuario'];
                $password = $_POST['contrasenia'];
                
                $result = $usuario->buscar($username, $password);
                
                if($result){
                    $_SESSION['usuario'] = $_POST['usuario'];
                }
                
                header("location:index.php?sec=Login");
                
            }
        
            if(isset($_SESSION['usuario'])){
                echo "<p class='seccion'>Logout</p>";
                echo 
                    "<p>Identificado como ".$_SESSION['usuario']."</p>";
        ?>
                    <form action="index.php" >
                        <input type="submit" value="Volver al Inicio" />
                    </form>
                    <br/>
                    <form action="./views/logout.php" method="POST">
                        <input type="submit" value="Cerrar sesión" />
                    </form>
         
        <?php
                
            }else{
                echo "<p class='seccion'>" . $seccion . "</p>";
                
                if(!$result && isset($_POST['inisesion'])){
                    echo "<p style='color:red'>Fallo al iniciar sesion, el usuario o la contraseña no coinciden</p>";
                }
        ?>
                
        
                <form  method="POST">
                    <p>Nombre de usuario: <input type="text" placeholder="Escriba su nombre" name="usuario" required/></p>
                    <p>Contraseña: <input type="password" placeholder="Escriba su contraseña" name="contrasenia" required/></p>
                    <input type="submit" value="Iniciar sesión" name="inisesion" />
                </form>
                <br/>
                <form action="index.php?sec=Registrarse" method="POST">
                    <input type="submit" value="Registrarse" />
                </form>
                
        <?php
                
        
            }
        ?>
    </div>
</div>
<?php
include ('sesion.php');
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Crear personal</title>
        <link rel="stylesheet" href="estilo.css"/>
    </head>
    <body>

        <div class="contenedor">
            <div class= "encabezado">
                <div class="izq">
                    <p>Bienvenido/a:<br></p>
                     <?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?>
                </div>

                <div class="centro">
                    <a href=principalAdmin.php><center><img src='imagenes/home.png'><br>Home<center></a> 
                </div>
                
                <div class="derecha">
                    <a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
                </div>
            </div>

            <br><h1 align="center">GESTIÓN DE PERSONAL</h1>
               <div class="contenedor">
            
               </div>
            <div class="formulario">
                    <?php
        error_reporting(E_ALL  ^  E_NOTICE  ^  E_WARNING);
         if ($_GET["valido"]=="no") {
        echo "<p style='color:#F00; font-size: 1em; text-align: center'> <b> Avertencia:</b> El RUT Suministrado esta en nuestros Registro y sera redirigido en 3 segundos</p> ";
        header("Refresh:3; url=crear_personal.php", true);
        }else if($_GET["valido"]=="si") {
        echo "<p style='color:#F00; font-size: 1em; text-align: center'> <b> Informacion:</b> Registrado exitosamente</p>";
        header("Refresh:3; url=crear_personal.php", true);
                                    }
           if ($_GET["valido"]=="campo_vacio") {
        echo "<p style='color:#F00; font-size: 1em;text-align: center'> Lo Campo de contraseña estan vacios</p>";
                        }
        if ($_GET["valido"]=="contrasena_no_iguales") {
        echo "<p style='color:#F00; font-size: 1em; text-align: center'> Los Campos de contraseña no concuerdan</p>";
                        }
        if ($_GET["valido"]=="espacio") {
        echo "<p style='color:#F00; font-size: 1em; text-align: center'> Los Campos de contraseña  no es valido los espacios</p>";
                        }
                                ?>
                <form ="registro" method="post" action="registro.php" enctype="application/x-www-form-urlencoded">
                    <div class="campo">
                        <label for="cabra">RUT:</label>
                        <input type="text" name="rut" required/>
                    </div>

                    <div class="campo">
                        <div class="en-linea izquierdo">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" required/>
                        </div>

                        <div class="en-linea">
                            <label for="apellido">Apellido:</label>
                            <input type="text" name="apellido" required/>
                        </div>
                    </div>

                    <div class="campo">
                        <label for="cargo">Cargo:</label>
                            <select name="cargo" required/>
                                <option>Admin</option>
                                <option>Bodega</option>
                            </select>
                    </div>

                    <div class="campo">
                        <div class="en-linea izquierdo">
                            <label for="contrasena1">Contraseña:</label>
                            <input type="password" name="contrasena1" required/>
                        </div>
                        
                        <div class="en-linea">
                            <label for="contrasena2">Repetir contraseña:</label>
                            <input type="password" name="contrasena2" required/>
                        </div>
                    </div>

                    <div class="botones">
                        <input type="submit" name="boton-enviar" value="crear usuario"/>

                    </div>
                </form>
            </div>

        </div>
    </body>
</html>
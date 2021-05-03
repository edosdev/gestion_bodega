 <!--Completar el Código que se requerirá a continuación-->
 <!--Recuperar las variables con los datos ingresados en el formulario. 
  Validar que el rut ingresado no se encuantre en la base de datos.
  Si ya existe un registro vinculado al rut ingresado:
	 Redirigir a crear_personal y entregar mensaje.
  Si no existe:
	 Insertar datos en tabla correspondiente.
	 Redirigir a crear_personal y mostrar mensaje.
Si las contraseñas no existen redirigir a crear_personal y mostrar mensaje. --> 	
<?php
include ('conexion.php');

$rut = $_POST['rut'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cargo = $_POST['cargo'];
$contrasena1 = $_POST['contrasena1'];
$contrasena2 = md5($_POST['contrasena2']);

$verificar_rut = "SELECT * FROM gestion_bodega.personal WHERE rut='$rut'";

$consulta_rut =  mysqli_query($conexion, $verificar_rut);

// $comprobacion_fila_rut = $consulta_rut->fetch_row();

// var_dump ($comprobacion_fila_rut)."</br>";
// var_dump ($conexion)."</br>";
// var_dump ($comprobacion_fila_rut). "</br>";

$resultado= mysqli_fetch_array($consulta_rut);

echo $resultado;

// var_dump ($consulta_rut). "</br>";

if($resultado == true) {
  header("Location:crear_personal.php?valido=no");
}
if (empty($_POST["contrasena1"]) or empty(($_POST["contrasena2"]))){
    
  header("Location:crear_personal.php?valido=campo_vacio");
}else if ($contrasena1==" ") {
    header("Location:crear_personal.php?valido=espacio");
  } 
  if ($_POST["contrasena1"] !== $_POST["contrasena2"]) {
header("Location:crear_personal.php?valido=contrasena_no_iguales");}

if ($_POST["contrasena1"] === $_POST["contrasena2"]) {


  $consulta = "INSERT INTO gestion_bodega.personal (rut, nombre, apellido, cargo, contraseña) VALUES ('$rut','$nombre','$apellido','$cargo', '$contrasena2')";


  $ejecutar = mysqli_query($conexion, $consulta) or die ("no se puede registrar");
  
  header("Location:crear_personal.php?valido=si");
}
?>
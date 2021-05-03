<!-- Conexión a la base de datos,
codificación de caracteres,
seleccion de base de datos. -->
<?php 


$conexion = mysqli_connect("localhost", "root", "") or  die("no conectado");

$conexion -> set_charset('utf8');

$conexion -> select_db("gestion_bodega") or die("Base de Datos no encontrada </br>");


 ?>
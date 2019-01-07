<?php
error_reporting(0);

$mysqli = new mysqli("localhost", "root", "", "web");

if (!$mysqli){
// error al conectar
echo "<b><center>Error al conectar con el servidor.</center></b>\n";
exit;
}if (!$mysqli){
// error al conectar
echo "<b><center>Error al conectar con la Base de Datos.</center></b>\n";
exit;
}
// La conexión al servidor y a la BD se ha realizado con éxito
//echo "<b><center>Conexión realizada con éxito.</center></b>\n";
?>
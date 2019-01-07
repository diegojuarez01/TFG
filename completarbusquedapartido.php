<?php
session_start();
include "conectar.php";	
$_SESSION['tipousuario'];
$idbusqueda=$_GET["id_busqueda"];
$idbusqueda = $idbusqueda;
$query = "select * from busqueda_partido_1v1_lol where num_busqueda_partido_1v1_lol='$idbusqueda'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Este usuario no tienen ningun partido asignado.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$estado=$fila["estado"];
if($estado == encontrado){
        echo 1;	
        }else{
      echo 2;
}
}
}
?>


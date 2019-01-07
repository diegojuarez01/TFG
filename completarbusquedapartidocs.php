<?php
    session_start();
/* Obtenemos variable*/
    include "conectar.php";	
    $_SESSION['tipousuario'];
$idbusqueda=$_GET["id_busqueda"];
$idbusqueda = $idbusqueda;
$query = "select * from busqueda_partido_1v1_cs where num_busqueda_partido_1v1_cs='$idbusqueda'";
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



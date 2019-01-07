<?php
session_start();
include "conectar.php";	
$_SESSION['tipousuario'];
$idbusqueda=$_GET["id_busqueda"];
$idbusqueda = $idbusqueda;
$query = "delete from busqueda_partido_1v1_cs where num_busqueda_partido_1v1_cs='$idbusqueda'";
$resultado = $mysqli->query($query);
header('Location: index.php');
?>

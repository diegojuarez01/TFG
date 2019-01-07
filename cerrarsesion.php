<?php
include 'conectar.php';
//Cerramos session y volvemos a la pagina de inicio
session_start();
session_destroy();
  $usuario=$_SESSION['nombre'];
//Miramos si la ultima busqueda de partido es nuestra (es decir si estamos buscando partido)
$query = "select * from busqueda_partido_1v1_lol order by num_busqueda_partido_1v1_lol desc limit 1";
$resultado = $mysqli->query($query);
{
if($resultado==0){
    echo "Error al acceder a la base de datos de usuario.<br>";	
}else{
    while($fila=$resultado->fetch_assoc()){
    $estado = $fila["estado"];
    $jugador1 = $fila["jugador1"];
    $id =$fila["num_busqueda_partido_1v1_lol"];
    }
    //Cambiamos el estado de usuario a desconectado (activo=0)
    $query = "UPDATE usuarios SET activo = 0 WHERE usuario='$usuario'";
    $resultado = $mysqli->query($query);
    //Si estado = 'buscando' el usuario que cierra sesion se cancelara la busqueda automaticamente.
    if($estado == 'buscando'){ 
        if($jugador1 == $usuario){
            $query = "delete from busqueda_partido_1v1_lol where num_busqueda_partido_1v1_lol='$id'";
            $resultado = $mysqli->query($query);
             header('Location: index.php');
        } 
    }
}
}
echo "<script language='javascript'>window.location='index.php'</script>";	
?>
<html>   
    <script src='js/sweetalert.min.js'></script>
<?php 
//Para que solo se pueda acceder por el formulario
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ranking_individualcs.php');
} 
include "conectar.php"; 
include_once 'head.php';
session_start();
/* Obtenemos variable*/
$_SESSION['tipousuario'];
$retador=$_SESSION['nombre'];
$retado=$_POST["usuariojugador"];
$ganador="Partido pendiente";
$fecha=date("Y-m-d H:i:s");  
//Creamos el partido con el retador como local(jugador1) y el retado como visitante(jugador2)
//El ganador lo debera de establecer un admin despues de que se juege el partido.
    $query = "insert into partidos_individuales_cs (jugador1,jugador2,ganador,fecha_partido) values('$retador','$retado','$ganador','$fecha')";
      $resultado = $mysqli->query($query);
if($resultado==0){
echo " <h4>Error al crear el partido.</h4><br>";
}else{
      //Se suma 1 al total_partidos a retador y retado.
      $query = "UPDATE usuarios SET total_partidos_usuario=total_partidos_usuario+1 where usuario='$retador'";
      $resultado = $mysqli->query($query);  
      $query = "UPDATE usuarios SET total_partidos_usuario=total_partidos_usuario+1 where usuario='$retado'";
      $resultado = $mysqli->query($query); 
   echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Partido creado',
            text: 'Ya puedes jugar contra $retado',
            type: 'success'
        }, function() {
            window.location = 'ranking_individualcs.php';
        });
    }, 200);
</script>";	
}
?>

 <script src='js/jquery.min.js'></script>    
        <script src='js/bootstrap.min.js'></script>
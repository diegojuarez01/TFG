<html>
    <script src='js/sweetalert.min.js'></script>
<?php
include 'head.php';
include "conectar.php"; 
    session_start();
    $_SESSION['tipousuario'];
//Para que solo se pueda acceder por el formulario
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: gestionjugadores.php');
} 
//Recibimos el array con los usuarios para borrar
$array_borrados=$_POST["borrar"];
$error=0;
if (empty($array_borrados)){ 
        echo "<script type='text/javascript'>
       setTimeout(function() {
              swal({
                  title: 'Error',
                  text: 'Debe seleccionar algun jugador para poder eliminarlo',
                  type: 'warning'
              }, function() {
                  window.location = 'gestionjugadores.php';
              });
          }, 300);
      </script>";  
}else{
for($i=0;$i<count($array_borrados);$i++){ 
    $query = "Delete from usuarios where usuario='$array_borrados[$i]'";
    $resultado = $mysqli->query($query);
    
    $query1 = "select * from equipo where jugador1='$array_borrados[$i]' OR jugador2='$array_borrados[$i]' OR jugador3='$array_borrados[$i]' OR jugador4='$array_borrados[$i]' OR jugador5='$array_borrados[$i]' OR jugador6='$array_borrados[$i]'";
    $resultado1 = $mysqli->query($query1);
    if($resultado1==0){
    echo "<center><br>Error al eliminar al usuario del equipo</center></br>";
    }else{
    while($fila=$resultado1->fetch_assoc()){
    $jugador1=$fila["jugador1"]; 
    $jugador2=$fila["jugador2"]; 
    $jugador3=$fila["jugador3"]; 
    $jugador4=$fila["jugador4"]; 
    $jugador5=$fila["jugador5"]; 
    $jugador6=$fila["jugador6"];
    $numequipo =$fila["num_equipo"];   
    $usuario = $array_borrados[$i];
    }if($jugador1== $usuario){
        if($jugador2==''){
        $query = "Delete from equipo where num_equipo='$numequipo'";
        $resultado = $mysqli->query($query);   
        }elseif($jugador6==''){
$query2 = "update equipo set jugador1='$jugador2',jugador2='$jugador3',jugador3='$jugador4',jugador4='$jugador5',completo='0' where num_equipo='$numequipo'";        
    $resultado2 = $mysqli->query($query2);
    }else{
$query2 = "update equipo set jugador1='$jugador2',jugador2='$jugador3',jugador3='$jugador4',jugador4='$jugador5',jugador5='$jugador6' where num_equipo='$numequipo'";
$resultado2 = $mysqli->query($query2);
     }  
    }
else if($jugador2==$usuario){
    if($jugador6==''){
$query2 = "update equipo set jugador2='$jugador3',jugador3='$jugador4',jugador4='$jugador5',jugador5='$jugador6',jugador6='',completo='0' where num_equipo='$numequipo'";        
    $resultado2 = $mysqli->query($query2);
    }else{
$query2 = "update equipo set jugador2='$jugador3',jugador3='$jugador4',jugador4='$jugador5',jugador5='$jugador6',jugador6='' where num_equipo='$numequipo'";
$resultado2 = $mysqli->query($query2);

    }
}
else if($jugador3==$usuario){
        if($jugador6==''){
$query2 = "update equipo set jugador3='$jugador4',jugador4='$jugador5',jugador5='$jugador6',jugador6='',completo='0' where num_equipo='$numequipo'";        
    $resultado2 = $mysqli->query($query2);
    
    }else{
$query2 = "update equipo set jugador3='$jugador4',jugador4='$jugador5',jugador5='$jugador6',jugador6='' where num_equipo='$numequipo'";
$resultado2 = $mysqli->query($query2);

    }
}
else if($jugador4==$usuario){
            if($jugador6==''){
$query2 = "update equipo set jugador4='$jugador5',jugador5='$jugador6',jugador6='',completo='0' where num_equipo='$numequipo'";        
    $resultado2 = $mysqli->query($query2);

    }else{
$query2 = "update equipo set jugador4='$jugador5',jugador5='$jugador6',jugador6='' where num_equipo='$numequipo'";
$resultado2 = $mysqli->query($query2);

    }
}
else if($jugador5==$usuario){
               if($jugador6==''){
$query2 = "update equipo set jugador5='$jugador6',jugador6='',completo='0' where num_equipo='$numequipo'";        
    $resultado2 = $mysqli->query($query2);

    }else{
$query2 = "update equipo set jugador5='$jugador6',jugador6='' where num_equipo='$numequipo'";
$resultado2 = $mysqli->query($query2);

    }
}
else if($jugador6==$usuario){
$query2 = "update equipo set jugador6='' where num_equipo='$numequipo'";
$resultado2 = $mysqli->query($query2);

}
}    
    if($resultado==0){
    echo "<center><h4><br>Error al eliminar el jugador de la base de datos </center></h4></br>";
    $error=1;
    }
    }if($error==0){
        echo "<script type='text/javascript'>
     setTimeout(function() {
            swal({
                title: '!Hecho!',
                text: 'Jugadores borrados correctamente',
                type: 'success'
            }, function() {
                 window.location = 'gestionjugadores.php';
            });
        }, 300);
    </script>";
    }
    }
?>
<script src='js/jquery.min.js'></script>    
        <script src='js/bootstrap.min.js'></script>
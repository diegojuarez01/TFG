<html>   
<script src='js/sweetalert.min.js'></script>
        <?php 
                include_once 'head.php';
                include_once 'conectar.php';
                /* Empezamos la sesión */
                session_start();           
//Para que solo se pueda acceder por el formulario
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ranking_equipos.php');
} 
$equipopropio=$_SESSION['equipopropio'];
//Si el retador no tiene equipo monstramos error y lo mandamos de vuelta.
if($equipopropio==""){
                echo "<script type='text/javascript'>
       setTimeout(function() {
              swal({
                  title: 'Alto',
                  text: 'Tienes que tener un equipo para retar',
                  type: 'warning'
              }, function() {
                  window.location = 'ranking_equipos.php';
              });
          }, 300);
      </script>"; 
}else{
    $retado=$_POST["nombreequipo"];
        
    $query = "Select * from equipo where nombre = '$equipopropio'";
    $resultado = $mysqli->query($query);
    if($resultado==0){
            echo "Error al acceder a la base de datos de equipos.<br>";
            }else{
                while($fila=$resultado->fetch_assoc()){
                    $equipolocalcompleto=$fila["completo"];
                    }
                    }
    $query = "Select * from equipo where nombre = '$retado'";
    $resultado = $mysqli->query($query);
    if($resultado==0){
            echo "Error al acceder a la base de datos de uequipos..<br>";
            }else{
                while($fila=$resultado->fetch_assoc()){
                    $equipovisitantecompleto=$fila["completo"];
                    }
                    }
    if($equipolocalcompleto==0){
                     echo "<script type='text/javascript'>
       setTimeout(function() {
              swal({
                  title: 'Alto',
                  text: 'Tu equipo no esta completo',
                  type: 'error'
              }, function() {
                  window.location = 'ranking_equipos.php';
              });
          }, 300);
      </script>"; 
    }else if($equipovisitantecompleto==0){
                     echo "<script type='text/javascript'>
       setTimeout(function() {
              swal({
                  title: 'Alto',
                  text: 'El equipo al que intentas retar no esta completo',
                  type: 'error'
              }, function() {
                  window.location = 'ranking_equipos.php';
              });
          }, 300);
      </script>"; 
    }else{                

    $ganador="Partido pendiente";
    $fecha=date("Y-m-d H:i:s");  
    //Creamos el partido con el retador como local(jugador1) y el retado como visitante(jugador2) 
    //el ganador lo debera de establecer un admin despues de que se juege el partido.
      $query = "insert into partidos_equipo (locales,visitantes,ganador,fecha_partido) values('$equipopropio','$retado','$ganador','$fecha')";
      $resultado = $mysqli->query($query);
if($resultado==0){
echo "Error al crear el partido";
}else{
      //Se suma 1 al total_partidos_equipo a retador y retado.
      $query = "UPDATE equipo SET total_partidos_equipo=total_partidos_equipo+1 where nombre='$equipopropio'";
      $resultado = $mysqli->query($query);  
      $query = "UPDATE equipo SET total_partidos_equipo=total_partidos_equipo+1 where nombre='$retado'";
      $resultado = $mysqli->query($query);
   echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Partido creado',
            text: 'Ya puedes jugar contra $retado',
            type: 'success'
        }, function() {
            window.location = 'ranking_equipos.php';
        });
    }, 300);
</script>";	
}
    }
}

?>

 <script src='js/jquery.min.js'></script>    
        <script src='js/bootstrap.min.js'></script>
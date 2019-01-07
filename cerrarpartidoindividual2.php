<html>
        <script src='js/sweetalert.min.js'></script>
<?php
	include_once 'head.php';
        include_once 'menunavegacional.php';
        include "conectar.php";
        session_start();
        $_SESSION['tipousuario'];
    /* Si la variable de sesion esta vacia, redireccionar al index y mostramos un alert. */
        if(empty($_SESSION['tipousuario'])){       
        header('Location: index.php');
        }else if($_SESSION['tipousuario']=='Usuario'){
             header('Location: index.php');
            }if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: gestionpartidos.php');
        } 	
        
        $ganador=$_POST["selectganador"];
        $idpartido=$_POST["idpartido"];
        $local=$_POST["local"];
        $visitante=$_POST["visitante"];
        $killslocal=$_POST["kills_1"];
        $killsvisitante=$_POST["kills_2"];        
        
        
    //Hacemos un update a la tabla con el idpartido recogido, estableciendo el ganador.	
    $query = "update partidos_individuales set ganador='$ganador',kills_local='$killslocal',kills_visitante='$killsvisitante' where id_partido=$idpartido";
    $resultado = $mysqli->query($query);
    if($resultado==0){
    echo " <h4>Error al modificar el partido en la Base de Datos.</h4><br>";
    }else{
     //Sacamos las puntuaciones de los usuarios enfrentados.   
    $query = "select * from usuarios where usuario='$local'";
    $resultado = $mysqli->query($query);
    if($resultado==0){
    echo "Este usuario no esta registrado.<br>";
    }else{
    while($fila=$resultado->fetch_assoc()){
    $puntuacionlocal=$fila["puntuacion"];
    }
    }
    //Sacamos las puntuaciones de los usuarios enfrentados.   
    $query = "select * from usuarios where usuario='$visitante'";
    $resultado = $mysqli->query($query);
    if($resultado==0){
    echo "Este usuario no esta registrado.<br>";
    }else{
    while($fila=$resultado->fetch_assoc()){
    $puntuacionvisitante=$fila["puntuacion"];
    }
    }
    //Sacamos el valor absoluto de la diferencia de puntuaciones, 
    //lo dividimos entre 5 y redondeamos un punto hacia arriba,
    //este sera el handicappositivo si gana el que menos puntuacion tiene
    //si gana el que mas puntuacion tiene sumaremos el handicapnegativo que sera handicap/5.
    $absoluto = abs($puntuacionlocal-$puntuacionvisitante);
    if($absoluto >= 200){
    $handicappositivo = ceil($absoluto/5);
    $handicapnegativo = ceil ($handicappositivo/5);
    }else if($absoluto >= 100 && $absoluto < 200){
    $handicappositivo = ceil($absoluto/4);
    $handicapnegativo = ceil ($handicappositivo/4);    
    }else if($absoluto > 50 && $absoluto <100){
    $handicappositivo = ceil($absoluto/2);
    $handicapnegativo = ceil ($handicappositivo/2);      
    }else{
        $handicapnegativo=20;
        $handicappositivo=20;
    }
//Debemos de quitar y dar los puntos a ganador y perdedor
	if($local==$ganador && $puntuacionlocal >= $puntuacionvisitante){
    $puntuacionlocal= $puntuacionlocal + $handicapnegativo;
    $query = "update usuarios set puntuacion='$puntuacionlocal' where usuario='$local'";
    $resultado = $mysqli->query($query);
        if($resultado==0){
        echo " <h4>Error al modificar el usuario en la Base de Datos.</h4><br>";
        }else{
                $puntuacionvisitante= $puntuacionvisitante - $handicapnegativo;
    $query = "update usuarios set puntuacion='$puntuacionvisitante' where usuario='$visitante'"; 
    $resultado = $mysqli->query($query);
    $query = "update usuarios set partidos_usuario_ganados= partidos_usuario_ganados + 1 where usuario='$local'";
    $resultado = $mysqli->query($query);
    $query = "update usuarios set partidos_usuario_perdidos= partidos_usuario_perdidos + 1 where usuario='$visitante'";
    $resultado = $mysqli->query($query);
       echo "<script type='text/javascript'>
       setTimeout(function() {
              swal({
                  title: 'Partido cerrado',
                  text: 'Ganador establecido',
                  type: 'success'
              }, function() {
                  window.location = 'gestionpartidos.php';
              });
          }, 200);
      </script>";
        }   
    }else if($local==$ganador && $puntuacionlocal < $puntuacionvisitante){
    $puntuacionlocal= $puntuacionlocal + $handicappositivo;
    $query = "update usuarios set puntuacion='$puntuacionlocal' where usuario='$local'";
    $resultado = $mysqli->query($query);
        if($resultado==0){
        echo " <h4>Error al modificar el usuario en la Base de Datos.</h4><br>";
        }else{
               $puntuacionvisitante= $puntuacionvisitante - $handicappositivo;
    $query = "update usuarios set puntuacion='$puntuacionvisitante' where usuario='$visitante'"; 
    $resultado = $mysqli->query($query);
    $query = "update usuarios set partidos_usuario_ganados= partidos_usuario_ganados + 1 where usuario='$local'";
    $resultado = $mysqli->query($query);
    $query = "update usuarios set partidos_usuario_perdidos= partidos_usuario_perdidos + 1 where usuario='$visitante'";
    $resultado = $mysqli->query($query);
       echo "<script type='text/javascript'>
       setTimeout(function() {
              swal({
                  title: 'Partido cerrado',
                  text: 'Ganador establecido',
                  type: 'success'
              }, function() {
                  window.location = 'gestionpartidos.php';
              });
          }, 200);
      </script>";  
        }
    }else if($visitante==$ganador && $puntuacionvisitante >= $puntuacionlocal){
    $puntuacionvisitante= $puntuacionvisitante + $handicapnegativo;
    $query = "update usuarios set puntuacion='$puntuacionvisitante' where usuario='$visitante'";
    $resultado = $mysqli->query($query);
        if($resultado==0){
        echo " <h4>Error al modificar el usuario en la Base de Datos.</h4><br>";
        }else{
                $puntuacionlocal= $puntuacionlocal - $handicapnegativo;
    $query = "update usuarios set puntuacion='$puntuacionlocal' where usuario='$local'";
    $resultado = $mysqli->query($query);
    $query = "update usuarios set partidos_usuario_ganados= partidos_usuario_ganados + 1 where usuario='$visitante'";
    $resultado = $mysqli->query($query);
    $query = "update usuarios set partidos_usuario_perdidos= partidos_usuario_perdidos + 1 where usuario='$local'";
    $resultado = $mysqli->query($query);
       echo "<script type='text/javascript'>
       setTimeout(function() {
              swal({
                  title: 'Partido cerrado',
                  text: 'Ganador establecido',
                  type: 'success'
              }, function() {
                  window.location = 'gestionpartidos.php';
              });
          }, 200);
      </script>";
        }
    }else{
    $puntuacionvisitante= $puntuacionvisitante + $handicappositivo;
    $query = "update usuarios set puntuacion='$puntuacionvisitante' where usuario='$visitante'";
    $resultado = $mysqli->query($query);
        if($resultado==0){
        echo " <h4>Error al modificar el usuario en la Base de Datos.</h4><br>";
        }else{
             $puntuacionlocal= $puntuacionlocal - $handicappositivo;
    $query = "update usuarios set puntuacion='$puntuacionlocal' where usuario='$local'"; 
    $resultado = $mysqli->query($query);
      $query = "update usuarios set partidos_usuario_ganados= partidos_usuario_ganados + 1 where usuario='$visitante'";
    $resultado = $mysqli->query($query);
    $query = "update usuarios set partidos_usuario_perdidos= partidos_usuario_perdidos + 1 where usuario='$local'";
    $resultado = $mysqli->query($query);
       echo "<script type='text/javascript'>
       setTimeout(function() {
              swal({
                  title: 'Partido cerrado',
                  text: 'Ganador establecido',
                  type: 'success'
              }, function() {
                  window.location = 'gestionpartidos.php';
              });
          }, 200);
      </script>"; 
        }
    }    
}
?>	
 <script src='js/jquery.min.js'></script>    
        <script src='js/bootstrap.min.js'></script>
<html>
    <script src='js/sweetalert.min.js'></script>
            <?php 
                include_once 'head.php';
                include_once 'conectar.php';
                include ('menunavegacional.php');
                /* Empezamos la sesión */
                session_start();
                /* Obtenemos variable*/
                $_SESSION['tipousuario']; 	
                $usuario=$_SESSION['nombre'];
                if(empty($_SESSION['tipousuario'])){ 
                   echo "<script type='text/javascript'>
       setTimeout(function() {
              swal({
                  title: 'Alto',
                  text: 'Debes de estar conectado como usuario',
                  type: 'warning'
              }, function() {
                  window.location = 'Iniciar_sesion.php';
              });
          }, 100);
      </script>"; 
                    return;
                }
//Recibimos el idpartido y lo guardamos	
$idpartido=$_GET["idpartidocs"];
$query = "select * from partidos_individuales_cs where id_partido_cs='$idpartido'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Este usuario no tienen ningun partido asignado.<br>";
}else{
while($fila=$resultado->fetch_assoc()){
$jugador1=$fila["jugador1"];
$jugador2=$fila["jugador2"];
$ganador=$fila["ganador"];
$fecha=$fila["fecha_partido"];
$killslocal = $fila["kills_local"];
$killsvisitante = $fila["kills_visitante"];
}
if($jugador1 == $usuario ){   
}else if($jugador2 == $usuario){   
}else{
    // Para cuando no sea ningun partido del usuario que esta intentado acceder.
      echo"<script language='javascript'>window.location='index.php'</script>;"; 
       exit();
}
//Sacamos datos de cada jugador 
    $query = "select * from usuarios where usuario='$jugador1'";
    $resultado = $mysqli->query($query);
    if($resultado==0){
    echo "Este usuario no tienen ningun partido asignado.<br>";
    }else{
    while($fila=$resultado->fetch_assoc()){
    $puntuacionjugador1=$fila["puntuacioncs"];
    }
    }

    $query = "select * from usuarios where usuario='$jugador2'";
    $resultado = $mysqli->query($query);
    if($resultado==0){
    echo "Este usuario no tienen ningun partido asignado.<br>";
    }else{
    $contador=1; 
    while($fila=$resultado->fetch_assoc()){
    $puntuacionjugador2=$fila["puntuacioncs"];
    }
    }
    //Sacamos la lista de los puestos de ambos jugadores
        $query = "Select * from usuarios ORDER BY puntuacioncs DESC";
        $resultado = $mysqli->query($query);
        if($resultado==0){
        echo "Error al acceder a la base de datos de clientes.<br>";
        }else{
        $contador=1; 
        while($row=$resultado->fetch_assoc()){
        $usuariopuesto=$row["usuario"];
        $ganados=$row["partidos_usuario_ganados"];
        $jugados=$row["total_partidos_usuario"];
          if($jugador1 == $usuariopuesto){
              $puestojugador1=$contador;
            }else if($jugador2 == $usuariopuesto){
                $puestojugador2 = $contador;
        }
        $contador=$contador+1;    
        }
        }    
?>
    
    <body>
   <div class="container">
            <div class="jumbotron">
                <h1>Detalles del partido </h1>
            </div>
        </div>
        <div class="container">
            <div class="row">     
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Partido</h3>
                                </div>
                                <div class="panel-body">                                
                            <form id='detallespartido' action='' method='POST' enctype='multipart/form-data'>
                                <div class="form-group">
                                        <label for="jugador1">FECHA:</label>
                                        <input type="text" name="jugador1" id="jugador1" class="form-control" value='<?php echo $fecha?>' disabled/>
                                    </div>
                                    <div class="form-group">
                                        <label for="jugador1">JUGADOR 1:</label>
                                        <input type="text" name="jugador1" id="jugador1" class="form-control" value='<?php echo $jugador1?>' disabled/>
                                    </div>
                                    <div class="form-group">
                                        <label for="jugador1">JUGADOR 2:</label>
                                        <input type="text" name="jugador2" id="jugador2" class="form-control" value='<?php echo $jugador2?>' disabled/>
                                    </div>
                                 <div class="form-group">
                                    <label for='asunto'>GANADOR:</label>
                                    <input id='ganador' class='form-control' name='ganador' type='text' value='<?php echo $ganador?>'disabled />     
                                 </div>
                             
                            </form>
                                 </div>
                               </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Estadísticas</h3>
                                </div>
                                <div class="panel-body">                                
                            <form id='detallespartido' action='' method='POST' enctype='multipart/form-data'>
                                    <div class="form-group">
                                        <label for="jugador1"> PUNTUACIÓN JUGADOR 1:</label>
                                        <input type="text" name="jugador1" id="jugador1" class="form-control" value='<?php echo $puntuacionjugador1?>' disabled/>
                                    </div>
                                    <div class="form-group">
                                        <label for="jugador1"> PUNTUACIÓN JUGADOR 2:</label>
                                        <input type="text" name="jugador2" id="jugador2" class="form-control" value='<?php echo $puntuacionjugador2?>' disabled/>
                                    </div>
                                    <?php 
                                if($ganador !='Partido pendiente'){
                                    ?>
                                <div class="form-group">
                                        <label for="jugador1"> KILLS JUGADOR 1:</label>
                                        <input type="text" name="jugador1" id="jugador1" class="form-control" value='<?php echo $killslocal?>' disabled/>
                                    </div>
                                    <div class="form-group">
                                        <label for="jugador2"> KILLS JUGADOR 2:</label>
                                        <input type="text" name="jugador2" id="jugador2" class="form-control" value='<?php echo $killsvisitante?>' disabled/>
                                    </div> 
                                <?php
                                }
                                ?>
                            </form>
                                 </div>
                               </div>
                            </div>
                        </div>
                    </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Ranking</h3>
                                </div>
                                <div class="panel-body">                                
                            <form id='detallespartido' action='' method='POST' enctype='multipart/form-data'>
                                    <div class="form-group">
                                        <label for="jugador1"> POSICIÓN JUGADOR 1:</label>
                                        <input type="text" name="jugador1" id="jugador1" class="form-control" value='<?php echo $puestojugador1?>' disabled/>
                                    </div>
                                    <div class="form-group">
                                        <label for="jugador1"> POSICIÓN JUGADOR 2:</label>
                                        <input type="text" name="jugador2" id="jugador2" class="form-control" value='<?php echo $puestojugador2 ?>' disabled/>
                                    </div>            
                            </form>
                                 </div>
                               </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
    <script src='js/jquery.min.js'></script>    
    <script src='js/bootstrap.min.js'></script>
  <?php 
  }

 include_once 'footer.php';?>
 	</body>
</html>



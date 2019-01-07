<html>
    <script src='js/sweetalert.min.js'></script>
        <?php 
                include_once 'head.php';
                include_once 'conectar.php';
                include 'menunavegacional.php';
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
                  text: 'No puedes acceder aqui',
                  type: 'warning'
              }, function() {
                  window.location = 'index.php';
              });
          }, 100);
      </script>"; 
                    return;
                }
   
    //Recibimos el idpartido y lo guardamos	
$idpartidoequipo=$_GET["idpartidoequipocs"];
$query = "select * from equipo where jugador1='$usuario' OR jugador2='$usuario' OR jugador3='$usuario' OR jugador4='$usuario' OR jugador5='$usuario' OR jugador6='$usuario'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Error al acceder a la base de datos de clientes.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$equipousuario=$fila["nombre"];
}
}
$query = "select * from partidos_equipo_cs where id_partido_equipo_cs='$idpartidoequipo'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Este equipo no tienen ningun partido asignado.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$equipo1=$fila["locales"];
$equipo2=$fila["visitantes"];
$ganador=$fila["ganador"];
$fecha=$fila["fecha_partido"];
$killslocal = $fila["kills_local"];
$killsvisitante = $fila["kills_visitante"];
}
if($equipo1 == $equipousuario ){   
}else if($equipo2 == $equipousuario){   
}else{
          // Para cuando no sea ningun partido del usuario que esta intentado acceder.
      echo"<script language='javascript'>window.location='index.php'</script>;"; 
       exit();
}
//Sacamos datos de cada equipo
    $query = "select * from equipo where nombre='$equipo1'";
    $resultado = $mysqli->query($query);
    if($resultado==0){
    echo "Este usuario no tienen ningun partido asignado.<br>";
    }else{
    while($fila=$resultado->fetch_assoc()){
    $puntuacionequipo1=$fila["puntuacioncs"];
    }
    }

    $query = "select * from equipo where nombre='$equipo2'";
    $resultado = $mysqli->query($query);
    if($resultado==0){
    echo "Este usuario no tienen ningun partido asignado.<br>";
    }else{
    $contador=1; 
    while($fila=$resultado->fetch_assoc()){
    $puntuacionequipo2=$fila["puntuacioncs"];
    }
    }
    
    //Sacamos la lista de los puestos de ambos jugadores
        $query = "Select * from equipo ORDER BY puntuacioncs DESC";
        $resultado = $mysqli->query($query);
        if($resultado==0){
        echo "Error al acceder a la base de datos de clientes.<br>";
        }else{
        $contador=1; 
        while($row=$resultado->fetch_assoc()){
        $equipopuesto=$row["nombre"];
          if($equipo1 == $equipopuesto){
              $puestoequipo1=$contador;
            }else if($equipo2 == $equipopuesto){
                $puestoequipo2 = $contador;
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
                                        <label for="jugador1">LOCALES:</label>
                                        <input type="text" name="jugador1" id="jugador1" class="form-control" value='<?php echo $equipo1?>' disabled/>
                                    </div>
                                    <div class="form-group">
                                        <label for="jugador1">VISITANTES:</label>
                                        <input type="text" name="jugador2" id="jugador2" class="form-control" value='<?php echo $equipo2?>' disabled/>
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
                                        <label for="jugador1"> PUNTUACIÓN LOCALES:</label>
                                        <input type="text" name="jugador1" id="jugador1" class="form-control" value='<?php echo  $puntuacionequipo1 ?>' disabled/>
                                    </div>
                                    <div class="form-group">
                                        <label for="jugador1"> PUNTUACIÓN VISITANTES:</label>
                                        <input type="text" name="jugador2" id="jugador2" class="form-control" value='<?php echo  $puntuacionequipo2 ?>' disabled/>
                                    </div> 
                                     <?php 
                                if($ganador !='Partido pendiente'){
                                    ?>
                                <div class="form-group">
                                        <label for="jugador1"> KILLS EQUIPO LOCAL:</label>
                                        <input type="text" name="jugador1" id="jugador1" class="form-control" value='<?php echo $killslocal?>' disabled/>
                                    </div>
                                    <div class="form-group">
                                        <label for="jugador2"> KILLS EQUIPO VISITANTE:</label>
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
                                        <label for="jugador1"> POSICIÓN LOCALES:</label>
                                        <input type="text" name="jugador1" id="jugador1" class="form-control" value='<?php echo $puestoequipo1?>' disabled/>
                                    </div>
                                    <div class="form-group">
                                        <label for="jugador1"> POSICIÓN VISITANTES:</label>
                                        <input type="text" name="jugador2" id="jugador2" class="form-control" value='<?php echo $puestoequipo2 ?>' disabled/>
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

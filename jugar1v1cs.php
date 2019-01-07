<html>
    <script src='js/sweetalert.min.js'></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<?php
include 'conectar.php';
include 'head.php';
include 'menunavegacional.php';

    $_SESSION['tipousuario'];
    $usuario=$_SESSION['nombre'];
    $fecha=date("Y-m-d H:i:s");  
/* Si la variable de sesion esta vacia, redireccionar al index y mostramos un alert. */
    if(empty($_SESSION['tipousuario'])){
        echo "<script type='text/javascript'>
       setTimeout(function() {
              swal({
                  title: 'Alto',
                  text: 'Debes de iniciar sesion para desafiar jugadores',
                  type: 'warning'
              }, function() {
                  window.location = 'Iniciar_sesion.php';
              });
          }, 200);
      </script>"; 
                           return;
    }
$query = "select * from partidos_individuales_cs order by id_partido_cs desc limit 1";
$resultado = $mysqli->query($query);
{
 //Si no hay ningun usuario con el mismo nombre de usuario se hara un insert a la bd con los datos obtenidos del formulario
if($resultado==0){
    echo "Error al acceder a la base de datos de usuario1.<br>";	
}else{
    while($fila=$resultado->fetch_assoc()){
    $idpartido =$fila["id_partido_cs"];
    }   
    $idpartido= $idpartido+1;
}
}
$query = "select * from busqueda_partido_1v1_cs order by num_busqueda_partido_1v1_cs desc limit 1";
$resultado = $mysqli->query($query);
{
//Si no hay ningun usuario con el mismo nombre de usuario se hara un insert a la bd con los datos obtenidos del formulario
if($resultado==0){
    echo "Error al acceder a la base de datos de usuario2.<br>";	
}else{
    while($fila=$resultado->fetch_assoc()){
    $estado = $fila["estado"];
    $jugador1 = $fila["jugador1"];
    $id =$fila["num_busqueda_partido_1v1_cs"];
    }
    //Si estado = 'buscando' se creara el partido jugador2 sera $usuario y se cancelara la cuenta atras y se actualizara la busqueda_partido.
    if($estado == 'buscando'){ 
        if($jugador1 == $usuario){ 
        }     
    else{    
    $query = "insert partidos_individuales_cs(jugador1,jugador2,ganador,fecha_partido) values ('$jugador1','$usuario','Partido pendiente','$fecha')";
    $resultado = $mysqli->query($query);
    
    $query = "update busqueda_partido_1v1_cs set jugador2='$usuario',estado='encontrado' where num_busqueda_partido_1v1_cs = '$id'";
    $resultado = $mysqli->query($query);
    
    if($resultado==0){
    echo "Error al acceder a la base de datos de usuario3.<br>";	
    }else{ 
     echo "<script type='text/javascript'>
     setTimeout(function() {
            swal({
                title: '!Hecho!',
                text: 'Partido creado correctamente',
                type: 'success'
            }, function() {
                window.location = 'detallespartidoavanzadoscs.php?idpartido='+$id_partido;
            });
        }, 200);
    </script>";		
        }
        }
    }
    //Si estado = 'encontrado' se creara un nuevo id_busqueda_partido donde jugador1 sera $usuario y estado = 'buscando'.
    else if($estado == 'encontrado'){
    $query = "insert busqueda_partido_1v1_cs(jugador1,estado) values ('$usuario','buscando')";
    $resultado = $mysqli->query($query);	
    if($resultado==0){
    echo "Error al acceder a la base de datos de usuario4.<br>";	
    }else{ 
        $query = "select * from busqueda_partido_1v1_cs order by num_busqueda_partido_1v1_cs desc limit 1";
$resultado = $mysqli->query($query);
{
//Si no hay ningun usuario con el mismo nombre de usuario se hara un insert a la bd con los datos obtenidos del formulario
if($resultado==0){
    echo "Error al acceder a la base de datos de usuario.<br>";	
}else{
    while($fila=$resultado->fetch_assoc()){
    $estado = $fila["estado"];
    $jugador1 = $fila["jugador1"];
    $id =$fila["num_busqueda_partido_1v1_cs"];
        }
        }
}
    }
    }
}
}
?>
    <body>
     	<div class="container">
            <div class="jumbotron">
                <h1>Busqueda partida</h1>
            </div>
        </div>
         <br>
        <br>
         <div class="container">
            <div class="row">     
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                        </div>
                    </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Buscando partido League Of Legends</h3>
                                </div>
                                <div class="panel-body"> 
                                    <center><h10 id="contador" class="contador2">0:0</h10></center>
                                
                                <button class="btn-default-perfil" type='submit' onclick="DetenerCuenta();">Cancelar</button>
                                <span id="resultado" hidden="true"></span>
                                 </div>
                               </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
        <br>
        <br>
        <br>
          <br>
       
    </body>
<script type="text/javascript">
var id_busqueda = '<?php echo $id;?>';
var id_partido = '<?php echo $idpartido?>';
var count = 0;
var primerdigito = 0;
var number = document.getElementById('contador');
$(document).ready(function() {
    function getRandValue(){
        value = $('#resultado').text();
        $.ajax({
            type: "GET", 
            url: "completarbusquedapartidocs.php?id_busqueda="+id_busqueda,
            success: function(data) {
               $('#resultado').text(data);   
            }
        });
                   count++; 
                   number.innerHTML = primerdigito + ':' + count;  
                   if(count == 60){
                       count=0;
                       primerdigito++; 
                       number.innerHTML = primerdigito + ':' + count;
                   }
                       var resultado = document.getElementById("resultado").innerHTML; 
                       if(resultado == ''){
                       }else if(resultado == 2){ 
                       }else{
                         location.href='detallespartidoavanzadoscs.php?idpartidocs='+id_partido;
                     }
    }
    setInterval(getRandValue, 1000);
});
 function DetenerCuenta(){
       location='cancelarbusquedapartidocs.php?id_busqueda='+id_busqueda;           
    }  
</script>
    <script src='js/jquery.min.js'></script>    
    <script src='js/bootstrap.min.js'></script>
 
         <?php 
 include_once 'footer.php';?>
    
</html>

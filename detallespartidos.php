<html>
    <script src='js/sweetalert.min.js'></script>
        <?php 
                include_once 'head.php';
                include_once 'conectar.php';
                error_reporting(0);
                /* Empezamos la sesión */
                session_start();
                /* Obtenemos variable*/
                $_SESSION['tipousuario']; 	
                $usuario=$_GET["usuario"];
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
                }else if($_SESSION['tipousuario']=='Usuario'){
		            echo "<script type='text/javascript'>
       setTimeout(function() {
              swal({
                  title: 'Alto',
                  text: 'Tienes que ser administrador para acceder a esta URL',
                  type: 'warning'
              }, function() {
                  window.location = 'index.php';
              });
          }, 100);
      </script>"; 
	} 
?>        
    
            <div class="jumbotron">
                <div class="historial">
                    <h1>League Of Legends </h1></div>
            </div>
    
    <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><center>HISTORIAL PARTIDOS INDIVIDUALES</center></h3>
                                </div>
                                    <form name='partidosindividuales'  action='' method='post'>                                       
                                        <table id="partidos" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Detalles</th>
                                                    <th>Jugador1</th>
                                                    <th>Jugador2</th>
                                                    <th>Resultado</th>   
                                                </tr>
                                            </thead>
                                            <tbody data-link="row" class="rowlink">           
                                         
<?php                           
$query = "select * from partidos_individuales where jugador1='$usuario' OR jugador2='$usuario'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Este usuario no tienen ningun partido asignado.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$idpartido=$fila["id_partido"];
$jugador1=$fila["jugador1"];
$jugador2=$fila["jugador2"];
$ganador=$fila["ganador"];

//Controlamos el ganador.
if($ganador==$usuario){
	$resultadopartido="Imagenes/Pagina/victoria.png";
}else if($ganador=='Partido pendiente' or $ganador==''){
	$resultadopartido="Imagenes/Pagina/pendiente.png";
}else{
        $resultadopartido="Imagenes/Pagina/derrota.png";	
}

if($contador%2==0){ 
$texto = $texto ."
<tr>
    <td><a href=detallespartidoavanzados.php?idpartido=$idpartido><span class='glyphicon glyphicon-share-alt'></span></a></td>
    <td>$jugador1</td>
    <td>$jugador2</td>
    <td><img src= $resultadopartido width=30 border=2></td> 
</tr>";
}else{ 
$texto = $texto . "
<tr>
    <td><a href=detallespartidoavanzados.php?idpartido=$idpartido><span class='glyphicon glyphicon-share-alt'></span></a></td>
    <td>$jugador1</td>
    <td>$jugador2</td>
    <td><img src= $resultadopartido width=30 border=2></td> 
</tr>  ";
    }
$contador=$contador+1;
  }
}
echo $texto;
?>               
                         </tbody>   
                    </table>
                </form>
            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><center>HISTORIAL PARTIDOS DE EQUIPO</center></h3>
                                </div>
              <form name='partidosequipo' id='partidosequipo' action='detallespartidoequipoavanzados.php' method='post'>                                       
                                        <table id="partido" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Detalles</th>
                                                    <th>LOCAL</th>
                                                    <th>VISITANTE</th>
                                                    <th>Resultado</th>   
                                                </tr>
                                            </thead>
                                            <tbody data-link="row" class="rowlink">                                                     
                                <?php

//Obtenemos el equipo del usuario
$query = "select * from equipo where jugador1='$usuario' OR jugador2='$usuario' OR jugador3='$usuario' OR jugador4='$usuario' OR jugador5='$usuario' OR jugador6='$usuario'";
$resultado = $mysqli->query($query);                                	
if($resultado==0){
echo "Este usuario no tienen ningun equipo asignado.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
	$equipousuario=$fila["nombre"];
    }
}
$query = "select * from partidos_equipo where locales='$equipousuario' OR visitantes='$equipousuario'";
$resultado = $mysqli->query($query);  
if($resultado==0){
echo "Este usuario no tienen ningun partido asignado.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$idpartidoequipo=$fila["id_partido_equipo"];
$locales=$fila["locales"];
$visitantes=$fila["visitantes"];
$equipoganador=$fila["ganador"];

//Controlamos el ganador.
if($equipoganador==$equipousuario){
	$resultadopartido="Imagenes/Pagina/victoria.png";
}else if($equipoganador=='Partido pendiente' or $equipoganador==''){
	$resultadopartido="Imagenes/Pagina/pendiente.png";
}else{
        $resultadopartido="Imagenes/Pagina/derrota.png";	
}if($contador%2==0){ 
$texto1 = $texto1 ."
<tr>
    <td><a href=detallespartidoequipoavanzados.php?idpartidoequipo=$idpartidoequipo><span class='glyphicon glyphicon-share-alt'></span></a></td>
    <td><font size=2>$locales</font></td>
    <td><font size=2>$visitantes</font></td>
    <td><img src=$resultadopartido width=30 border=2></td> 
</tr>";

}else{ 
$texto1 = $texto1 ."
<tr>
    <td><a href=detallespartidoequipoavanzados.php?idpartidoequipo=$idpartidoequipo><span class='glyphicon glyphicon-share-alt'></span></a></td>
    <td><font size=2>$locales</font></td>
    <td><font size=2>$visitantes</font></td>
    <td><img src=$resultadopartido width=30 border=2></td> 
</tr>";
    }
$contador=$contador+1;
}

}
echo $texto1;
                
?>
			    </tbody>   
                    </table>
                </form>
            </div>
          <div class="jumbotron">
                <div class="historial">
                    <h1>Counter Strike </h1></div>
            </div>
                                   <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><center>HISTORIAL PARTIDOS INDIVIDUALES</center></h3>
                                </div>
                                    <form name='partidosindividualescs'  action='' method='post'>                                       
                                        <table id="partidoscs" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Detalles</th>
                                                    <th>Jugador1</th>
                                                    <th>Jugador2</th>
                                                    <th>Resultado</th>   
                                                </tr>
                                            </thead>
                                            <tbody data-link="row" class="rowlink">                            
<?php                           
$query = "select * from partidos_individuales_cs where jugador1='$usuario' OR jugador2='$usuario'";
$resultado = $mysqli->query($query);
$texto = NULL;
if($resultado==0){
echo "Este usuario no tienen ningun partido asignado.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$idpartidocs=$fila["id_partido_cs"];
$jugador1cs=$fila["jugador1"];
$jugador2cs=$fila["jugador2"];
$ganadorcs=$fila["ganador"];

//Controlamos el ganador.
if($ganadorcs==$usuario){
	$resultadopartido="Imagenes/Pagina/victoria.png";
}else if($ganadorcs=='Partido pendiente' or $ganadorcs==''){
	$resultadopartido="Imagenes/Pagina/pendiente.png";
}else{
        $resultadopartido="Imagenes/Pagina/derrota.png";	
}
if($contador%2==0){ 
$texto = $texto ."
<tr>
    <td><a href=detallespartidoavanzadoscs.php?idpartidocs=$idpartidocs><span class='glyphicon glyphicon-share-alt'></span></a></td>
    <td>$jugador1cs</td>
    <td>$jugador2cs</td>
    <td><img src= $resultadopartido width=30 border=2></td> 
</tr>";
}else{ 
$texto = $texto . "
<tr>
    <td><a href=detallespartidoavanzadoscs.php?idpartidocs=$idpartidocs><span class='glyphicon glyphicon-share-alt'></span></a></td>
    <td>$jugador1cs</td>
    <td>$jugador2cs</td>
    <td><img src= $resultadopartido width=30 border=2></td> 
</tr>  ";
    }
$contador=$contador+1;
  }
}
echo $texto;
?>               
                         </tbody>   
                    </table>
                </form>
            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><center>HISTORIAL PARTIDOS DE EQUIPO</center></h3>
                                </div>
              <form name='partidosequipocs' id='partidosequipocs' action='detallespartidoequipoavanzadoscs.php' method='post'>                                       
                                        <table id="partidocs" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Detalles</th>
                                                    <th>LOCAL</th>
                                                    <th>VISITANTE</th>
                                                    <th>Resultado</th>   
                                                </tr>
                                            </thead>
                                            <tbody data-link="row" class="rowlink">                                                     
                                <?php
//Obtenemos el equipo del usuario
$query = "select * from equipo where jugador1='$usuario' OR jugador2='$usuario' OR jugador3='$usuario' OR jugador4='$usuario' OR jugador5='$usuario' OR jugador6='$usuario'";
$resultado = $mysqli->query($query); 
$texto1 = NULL;
if($resultado==0){
echo "Este usuario no tienen ningun equipo asignado.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
	$equipousuario=$fila["nombre"];
    }
}
$query = "select * from partidos_equipo_cs where locales='$equipousuario' OR visitantes='$equipousuario'";
$resultado = $mysqli->query($query);  
if($resultado==0){
echo "Este usuario no tienen ningun partido asignado.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$idpartidoequipo=$fila["id_partido_equipo_cs"];
$locales=$fila["locales"];
$visitantes=$fila["visitantes"];
$equipoganador=$fila["ganador"];

//Controlamos el ganador.
if($equipoganador==$equipousuario){
	$resultadopartido="Imagenes/Pagina/victoria.png";
}else if($equipoganador=='Partido pendiente' or $equipoganador==''){
	$resultadopartido="Imagenes/Pagina/pendiente.png";
}else{
        $resultadopartido="Imagenes/Pagina/derrota.png";	
}if($contador%2==0){ 
$texto1 = $texto1 ."
<tr>
    <td><a href=detallespartidoequipoavanzadoscs.php?idpartidoequipocs=$idpartidoequipo><span class='glyphicon glyphicon-share-alt'></span></a></td>
    <td><font size=2>$locales</font></td>
    <td><font size=2>$visitantes</font></td>
    <td><img src=$resultadopartido width=30 border=2></td> 
</tr>";

}else{ 
$texto1 = $texto1 ."
<tr>
    <td><a href=detallespartidoequipoavanzadoscs.php?idpartidoequipocs=$idpartidoequipo><span class='glyphicon glyphicon-share-alt'></span></a></td>
    <td><font size=2>$locales</font></td>
    <td><font size=2>$visitantes</font></td>
    <td><img src=$resultadopartido width=30 border=2></td> 
</tr>";
    }
$contador=$contador+1;
}

}
echo $texto1;
                
?>
			    </tbody>   
                    </table>
                </form>
            </div>
      <script src='js/jquery.min.js'></script>    
        <script src='js/bootstrap.min.js'></script>
    
      		

		
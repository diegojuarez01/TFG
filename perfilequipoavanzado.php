<html>
    <script src='js/sweetalert.min.js'></script>
        <?php 
                include_once 'head.php';
                include_once 'conectar.php';
                include_once 'menunavegacional.php';
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
                  text: 'Debes de iniciar sesion para desafiar equipos',
                  type: 'warning'
              }, function() {
                  window.location = 'Iniciar_sesion.php';
              });
          }, 100);
      </script>"; 	
                   return;
                }        
    // Si el usuario que queremos ver los detalles es el mismo que el conectado, se le redigira a su perfil,
    //Si no se mostrara la informacion del jugador seleccionado y un boton para retar a desafio
    //Ordenamos a los equipos con mayor puntuacion primero
  $query = "select * from equipo where jugador1='$usuario' OR jugador2='$usuario' OR jugador3='$usuario' OR jugador4='$usuario' OR jugador5='$usuario' OR jugador6='$usuario'";
  $resultado = $mysqli->query($query);
if($resultado==0){
echo "Error al acceder a la base de datos de clientes.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$equipousuario=$fila["nombre"];
$_SESSION['equipopropio']=$equipousuario;
$query = "Select * from equipo where nombre = '$equipousuario'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Error al acceder a la base de datos de usuarios.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){ 
$jugador1=$fila["jugador1"];
$jugador2=$fila["jugador2"];
$jugador3=$fila["jugador3"];
$jugador4=$fila["jugador4"];
$jugador5=$fila["jugador5"];
$jugador6=$fila["jugador6"];

  if($jugador2==''){
    $jugador2='Vacio';
    $fotojugador2="Imagenes/Usuarios/vacio.png"; 
}
if($jugador3==''){
      $jugador3='Vacio';
      $fotojugador3="Imagenes/Usuarios/vacio.png"; 
}
if($jugador4==''){
      $jugador4='Vacio';
      $fotojugador4="Imagenes/Usuarios/vacio.png"; 
}
if($jugador5==''){
      $jugador5='Vacio';
      $fotojugador5="Imagenes/Usuarios/vacio.png"; 
}
if($jugador6==''){
      $jugador6='Vacio';
      $fotojugador6="Imagenes/Usuarios/vacio.png";  
}
$puntuacion=$fila["puntuacion"];
$foto=$fila["fotografia"];
  if($foto==""){
        $foto = "Imagenes/Equipos/defecto.jpg";   
                    }
$ganados=$fila["partidos_equipo_ganados"];
$perdidos=$fila["partidos_equipo_perdidos"];
$total = $ganados+$perdidos;                    
}
}
}
}if($equipousuario==''){
                         echo "<script type='text/javascript'>
       setTimeout(function() {
              swal({
                  title: 'Alto',
                  text: 'Debes de tener equipo para desafiar equipos',
                  type: 'warning'
              }, function() {
                  window.location = 'index.php';
              });
          }, 100);
      </script>"; 
                }
        
        //Vamos a guardar las fotos de cada usuario en una variable para mostrarla en esta pantalla.   
        if($jugador1!='Vacio'){
        $query = "Select * from usuarios where usuario = '$jugador1'";
        $resultado = $mysqli->query($query);
        if($resultado==0){
        echo "Error al acceder a la base de datos de usuarios.<br>";
        }else{
        $contador=1; 
        while($fila=$resultado->fetch_assoc()){ 
        $fotojugador1=$fila["fotografia"];              
            }
        }
        }
        
        if($jugador2!='Vacio'){
        $query = "Select * from usuarios where usuario = '$jugador2'";
        $resultado = $mysqli->query($query);
        if($resultado==0){
        echo "Error al acceder a la base de datos de usuarios.<br>";
        }else{
        $contador=1; 
        while($fila=$resultado->fetch_assoc()){ 
        $fotojugador2=$fila["fotografia"];              
            }
        }
        }
         
        if($jugador3!='Vacio'){
        $query = "Select * from usuarios where usuario = '$jugador3'";
        $resultado = $mysqli->query($query);
        if($resultado==0){
        echo "Error al acceder a la base de datos de usuarios.<br>";
        }else{
        $contador=1; 
        while($fila=$resultado->fetch_assoc()){ 
        $fotojugador3=$fila["fotografia"];              
            }
        }
        }
         
        if($jugador4!='Vacio'){
        $query = "Select * from usuarios where usuario = '$jugador4'";
        $resultado = $mysqli->query($query);
        if($resultado==0){
        echo "Error al acceder a la base de datos de usuarios.<br>";
        }else{
        $contador=1; 
        while($fila=$resultado->fetch_assoc()){ 
        $fotojugador4=$fila["fotografia"];              
            }
        } 
        }
        
        if($jugador5!='Vacio'){
        $query = "Select * from usuarios where usuario = '$jugador5'";
        $resultado = $mysqli->query($query);
        if($resultado==0){
        echo "Error al acceder a la base de datos de usuarios.<br>";
        }else{
        $contador=1; 
        while($fila=$resultado->fetch_assoc()){ 
        $fotojugador5=$fila["fotografia"];              
            }
        }
        }
        
        if($jugador6!='Vacio'){
        $query = "Select * from usuarios where usuario = '$jugador6'";
        $resultado = $mysqli->query($query);
        if($resultado==0){
        echo "Error al acceder a la base de datos de usuarios.<br>";
        }else{
        $contador=1; 
        while($fila=$resultado->fetch_assoc()){ 
        $fotojugador6=$fila["fotografia"];              
            }
        }  
        }
	?>
    <body>
    	<div class="container">
            <div class="jumbotron">
                  <h1>PERFIL DE <?php echo $equipousuario;?></h1>
            </div>
        </div>
        <div class="container">
            <div class="row">     
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> ¿QUIERES ENFRENTARTE A ESTE EQUIPO? </h3>
                                </div>
                                <div class="panel-body" id="Informacion">
                                    <form name="crearpartidoequipo" id="crearpartidoequipo" action="crearpartidoequipo.php" method="post" enctype="multipart/form-data" >
                                        <div class="imagenequipo-perfilequipo">  
                                        <?php echo"<img src='$foto' width=70% height:100% style='float:left;margin-right:3%;margin-top:1%;border-radius: 5px;'  id='fotousuario'/> "?>
                                        </div>
                                        <div class="nombreequipo-perfilequipo">
                                        <label for="nombreequipo" style='width:100%; background-color: #3b83bd; float:right; padding-bottom: 2%;    border: 2px solid #063971; border-radius: 5px;'><center><h1><?php echo $equipousuario?></h1></center></label>
                                        <input type="hidden" name="equipo" id="equipo" class="form-control" readonly value= "<?php echo $equipousuario; ?>" size="20" disabled/>
                                        <input type="hidden" name="nombreequipo" id="nombreequipo" class="input" readonly value= "<?php echo $equipousuario; ?>" size="20"/>
                                        </div>
                                        <br>
                                                <div class="titulojugadoresconfotos"> 
                                                    <center><h1>JUGADORES</h1></center></div>
                                        <div class="jugadoresconfotos">
                                        <div class="imagenequipo-perfilequipojugadoresprimeraposicion"> 
                                            <label for="jugadoruno"><center>jovencitototototoo</center></label>
                                            <?php echo"<img src='$fotojugador1'width=100% height=80% style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?>
                                        </div>
                                          <div class="imagenequipo-perfilequipojugadores"> 
                                             <label for="jugadordos"><center><?php echo $jugador2?></center></label>
                                       <?php echo"<img src='$fotojugador2'width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?>
                                        </div>
                                            
                                          <div class="imagenequipo-perfilequipojugadores"> 
                                            <label for="jugadortres"><center><?php echo $jugador3?></center></label>
                                            <?php echo"<img src='$fotojugador3'width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?>
                                        </div>
                                          <div class="imagenequipo-perfilequipojugadoresprimeraposicion"> 
                                             <label for="jugadorcuatro"><center><?php echo $jugador4?></center></label>
                                       <?php echo"<img src='$fotojugador4'width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?>
                                        </div>
                                          <div class="imagenequipo-perfilequipojugadores"> 
                                            <label for="jugadorcinco"><center><?php echo $jugador5?></center></label>
                                            <?php echo"<img src='$fotojugador5'width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?>
                                        </div>
                                          <div class="imagenequipo-perfilequipojugadores"> 
                                             <label for="jugadorseis"><center><?php echo $jugador6?></center></label>
                                       <?php echo"<img src='$fotojugador6'width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?>
                                        </div>
                                        </div>
                                        <br>
                                                  <br>
                                        <br><button type="submit" id="submit" name="enviar" value="login" class="btn-default">DESAFIAR EQUIPO</button>
                                    </form>     
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Estadisticas jugador</h3>
                                </div>
                                <div class="panel-body">    
                                    <form name="crearpartidoindividual" id="crearpartidoindividual" action="crearpartidoindividual.php" method="post" enctype="multipart/form-data" >
			   <div class="form-group"> 
				<label for="totales">Partidos jugados:</label>
				<input type="text" name="totales" id="totales" class="form-control" readonly value= "<?php echo $total; ?>" size="20" disabled/>
                           </div>
                            <div class="form-group"> 
				<label for="ganados">Partidos ganados:</label>
				<input type="text" name="ganados" id="ganados" class="form-control" value= "<?php echo $ganados ?>" size="20" disabled/>
                            </div>
			    <div class="form-group"> 
				<label for="apellidos">Partidos perdidos:</label>
				<input type="text" name="perdidos" id="perdidos" class="form-control" value= "<?php echo $perdidos ?>" size="20" disabled/>
                                    </div>
                            <div class="form-group"> 
				<label for="poblacion">Puntos:</label>
				<input type="text" name="puntos" id="puntos" class="form-control" value= "<?php echo $puntuacion ?>" size="20" disabled/>
                           </div>
		</form>
		</center>
	</div>
	</div>
                </div>
            </div>
        </div>
    </body>
    <script src='js/jquery.min.js'></script>    
    <script src='js/bootstrap.min.js'></script>
  <?php 
 include_once 'footer.php';?>
</html>



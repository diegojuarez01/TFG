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
                $equipo=$_GET["equipo"];	
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
	//Si el equipo es igual que el equipo de usuario que accede lo mandamos al perfil de usuario
	if($equipo==$equipousuario)	{
            echo "<script language='javascript'>window.location='perfilusuario.php'</script>";	
	}else	{
                 $query = "Select * from equipo where nombre = '$equipo'";
                 $resultado = $mysqli->query($query);
if($resultado==0){
echo "Error al acceder a la base de datos de usuarios.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){ 
    $jugador1=$fila["jugador1"];
    $nombre=$fila["nombre"];
    $jugador2=$fila["jugador2"];
    $jugador3=$fila["jugador3"];
    $jugador4=$fila["jugador4"];
    $jugador5=$fila["jugador5"];
    $jugador6=$fila["jugador6"];
    $contrasenia=$fila["contrasenia"];
    $numequipo =$fila["num_equipo"];
    $foto=$fila["fotografia"];
    $puntuacion=$fila["puntuacioncs"];
    $ganados=$fila["partidos_equipo_ganadoscs"];
    $perdidos=$fila["partidos_equipo_perdidoscs"];
    $total = $ganados+$perdidos;  
    
    if($foto==""){
          $imagen = "Imagenes/Equipos/defecto.jpg";   
                    }
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
    ?>       
  <body>
  <div class="container">
            <div class="jumbotron">
                <center><h1>PERFIL DE <?php echo $equipo;?></h1></center>
            </div>
        </div>
        <div class="container">
            <div class="row">     
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   <center> <h3 class="panel-title"> ¿QUIERES ENFRENTARTE A ESTE EQUIPO? </h3></center>
                                </div>
                                <div class="panel-body" id="Informacion"> 
                   <form name="crearpartidoequipocs" id="crearpartidoequipocs" action="crearpartidoequipocs.php" method="post" enctype="multipart/form-data" >
                    <div class="imagenequipo-perfilequipo">  
                        <?php echo"<img src='$foto' width=100% height=100% style='float:left;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?>
                        </div>
                            <div class="nombreequipo-perfilequipo">
                                <label for="nombreequipo" style='width:100%; background-color: #3b83bd; float:right; padding-bottom: 2%;    border: 2px solid #063971; border-radius: 5px;'><center><h1><?php echo $nombre?></h1></center></label>
                            <input type="hidden" name="nombreequipo" id="nombreequipo" class="input" readonly value= "<?php echo $equipo; ?>" size="20"/>
                            </div>
                            <div class="titulojugadoresconfotos"> 
                            <center><h1>JUGADORES</h1></center>
                            </div>
                            <div class="jugadoresconfotos">
                                <div class="imagenequipo-perfilequipojugadoresprimeraposicion"> 
                                    <label for="jugadoruno"><center><?php echo $jugador1?></center></label>
                                              <?php if ($jugador1=='Vacio'){
                                            echo"<img src='$fotojugador1' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/>";
                                        }else{?>
                                        <a href="perfiljugador.php?nombre=<?php echo $jugador1?>"><?php echo"<img src='$fotojugador1' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?></a>
                                        <?php }?>
                                    </div>
                                    <div class="imagenequipo-perfilequipojugadores"> 
                                        <label for="jugadordos"><center><?php echo $jugador2?></center></label>
                                             <?php if ($jugador2=='Vacio'){
                                            echo"<img src='$fotojugador2' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/>";
                                        }else{?>
                                        <a href="perfiljugador.php?nombre=<?php echo $jugador2?>"><?php echo"<img src='$fotojugador2' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?></a>
                                        <?php }?>
                                    </div>
                                    <div class="imagenequipo-perfilequipojugadores"> 
                                        <label for="jugadortres"><center><?php echo $jugador3?></center></label>
                                          <?php if ($jugador3=='Vacio'){
                                            echo"<img src='$fotojugador3' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/>";
                                        }else{?>
                                        <a href="perfiljugador.php?nombre=<?php echo $jugador3?>"><?php echo"<img src='$fotojugador3' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?></a>
                                        <?php }?>
                                    </div>
                                    <div class="imagenequipo-perfilequipojugadoresprimeraposicion"> 
                                        <label for="jugadorcuatro"><center><?php echo $jugador4?></center></label>
                                              <?php if ($jugador4=='Vacio'){
                                            echo"<img src='$fotojugador4' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/>";
                                        }else{?>
                                        <a href="perfiljugador.php?nombre=<?php echo $jugador4?>"><?php echo"<img src='$fotojugador4' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?></a>
                                        <?php }?>
                                    </div>
                                    <div class="imagenequipo-perfilequipojugadores"> 
                                        <label for="jugadorcinco"><center><?php echo $jugador5?></center></label>
                                             <?php if ($jugador5=='Vacio'){
                                            echo"<img src='$fotojugador5' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/>";
                                        }else{?>
                                        <a href="perfiljugador.php?nombre=<?php echo $jugador5?>"><?php echo"<img src='$fotojugador5' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?></a>
                                        <?php }?>
                                    </div>
                                    <div class="imagenequipo-perfilequipojugadores"> 
                                        <label for="jugadorseis"><center><?php echo $jugador6?></center></label>
                                        <?php if ($jugador6=='Vacio'){
                                            echo"<img src='$fotojugador6' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/>";
                                        }else{?>
                                        <a href="perfiljugador.php?nombre=<?php echo $jugador6?>"><?php echo"<img src='$fotojugador6' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?></a>
                                        <?php }?>
                                    </div>
                                <br>
                                <br>
                                </div>
                                <br>
                                <br>
                                <button type="submit" id="submit" name="enviar" value="login" class="btn-default">DESAFIAR EQUIPO</button>
                                </form> 
                                </div> 
                            </div>
                        </div>
                    </div>
                     </div>
                 <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <center><h3 class="panel-title">Estadisticas del equipo</h3></center>
                                </div>
                                <div class="panel-body">    
                                    <form name="crearpartidoindividual" id="" action="" method="post" enctype="multipart/form-data" >
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


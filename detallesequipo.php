<html>
    <script src='js/sweetalert.min.js'></script>
        <?php 
                include_once 'head.php';
                include_once 'conectar.php'; 
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
          }, 300);
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
          }, 300);
      </script>";        
	}           
$query = "select * from equipo where jugador1='$usuario' OR jugador2='$usuario' OR jugador3='$usuario' OR jugador4='$usuario' OR jugador5='$usuario' OR jugador6='$usuario'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Error en BD.<br>";
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
//Si el usuario no tiene ningun equipo se le dara la opcion de crear un equipo, con el de 1er jugador o la de acceder a un equipo creado introduciendo el nombre y la contraseña
if($nombre==''){
    ?>
     <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><center>
                                AUN NO TIENES EQUIPO</center>
                            </h3>
                        </div>
          <div class="panel-body"> 
              <?php
$texto = "
    <div id='dossubmits'>
	<form name='equipo' id='equipo' action='' method='post' enctype='multipart/form-data'>
	<div class='form-group'>
            <label for='nombre'>Nombre:</label>
            <input type='text' name='nombre' id='nombre' class='form-control' value= '$nombre' size='20' required='required' placeholder='Nombre del equipo'/>
            <input type='hidden' name='jugador1' id='jugador1' class='input' value= '$usuario' size='20'/>
        </div>
        <div class='form-group'>
            <label for='password'>Contraseña:</label>
            <input type='hidden' name='numequipo' id='numequipo' class='input' value= '$numequipo' size='20'/>
            <input type='password' name='contrasenia' id='contrasenia' class='form-control' value='$contrasenia' size='32' required='required' placeholder='Introduzca una contraseña'/></p>
        </div>
        <br>
	<button id='enviar' class='btn-default-perfil'style='width: 40%;float:left;' onClick='enviaracceder()'>Entrar equipo</button>	
	<button id='crear'  class='btn-default-perfil' style='width: 40%;float:left;' onClick='enviarcrear()'>Crear equipo </button>
        </form>	
    </div>
	";				
	echo ($texto);                              
}else{
    ?>            
      <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><center>
                                    PERFIL DEL EQUIPO <?php echo $nombre ?></center>
                            </h3>
                        </div>
            <div class="panel-body" id="Informacion">
                <form name='editarequipo' id='editarequipo' action='editarequipo.php' method='post' enctype='multipart/form-data'>
                    <div class="imagenequipo-perfilequipo">  
                        <?php echo"<img src='$foto' width=100% height=100% style='float:left;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?>
                        </div>
                            <div class="nombreequipo-perfilequipo">
                                <label for="nombreequipo" style='width:100%; background-color: #3b83bd; float:right; padding-bottom: 2%;    border: 2px solid #063971; border-radius: 5px;'><center><h1><?php echo $nombre?></h1></center></label>
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
                                        <a href="perfiljugadoravanzado.php?nombre=<?php echo $jugador1?>"><?php echo"<img src='$fotojugador1' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?></a>
                                        <?php }?>
                                    </div>
                                    <div class="imagenequipo-perfilequipojugadores"> 
                                        <label for="jugadordos"><center><?php echo $jugador2?></center></label>
                                             <?php if ($jugador2=='Vacio'){
                                            echo"<img src='$fotojugador2' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/>";
                                        }else{?>
                                        <a href="perfiljugadoravanzado.php?nombre=<?php echo $jugador2?>"><?php echo"<img src='$fotojugador2' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?></a>
                                        <?php }?>
                                    </div>
                                    <div class="imagenequipo-perfilequipojugadores"> 
                                        <label for="jugadortres"><center><?php echo $jugador3?></center></label>
                                          <?php if ($jugador3=='Vacio'){
                                            echo"<img src='$fotojugador3' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/>";
                                        }else{?>
                                        <a href="perfiljugadoravanzado.php?nombre=<?php echo $jugador3?>"><?php echo"<img src='$fotojugador3' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?></a>
                                        <?php }?>
                                    </div>
                                    <div class="imagenequipo-perfilequipojugadoresprimeraposicion"> 
                                        <label for="jugadorcuatro"><center><?php echo $jugador4?></center></label>
                                              <?php if ($jugador4=='Vacio'){
                                            echo"<img src='$fotojugador4' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/>";
                                        }else{?>
                                        <a href="perfiljugadoravanzado.php?nombre=<?php echo $jugador4?>"><?php echo"<img src='$fotojugador4' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?></a>
                                        <?php }?>
                                    </div>
                                    <div class="imagenequipo-perfilequipojugadores"> 
                                        <label for="jugadorcinco"><center><?php echo $jugador5?></center></label>
                                             <?php if ($jugador5=='Vacio'){
                                            echo"<img src='$fotojugador5' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/>";
                                        }else{?>
                                        <a href="perfiljugadoravanzado.php?nombre=<?php echo $jugador5?>"><?php echo"<img src='$fotojugador5' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?></a>
                                        <?php }?>
                                    </div>
                                    <div class="imagenequipo-perfilequipojugadores"> 
                                        <label for="jugadorseis"><center><?php echo $jugador6?></center></label>
                                        <?php if ($jugador6=='Vacio'){
                                            echo"<img src='$fotojugador6' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/>";
                                        }else{?>
                                        <a href="perfiljugadoravanzado.php?nombre=<?php echo $jugador6?>"><?php echo"<img src='$fotojugador6' width=100% height=80%   style='float:right;  border: 2px solid #063971; border-radius: 5px;'  id='fotousuario'/> "?></a>
                                        <?php }?>
                                    </div>
                                <br>
                                <br>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class='form-group'>
                                    <label for='nombre'>Editar nombre de equipo:</label>	
                                    <input type='text' name='nombre' id='nombre' class='form-control' value= <?php echo $nombre?> size='20'/>
                                    <input type='hidden' name='numequipo' id='numequipo' value= <?php  echo $numequipo;?> size='20'/>
                                </div>
                                <div class='form-group'> 
                                    <label for='foto'>Editar foto de equipo:</label>    
                                    <!-- Para que el input file solo acepte imagenes jpg-->
                                    <input type='file' class='form-control' name='foto' accept='image/jpeg' >  
                                </div>
                                <br>
                                <button type = 'submit' id='submit' class='btn-default-perfil' style='width: 45%;float:left;'>Editar equipo</button>
                                </form> 
                                <form name='salirequipo' id='salirequipo' action='salirequipo.php' method='post' enctype='multipart/form-data'>
                                    <input type='hidden' name='numequipo' id='numequipo' value= <?php  echo $numequipo;?> size='20'/>
                                    <input type='hidden' name='usuario' id='usuario' class='input' value= <?php echo $usuario; ?> size='20'/>   
                                    <button type = 'submit' id='submit' class='btn-default-perfil' style='width: 45%;float:left;'>Abandonar equipo</button>
                                </form>	  
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
 <?php
}
?>
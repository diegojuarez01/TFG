<html>
    <script src='js/sweetalert.min.js'></script>
	<?php	
	include 'conectar.php';
        include 'head.php';
	include 'menunavegacional.php';
        $_SESSION['tipousuario'];
	$nombre=$_SESSION['nombre'];
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
        $usuario=$_GET["nombre"];	
	// Si el usuario que queremos ver los detalles es el mismo que el conectado, se le redigira a su perfil,
	// si no se mostrara la informacion del jugador seleccionado y un boton para retar a desafio
	//Si se pulsa sobre el usuario le mandamos al perfil
	if($usuario==$nombre){
		echo "<script language='javascript'>window.location='perfilusuario.php'</script>";	
	}else{
            $query = "Select * from usuarios where usuario = '$usuario'";
            $resultado = $mysqli->query($query);
            if($resultado==0){
            echo "Error al acceder a la base de datos de usuarios.<br>";
            }else{
            $contador=1; 
            while($fila=$resultado->fetch_assoc()){
            $usuariojugador=$fila["usuario"];
            $nombre=$fila["nombre"];
            $apellidos=$fila["apellidos"];
            $puntuacion=$fila["puntuacion"];
            $foto=$fila["fotografia"];
            $poblacion=$fila["poblacion"];
            $ganados=$fila["partidos_usuario_ganados"];
            $perdidos=$fila["partidos_usuario_perdidos"];
            $total = $ganados+$perdidos;
            }
            }
            }
	?>
  <div class="container">
            <div class="jumbotron">
                <center><h1>LIGA INDIVIDUAL LOL</h1></center>
            </div>
        </div>
        <div class="container">
            <div class="row">     
                <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <center> <h3 class="panel-title">Reta a este jugador ahora</h3></center>
                                </div>
                                <div class="panel-body">    
                                    <form name="crearpartidoindividual" id="crearpartidoindividual" action="<?php echo $_SERVER['REQUEST_URI']?>" method="post" enctype="multipart/form-data" >
			   <div class="form-group"> 
				<label for="usuario">Usuario:</label>
				<input type="text" name="usuario" id="usuario" class="form-control" readonly value= "<?php echo $usuariojugador; ?>" size="20" disabled/>
                            <input type="hidden" name="usuariojugador" id="usuariojugador" class="input" readonly value= "<?php echo $usuariojugador; ?>" size="20"/>
                           </div>
                            <div class="form-group"> 
				<label for="nombre">Nombre:</label>
				<input type="text" name="nombre" id="nombre" class="form-control" value= "<?php echo $nombre ?>" size="20" disabled/>
                            </div>
			   <div class="form-group"> 
				<label for="apellidos">Apellidos:</label>
				<input type="text" name="apellidos" id="apellidos" class="form-control" value= "<?php echo $apellidos ?>" size="20" disabled/>
                                    </div>
                                <div class="form-group"> 
                                <label for="poblacion">Poblacion:</label>
				<input type="text" name="poblacion" id="poblacion" class="form-control" value= "<?php echo $poblacion ?>" size="20" disabled/>
			      </div> 
                               
                                <div class="form-group"> 
			<?php echo	"<br><img src='$foto' width=200 class='centrarimagen'></a></p>";
                        ?></div>
			<input type="submit" id="submit" name='enviar' value="Desafiar jugador" />
		</form>
		</center>
	</div>
	</div>
                </div>
                  <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <center><h3 class="panel-title">Estadisticas del jugador</h3></center>
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
        
  <script src='js/jquery.min.js'></script>    
    <script src='js/bootstrap.min.js'></script>
  <?php 
 include_once 'footer.php';
//Si el usuario ha enviado el formulario ejecuta el siguiente codigo
          if(isset($_POST['enviar'])){
              include_once 'crearpartidoindividual.php';
              
          }
          ?>
                </body>
</html>

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
                if(empty($_SESSION['tipousuario'])){ 
                   echo "<script type='text/javascript'>
       setTimeout(function() {
              swal({
                  title: 'Alto',
                  text: 'Debes de iniciar sesion',
                  type: 'warning'
              }, function() {
                  window.location = 'Iniciar_sesion.php';
              });
          }, 100);
      </script>"; 
                   return;
                }
                include_once 'ValidadorEditarPerfil.inc.php';
           //Si el usuario ha enviado el formulario ejecuta el siguiente codigo
          if(isset($_POST['enviar'])){
          $validador = new ValidadorEditarPerfil($_POST['contrasenia']);
          }else{
              $validador = NULL;
          }    
        ?>
    <script type="text/javascript">
        
                        function seleccionar(){
				var miDiv = document.getElementById('soportes');
				var lista = document.getElementById("selectsoporte");
 
				// Obtener el valor de la opción seleccionada
				var valorSeleccionado = lista.options[lista.selectedIndex].value;	

				document.getElementById('titulo').value= valorSeleccionado ;
				miDiv.style.visibility='visible'; 
				
				}
			
			function leerDatos(xhttp){
					//El div que va a variar
					var miDiv = document.getElementById('Informacion');
					//Modificamos su contenido
					miDiv.innerHTML = xhttp.responseText;								
			}
			function loadDoc(url, cfunc) {
				var xhttp;
				xhttp=new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (xhttp.readyState == 4 && xhttp.status == 200) {
						cfunc(xhttp);
					}
				};
			xhttp.open("GET", url, true);
			xhttp.send();
			}	
			function funcionPerfil(){
			location.reload(true);		
			}
			function enviaracceder(){
				document.equipo.action = "accederequipo.php"; 
				document.equipo.submit();
				}
				function enviarcrear(){
				document.equipo.action = "crearequipo.php"; 
				document.equipo.submit();
				}
                                
        $(document).ready(function() {
        $('#partidos tr').click(function() {
            var href = $(this).find("a").attr("href");
            if(href) {
                window.location = href;
            }
        });
    });      
		</script>
    <body>
        <?php 
        $usuario = $_SESSION['nombre'];
            $query = "Select * from usuarios where usuario = '$usuario'";
            $resultado = $mysqli->query($query);
            if($resultado==0){
            echo "Error al acceder a la base de datos de usuarios.<br>";
            }else{
                $contador=1; 
                while($fila=$resultado->fetch_assoc()){
                    $usuario=$fila["usuario"];
                    $nombre=$fila["nombre"];
                    $apellidos=$fila["apellidos"];
                    $puntuacion=$fila["puntuacion"];
                    $foto=$fila["fotografia"];
                    $contrasenia=$fila["contrasenia"];
                    $poblacion=$fila["poblacion"];
                    $provincia=$fila["provincia"];
                    $telefono=$fila["telefono"];
                    $dni=$fila["dni"];
                    $direccion=$fila["direccion"];
                    $cp=$fila["cp"];
                    $email=$fila["email"];
                    $fecha=$fila["fecha_registro"];
                    if($foto==""){
                     $foto = "Imagenes/Usuarios/defecto.jpg";   
                    }
                }
        }
        ?>  
     	<div class="container">
            <div class="jumbotron">
                  <h1>Perfil de <?php echo($usuario);?> </h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">   				
                                    <?php echo"<img src='$foto' width=100% id='imagenperfil'/>"?>                      
                                    <br><br><button type="button" class="btn-default-perfil"  id='perfil'onclick="funcionPerfil()">Mi perfil </button><br>
                                    <button type="button" class="btn-default-perfil" id='equipo'onclick="loadDoc('detallesequipo.php?usuario=<?php echo $usuario ?>',leerDatos)">Mi equipo </button><br>
                                    <button type="button" class="btn-default-perfil" id='soporte'onclick="loadDoc('detallessoportes.php?usuario=<?php echo $usuario ?>',leerDatos)">Mis soportes </button><br>
                                    <button type="button" class="btn-default-perfil" onclick="loadDoc('detallespartidos.php?usuario=<?php echo $usuario ?>',leerDatos)">Mis partidos </button> 	<br>
                                    <button type="button" class="btn-default-perfil" onclick="loadDoc('detallesamigo.php?usuario=<?php echo $usuario ?>',leerDatos)">Mis amigos </button> 	<br>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Miembro desde <?php echo($fecha);?> </h3>
                                </div>
                                <div class="panel-body" id="Informacion">
                                  <form name="editarperfil" id="editarperfil" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" >
                                        <div class="form-group">
                                            <label for="usuario">Usuario:</label>
                                            <input type="text" name="usuario" id="usuario" class="form-control"  value= "<?php echo $usuario ?>"   disabled/>
                                            <input type="hidden" name="usuario" id="usuario" class="input" value= "<?php echo $usuario ?>" size="20"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">Nombre:</label>
                                            <input type="text" name="nombre" id="nombre" class="form-control"  value= "<?php echo $nombre ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="apellidos">Apellidos:</label>
                                            <input type="text" name="apellidos" id="apellidos" class="form-control" value= "<?php echo $apellidos ?>"/>    
                                        </div>
                                        <div class="form-group">
                                            <label for="poblacion">Poblacion:</label>
                                            <input type="text" name="poblacion" id="poblacion" class="form-control" value= "<?php echo $poblacion ?>"/>    
                                        </div>
                                        <div class="form-group">
                                            <label for="provincia">Provincia:</label>
                                            <input type="text" name="provincia" id="provincia" class="form-control" value= "<?php echo $provincia ?>"/>    
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Telefono:</label>
                                            <input type="number" name="telefono" id="telefono" class="form-control" value="<?php echo $telefono ?>" maxlength="9" placeholder="Número de telefono" />        
                                        </div>
                                        <div class="form-group">
                                            <label for="dni">DNI:</label>
                                            <input type="text" name="dni" id="dni" class="form-control" value="<?php echo $dni ?>" maxlength="9"/>        
                                        </div>
                                        <div class="form-group">
                                            <label for="direccion">Dirección:</label>
                                            <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $direccion ?>" size="32"/>        
                                        </div>
                                        <div class="form-group">
                                            <label for="direccion">Código postal:</label>
                                            <input type="number" name="cp" id="cp" class="form-control" value="<?php echo $cp ?>" maxlength="5"/>        
                                        </div>     
                                        <div class="form-group">
                                            <label for="user_pass">Contraseña:</label>
                                            <input type="password" name="contrasenia" id="contrasenia" class="form-control" placeholder="Introduce nueva contraseña" value='' />	   
                                       <?php
                                       if($validador == NULL){
                                       }else if($validador -> EditarPerfilValido()){   
                                          include_once 'editarperfil.php';
                                      }else{
                                          $validador -> MostrarErrorPassword1();
                                      }
                                      ?>
                                        </div>
                                     
                                        <div class="form-group">
                                        <label for="foto">Foto de perfil:</label>
                                        <?php echo "<img src='$foto' width=25%></a></p>";?>                               
                                        </div>
                                        <br>  
                                        <div class="form-group">
                                        <label for="foto">Editar foto de perfil:</label>    
                                        <!-- Para que el input file solo acepte imagenes jpg-->
                                        <input type="file" class="form-control" name='foto' accept='image/jpeg'>  
                                        </div>
                                        <br><button type="submit" id="enviar" name="enviar" value="login" class="btn-default-perfil" style='width: 40%;float:left;'>EDITAR PERFIL</button>
                                   
                                  </form>     
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
	   </div>
        </div>
    </body>
    <script src='js/jquery.min.js'></script>    
    <script src='js/bootstrap.min.js'></script>
        <!--Para enviarnos a la pagina indicada al pulsar en un elemento de la table-->
        <script> $(document).ready(function() {
        $('#partidos tr').click(function() {
            var href = $(this).find("a").attr("href");
            if(href) {
                window.location = href;
            }
        });
    });
        </script>
      		       
  <?php 
 include_once 'footer.php';?>
</html>

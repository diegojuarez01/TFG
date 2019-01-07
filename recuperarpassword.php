<html>
        <script src='js/sweetalert.min.js'></script>
            <script src='js/jquery.min.js'></script>    
    <script src='js/bootstrap.min.js'></script>
<?php
include 'conectar.php';
include 'head.php';
   session_start();
include ('menunavegacional.php');
  if(empty($_SESSION['tipousuario'])){ 
	 } else {
             	header('Location: index.php');
            }
  //Si el usuario ha enviado el formulario ejecuta el siguiente codigo
        if(isset($_POST['enviar'])){
            $usuario= $_POST["usuario"];
            $email = $_POST['email'];
            $asunto = 'Recuperación cuenta';
            $query = "select * from usuarios where usuario='$usuario' AND email='$email'";
            $resultado = $mysqli->query($query);
            if($resultado==0){
            echo "Error al acceder a la base de datos de clientes.<br>";
            }else{
            $contador=1; 
            while($fila=$resultado->fetch_assoc()){
            $password=$fila["contrasenia"];
            $contador++;
            }
            }
            if($contador==1){
                   echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Error',
            text: 'Usuario o email incorrecto',
            type: 'error'
        }, function() {
            window.location = 'recuperarpassword.php';
        });
    }, 100);
</script>";  
            }else{
            $mensaje = $usuario. 'tu contraseña para este nombre de usuario es: ' .$password;
            mail($email,$asunto,$mensaje);
            echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Datos enviados',
            text: 'Revisa tu email',
            type: 'success'
        }, function() {
            window.location = 'index.php';
        });
    }, 100);
            </script>"; }
            }    
            
     
?>
    <body>
     	<div class="container">
            <div class="jumbotron">
                <h1>Recuperación contraseña </h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Introduce tus datos de recuperación</h3>
                                </div>
                                <div class="panel-body">    
                                    <form name="formulariorecuperacion" id="formulariorecuperacion" action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
                                        <div class="form-group">
                                         <label for="user_pass">Nombre de usuario: </label>
                                         <input type="text" name="usuario" id="usuario" class="form-control"  placeholder="Nombre de usuario"  required="required"/>
                                        </div>
                                        <div class="form-group">
                                        <label for="user_pass">Email:</label>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email asociado al usuario"  required="required"/>		       
                                        </div>
                                        <br><center><button type="submit" id="submit" name="enviar" value="login" class="btn-default">RECUPERAR CONTRASEÑA</button></center>
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
                                        <h3 class="panel-title">¿No tienes cuenta?</h3>
                                    </div>
                                    <div class="panel-body">   				
                                        <p><a href="registro.php">Regístrate Ahora <span class="icon-redo"></span></a></p>
                                        <p><a href="recuperarpassword.php">¿Olvidaste la contraseña?</a></p>
                                    </div>	
                                </div>
                            </div>
                         </div>
                       </div>
                    </div>
                </div>
  <?php 
 include_once 'footer.php';?>
 	</body>
</html>



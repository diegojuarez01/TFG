<html>
    <script src='js/sweetalert.min.js'></script>
<?php
include 'head.php';
include "conectar.php"; 
include 'menunavegacional.php';	
    session_start();
    $_SESSION['tipousuario'];
/* Si la variable de sesion esta vacia, redireccionar al index y mostramos un alert. */
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
?>	 <div class="container">
            <div class="jumbotron">
                <h1>Crear administrador</h1>
            </div>
        </div> 
        <div class="container">
            <div class="row">     
                <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <center><h3 class="panel-title">Nuevo administrador</h3></center>
                                </div>
                                <div class="panel-body">    
                                                                                   
                                <form name="formularioregistroadmin" id="formregistroadmin" action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">	
                                    <div class="form-group">
                                    <label for="user_pass">Nombre de admin:</label>
                                    <input autofocus type="text" name="usuario" id="usuario"  class="form-control" value="" size="20" required="required"/>
                                    </div>
                                    <div class="form-group">
                                    <label for="user_pass">Contraseña:</label>
                                    <input type="password" name="password" id="password" class="form-control" value="" size="32" required="required"/>
                                    </div>
                                    <br><br>
                                    <input type="submit" id="submit" name="enviar" value="Crear administrador" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 <?php 
 include ('footer.php');
        //Si el usuario ha enviado el formulario1 ejecuta el siguiente codigo
          if(isset($_POST['enviar'])){
              include_once 'confirmaradmin.php';    
          }
 ?>
     <script src='js/jquery.min.js'></script>    
    <script src='js/bootstrap.min.js'></script>
    </body>
</html>

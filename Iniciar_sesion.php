<html>
<?php
include 'conectar.php';
include ('head.php');
include_once 'ValidadorInicio.inc.php';
  if(empty($_SESSION['tipousuario'])){ 
	 } else {
             	header('Location: index.php');
            }
  //Si el usuario ha enviado el formulario ejecuta el siguiente codigo
        if(isset($_POST['enviar'])){     
           $validador = new ValidadorInicio($_POST['usuario'],$_POST['password']);
            }     
             include ('menunavegacional.php');
?>
    <body>
     	<div class="container">
            <div class="jumbotron">
                <h1>Iniciar sesión </h1>
            </div>
        </div>
        <div class="container">
            <div class="row">     
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Introduce tus datos</h3>
                                </div>
                                <div class="panel-body">    
                                    <form name="formularioinicio" id="forminicio" action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
                                        <div class="form-group">
                                         <label for="user_pass">Nombre de usuario: </label>
                                         <input autofocus type="text" name="usuario" id="usuario" class="form-control"  placeholder=" Nombre de usuario"  required="required"/>
                                        </div>
                                        <div class="form-group">
                                        <label for="user_pass">Contraseña:</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder=" Introduce la contraseña"  required="required"/>		       
                                <?php 
                                //Si se ha enviado el formulario apareceran los datos introducidos por si se produce un error.
                                if(isset($_POST['enviar'])){  
                                        $validador -> MostrarErrorUsuario();
                                }                ?>
                                        </div>
                                        <br><button type="submit" id="submit" name="enviar" value="login" class="btn-default">INICIAR SESIÓN Y JUGAR</button>
                                    </form>
                                 </div>
                               </div>
                            </div>
                        </div>
                </div><div class="col-md-1"></div>
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
    <script src='js/jquery.min.js'></script>    
    <script src='js/bootstrap.min.js'></script>
  <?php 
 include_once 'footer.php';?>
 	</body>
</html>


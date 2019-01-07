<html>
   <script src='js/sweetalert.min.js'></script>
<?php
    include_once 'conectar.php'; 
    include_once 'head.php';
    include_once 'menunavegacional.php';	
    /* Empezamos la sesión */
    session_start();
    /* Obtenemos variable*/
    $_SESSION['tipoempleado'];
    $usuario=$_SESSION['nombre'];
    /* Si la variable de sesion esta vacia, redireccionar al index y mostramos un alert. */
    if(empty($_SESSION['tipousuario'])){
      echo "<script type='text/javascript'>
       setTimeout(function() {
              swal({
                  title: 'Alto',
                  text: 'Debes de iniciar sesion para crear un soporte',
                  type: 'warning'
              }, function() {
                  window.location = 'index.php';
              });
          }, 100);
      </script>"; 
      return;
    }
?>
    <body>	    
	<div class="container">
            <div class="jumbotron">
                <h1>Contacto</h1>
            </div>
        </div>
             <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="textobotonjugar">Revisa soportes en perfil     
                                <a href="perfilusuario.php">
                                    <button class="juegaahora">PERFIL </button>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
                    </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Indica tu consulta
                            </h3>
                        </div>
                        <div class="panel-body">
                             <form role='form' name='formulariocontacto' id='contact_form' action='<?php echo $_SERVER['REQUEST_URI']?>' method='post'>
                                        <div class='form-group'>
                                            <label for='asunto'>Asunto: </label><br/>
                                            <input type='text'   id='name' class='form-control' name='name' type='text' required size='30'/><br/>	
                                        </div>
                                        <div class='form-group'>
                                            <label for='message'>Tu mensaje: </label><br/>
                                            <textarea    id='message' class='form-control'  name='message' type='text' required MAXLENGTH='250'rows='7' cols='30'/></textarea><br/>	
                                        </div>  
                                <?php
                                echo " <input id='usuario' class='input' name='usuario' type='hidden' value='$usuario' size='30'/><br />	
                                    <input type='submit' id='submit' name='enviar' value='Crear soporte' />
                                   ";  
                                    ?>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
      <script src='js/jquery.min.js'></script>    
      <script src='js/bootstrap.min.js'></script>
   <?php 
    include_once 'footer.php';
          //Si el usuario ha enviado el formulario1 ejecuta el siguiente codigo
          if(isset($_POST['enviar'])){
              include_once 'crearsoporte.php';    
          }
          ?>
    </body> 
</html>
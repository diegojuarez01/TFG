<html>
   <script src='js/sweetalert.min.js'></script>
      <script src='js/jquery.min.js'></script>    
      <script src='js/bootstrap.min.js'></script>
    <?php 
   
          include 'head.php';
          include 'conectar.php';
           if(empty($_SESSION['tipousuario'])){ 
	 } else {
             echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Alto',
            text: 'Ya estas registrado',
            type: 'warning'
        }, function() {
            window.location = 'index.php';
        });
    }, 100);
</script>"; 	
             return;
            }
          include ('menunavegacional.php');
          include_once 'ValidadorRegistro.inc.php';
          //Si el usuario ha enviado el formulario ejecuta el siguiente codigo
          if(isset($_POST['enviar'])){
           $validador = new ValidadorRegistro($_POST['nombre'],$_POST['apellidos'],$_POST['usuario'],
                   $_POST['email'],$_POST['password'],$_POST['password2']);
          }
          
    ?>
    <body>	    
	<div class="container">
            <div class="jumbotron">
                <h1>Registro</h1>
            </div>
        </div>
        <div class="container">
            <div class="col-md-1"></div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Introduce tus datos
                            </h3>
                        </div>
                        
                        <div class="panel-body">
                            <form role="form" name="formularioregistro" id="formregistro" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                                <?php 
                                //Si se ha enviado el formulario apareceran los datos introducidos por si se produce un error.
                                if(isset($_POST['enviar'])){
                                    include_once 'RegistroGuardado.inc.php';
                                    }else{
                                    include_once 'RegistroVacio.inc.php';   
                                    }
                                //Si todos los datos estan correctos se comprueba si el usuario ya existe y se añade si no existe.    
                                if($validador -> RegistroValido()){   
                                    include_once 'confirmarregistro.php';
                                }
                                    ?>
                            </form>
                        </div>
                    </div>
                </div>
          
        </div>
   
   <?php 
 include_once 'footer.php';?>
    </body> 
</html>


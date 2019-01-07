<html>
    <script src='js/sweetalert.min.js'></script>
<?php
	include_once 'head.php';
        include_once 'menunavegacional.php';
        include "conectar.php";	
/* Empezamos la sesión */
    session_start();
/* Obtenemos variable*/
    $_SESSION['tipoempleado'];
    $usuario=$_SESSION['nombre'];
/* Si la variable de sesion esta vacia, redireccionar al index y mostramos un alert. */
    if(empty($_SESSION['tipousuario'])){       
  echo"<script language='javascript'>window.location='index.php'</script>;"; 
       exit();
    }else if($_SESSION['tipousuario']=='Usuario'){
	 echo"<script language='javascript'>window.location='index.php'</script>;"; 
       exit();
	}
    $numsoporte=$_GET["num_soporte"];	
    $query = "select * from soporte where num_soporte='$numsoporte'";
    $resultado = $mysqli->query($query);
    if($resultado==0){
    echo "Este usuario no tienen ningun soporte asignado.<br>";
    }else{
    while($fila=$resultado->fetch_assoc()){
    $mensaje=$fila["mensaje"];
    $asunto=$fila["asunto"];
    $usuariosoporte=$fila["usuario"];
    }
    $query = "select * from usuarios where usuario='$usuariosoporte'";
    $resultado = $mysqli->query($query);
        if($resultado==0){
        echo "Este usuario no tienen ningun soporte asignado.<br>";
        }else{
        while($fila=$resultado->fetch_assoc()){
           $fotousuario=$fila["fotografia"];
        }
        }
}
?>
        <div class="container">
            <div class="jumbotron">
                <h1>Detalles del soporte</h1>
            </div>
        </div> 
        <div class="container">
            <div class="row">     
                <div class="col-md-12">
                            <div class="panel panel-default">  
                                <div class="panel-body"> 
                                                <form id='respondersoporte' action='<?php echo $_SERVER['REQUEST_URI']?>' method='post'>   
                                                    <div class="form-group">
                <label for='numsoporte'>Soporte numero:</label><br/>
                <input type='text' name='numsoporte' id='numsoporte' class='form-control' value= "<?php echo $numsoporte ?>"  readonly="readonly"/> <br> 
                </div>
                <div class="form-group">
                <label for='asunto'>Asunto:</label><br/>
                <input type='text' name='asunto' id='asunto' class='form-control' value= "<?php echo $asunto ?>" size='20'  readonly="readonly"/> <br>   
                </div>
                <div class="chat_soporte">
                     <p style='margin-left:2%;margin-top:1%;color: deepskyblue;'><?php echo $usuario ?></p>
                <?php echo"<img src='$fotousuario'width=25% height='75%'   style='float:left; margin-left:2%; margin-right:5%;display:block;'  id='fotousuario'/>"?>   
                    <textarea id='message' class='form-control'  name='message' style='float:left;width:65%;height:60%;margin-bottom: 1%;' type='text' value= "<?php echo $mensaje ?>" placeholder="<?php echo $mensaje ?>"  readonly="readonly" MAXLENGTH='250'rows='7' cols='40'/></textarea><br/></div>	 
                                                                                         
<?php
if($asunto==''){
        echo "<script type='text/javascript'>
       setTimeout(function() {
              swal({
                  title: 'Alto',
                  text: 'No tiene ningun soporte creado',
                  type: 'warning'
              }, function() {
                  window.location = 'contacto.php';
              });
          }, 300);
      </script>"; 
}
else{ 
$query = "select * from mensajes_soporte where num_soporte='$numsoporte'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Este usuario no tienen ningun mensaje para ese soporte.<br>";
}else{
     $contador==1;
while($fila=$resultado->fetch_assoc()){
    $mensaje=$fila["mensaje"];
    $adminmensaje=$fila["admin"];
        $query1 = "select * from usuarios where usuario='$adminmensaje'";
        $resultado1 = $mysqli->query($query1);
        if($resultado1==0){
        echo "Este usuario no tienen ningun soporte asignado.<br>";
        }else{
        while($fila=$resultado1->fetch_assoc()){
           $fotoadmin=$fila["fotografia"];
        }
if($contador%2==0){ 
echo"<div class='chat_soporte'><p style='margin-right:2%;margin-top:1%;text-align:right;color: red;'>Admin: $adminmensaje</p><img src='$fotoadmin'width=25% height='75%'  style='float:right;margin-right:2%;margin-left:2%;  id='fotousuario'/>
<textarea id='respuesta' align=right class='form-control' name='respuesta' style='float:right;width:65%;height:60%;' placeholder='$mensaje' readonly='readonly' MAXLENGTH='250'rows='7' cols='80'></textarea><br></div>";   
}else{ 
echo"<div class='chat_soporte'><p style='margin-left:2%;margin-top:1%;color: deepskyblue;'>$usuariosoporte</p><img src='$fotousuario'width='25%' height='75%'  style='float:left; margin-left:2%; margin-right:5%;display:block;'  id='fotousuario'/>
<textarea id='respuesta' align=right class='form-control' name='respuesta' style='float:left;width:67%;height:60%;' placeholder='$mensaje' readonly='readonly' MAXLENGTH='250'rows='7' cols='80'></textarea><br></div>";   
}
$contador=$contador+1;
}
}
}

}
    ?>
                <br>
                <br>
                <div class="form-group">
                <label for='respuesta1'>Responder soporte</label>
                <br>
                <textarea id='respuesta1' align=right class='form-control' name='respuesta1' style='width:50%;height:15%;'placeholder='' required MAXLENGTH='250'rows='7' cols='80'></textarea>
                </div>
                <button type="submit" id="enviar" name="enviar" value="login" class="btn-default-perfil"style='width: 40%;float:left;'>Responder Soporte</button>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <script src='js/jquery.min.js'></script>    
        <script src='js/bootstrap.min.js'></script>
    </body>
    <?php
    include_once 'footer.php';
    //Si el usuario ha enviado el formulario ejecuta el siguiente codigo
          if(isset($_POST['enviar'])){
              include_once 'respondersoporte.php';
              
          }
?>
</html>		
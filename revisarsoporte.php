<html>
    <script src='js/sweetalert.min.js'></script>
    <script src='js/jquery.min.js'></script>    
    <script src='js/bootstrap.min.js'></script>       
        <?php 
                include_once 'head.php';
                include_once 'conectar.php';
                error_reporting(0);
                /* Empezamos la sesión */
                session_start();
                /* Obtenemos variable*/
                $_SESSION['tipousuario']; 	
                $usuario=$_SESSION['nombre'];
  
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
	}else if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: perfilusuario.php');
}  
   
        include_once 'menunavegacional.php';
            //Si el usuario ha enviado el formulario ejecuta el siguiente codigo
          if(isset($_POST['enviar'])){
              include_once 'respondersoporte_usuario.php';
          }  
    $titulo=$_POST["selectsoporte"];
    $query = "select * from soporte where usuario='$usuario' AND asunto='$titulo'";
    $resultado = $mysqli->query($query);
    if($resultado==0){
    echo "Este usuario no tienen ningun soporte asignado.<br>";
    }else{
    $contador=1; 
        while($fila=$resultado->fetch_assoc()){
        $num_soporte=$fila["num_soporte"];
        $mensaje=$fila["mensaje"];
        $asunto=$fila["asunto"];
        $estadousuario=$fila["estado"];
        }
    }
$query = "select * from usuarios where usuario='$usuario'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Este usuario no tienen ningun soporte asignado.<br>";
}else{
while($fila=$resultado->fetch_assoc()){
   $fotousuario=$fila["fotografia"];
}
}

?>       
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>Detalles del soporte</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">     
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><center>Revisa tu soporte</center></h3>
                                </div>
                                <div class="panel-body" id='soportes'>    
                                    <form id='respondersoporte' action='<?php echo $_SERVER['REQUEST_URI']?>' method='POST' enctype='multipart/form-data'>
                                        <div class='form-group'>
                                            <label for='numsoporte'>Soporte numero:</label><br/>
                                            <input type='text' name='numsoporte' id='numsoporte' style='width:70%;'class='form-control' value= "<?php echo $num_soporte ?>"  readonly="readonly"/> <br/>	
                                            <label for='asunto'>Asunto: </label><br/>
                                            <input type='text' id='name' class='form-control' style='width:70%;'value='<?php echo $asunto?>' disabled name='name' type='text' required size='30'/><br/>	
                                        </div>
                                        <div class='chat_soporte'>
                                        <p style='margin-left:2%;margin-top:1%;color: deepskyblue;'><?php echo $usuario ?></p>
                                        <img src='<?php echo"$fotousuario";?>'width=25% height="75%"  style='float:left; margin-left:2%; margin-right:5%;display:block;'  id='fotousuario'/>
                                        <textarea    id='message' class='form-control'  name='message'  style='float:left;width:65%;height:60%;margin-bottom: 1%; ' type='text' placeholder='<?php echo $mensaje?>' readonly="readonly" MAXLENGTH='250'rows='7' cols='30'/></textarea>	
                                        </div>
	<?php 
         
                
$query = "select * from mensajes_soporte where num_soporte='$num_soporte'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Este usuario no tienen ningun mensaje para ese soporte.<br>";
}else{
     $contador==1;
while($fila=$resultado->fetch_assoc()){
    $mensaje=$fila["mensaje"];
    $adminmensaje=$fila["admin"];

$query2 = "select * from usuarios where usuario='$adminmensaje'";
$resultado2 = $mysqli->query($query2);
if($resultado2==0){
echo "Este usuario no tienen ningun soporte asignado.<br>";
}else{
while($fila=$resultado2->fetch_assoc()){
   $fotoadmin=$fila["fotografia"];
}
}
 
if($contador%2==0){ 
    echo"<div class='chat_soporte'>  <p style='margin-left:2%;margin-top:1%;color: deepskyblue;'>$usuario</p><img src='$fotousuario' width='25%' height='75%'  style='float:left; margin-left:2%; margin-right:5%;display:block;'   id='fotousuario'/>
<textarea id='respuesta1' align=right class='form-control' name='respuesta1' style='float:left;width:65%;height:60%;' placeholder='$mensaje' readonly='readonly' MAXLENGTH='250'rows='7' cols='80'></textarea></div>"; 
  
}else{ 
echo"<div class='chat_soporte'> <p style='margin-right:2%;margin-top:1%;text-align:right;color: red;'>Admin: $adminmensaje</p><img src='$fotoadmin'width=25% height='75%'  style='float:right;margin-right:2%;margin-left:2%;'  id='fotoadmin'/>
<textarea id='respuesta1' align=right class='form-control' name='respuesta1' style='float:right;width:67%;height:60%;' placeholder='$mensaje' readonly='readonly' MAXLENGTH='250'rows='7' cols='80'></textarea></div>";   
}
$contador=$contador+1;
}
}
                if($estadousuario=='abierto'){ ?>
                    <br>
                    <div class='form-group'>
                    <label for='message'>Indica tu respuesta: </label><br/>
                    <textarea id='respuesta1' class='form-control' name='respuesta1' style='width:70%;height:15%;'  required MAXLENGTH='250'rows='7' cols='80'></textarea>	
                </div> 
                <input type='submit' id='submit' name='enviar' value='Responder soporte' />
                <?php  
                }
                ?>
                                    </form>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php          
       include_once 'footer.php';
  ?>
    </body>
</html>				

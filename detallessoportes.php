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
          }, 100);
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
          }, 100);
      </script>"; 
	} 
$query = "select * from soporte where usuario='$usuario'";
$resultado = $mysqli->query($query);        
if($resultado==0){
echo "Este usuario no tienen ningun soporte asignado.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$mensaje=$fila["mensaje"];
$asunto=$fila["asunto"];
$contador++;
// Primer soporte
 if($contador==2){?>                
     <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><center>
                                    Lista de soportes pendientes</center>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form role='form' name='soporte' id='soporte' action='revisarsoporte.php' method='post'>
                                <div class='form-group'>
                                <select class='selectpicker form-control' id='selectsoporte' name='selectsoporte'onChange=seleccionar();>
                                <option value=''disabled  selected='selected'>- Selecciona uno de tus soportes abiertos -</option>                    
<?php
echo "<option value='$asunto'>$asunto</option>";
}
//Todos los otros soportes
else{ 
   //Aparecera una lista con todos los soportes.
	echo "<option value='$asunto'>$asunto</option>";
             }
         }
         //Si el usuario no tiene ningun soporte
if($contador==1){
    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><center>
                                No tienes ningun soporte abierto</center>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div id='dossubmits'>
                                <form role='form' name='soporte' id='soporte' action='crearsoporte.php' method='post'>
                                    <div class='form-group'>
                                        <label for='asunto'>Asunto: </label><br/>
                                        <input type='text'   id='name' class='form-control'  name='name' type='text' required size='30'/>	
                                    </div>
                                    <div class='form-group'>
                                        <label for='message'>Tu mensaje: </label><br/>
                                        <textarea    id='message' class='form-control'  name='message'  type='text' required MAXLENGTH='250'rows='7' cols='30'/></textarea>	
                                    </div>      	 
                                    <input id='usuario' class='input' name='usuario' type='hidden' value='<?php echo $usuario?>' readonly="<?php echo $usuario?>" size='30'/>	
                                    <input type='submit' id='submit' class='btn-default-perfil' style='width: 40%;float:left;' value='Crear soporte' />
                                </form>	
                                </div>
                            </div>
<?php }
     }
?>
</select>
                                    </div>
                    <div id='soportes' style='visibility: hidden;'>
                        <br>
                        <div class='form-group'>    
                            <label for='name'>Asunto:</label><br />
                            <input id='titulo' class='form-control' name='titulo' type='text'  disabled size='30'/><br/>
                        </div>                    
                            <input type='submit' id='submit' class='btn-default-perfil'value='Revisar soporte' style='width: 40%;float:left;'/>
                    </div>
		</form>	
	</div>
</div>
  
                 
				

		
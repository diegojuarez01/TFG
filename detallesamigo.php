<html>
    <script src='js/sweetalert.min.js'></script>
    
<script language="javascript" type="text/javascript">
function enviar(pagina){
document.aceptarpeticion.action = pagina;
document.aceptarpeticion.submit();

}
</script>

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
          }, 300);
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
          }, 300);
      </script>";        
	}         
?>
<body>
      <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><center>
                                AGREGA A TUS AMIGOS </center>
                            </h3>
                        </div>
          <div class="panel-body">
              <?php
	$texto = "
    <form name='enviarpeticion' id='enviarpeticion' action='enviarpeticiones.php' method='post' enctype='multipart/form-data'>
	<div class='form-group'>
        <label for='nombre'>Nombre de usuario:</label><br>	
        <input type='text' name='nombre' id='nombre' class='form-control' value= '$nombre' size='20'/>
	</div>
        <br>
        <input type='submit' id='submit' class='btn-default-perfil' style='width: 40%;float:left;' value='Enviar petición' /><br>
        <br>
           <br>   <br>     
       <div class='form-group'>
          <label for='peticiones'>Peticiones pendientes:</label>
	</div >
      
        </form>"; 
        echo ($texto);
$query = "select * from peticiones_de_amistad where amigo_peticion='$usuario'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "<p style='color:red;'>Este usuario no tiene peticiones de amistad.</p><br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
    $peticion=$fila["amigo_envio"];
    $idpeticion=$fila["id_peticion_amistad"];
   echo"<p style='padding-left:5em'> 
<form action='aceptar_peticion.php' method=post style='display:inline; padding-left:3em;'>
<input type='submit' name='Submit' class='btn btn-success' value='+' >
<input type='hidden' name='nombre' id='nombre' class='input' value= '$peticion' size='20'/>
<input type='hidden' name='idpeticion' id='idpeticion' class='input' value= '$idpeticion' size='20'/> 
    <span lang='es' style='color:#3b83bd; margin-left:10px; margin-right:10px;'> $peticion </span>
</form>
<form action='cancelar_peticion.php' method=post style='display:inline'>
<input name='Submit2' type='submit' class='btn btn-danger' value='-'>
<input type='hidden' name='nombre' id='nombre' class='input' value= '$peticion' size='20'/>
<input type='hidden' name='idpeticion' id='idpeticion' class='input' value= '$idpeticion' size='20'/>
</form>
</p>"   ;
   $contador++;
    }
    if($contador==1){
       
        echo " <p style='color:#3b83bd; padding-left:3em'><br> No tienes ninguna invitacion pendiente </p>";
    }
    }
?>
              <br>
              <form>
                  <div class='form-group'>
                  <label for='amigos'>Tus amigos:</label> 
                  </div></form> <br> 
                  <?php 
$query = "select * from amistades where amigo1='$usuario' OR amigo2='$usuario'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Este usuario no tiene peticiones de amistad.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
    $amigo1=$fila["amigo1"];
    $amigo2=$fila["amigo2"];
        if($amigo1==$usuario){
            $query = "select * from usuarios where usuario='$amigo2'";
            $resultado2 = $mysqli->query($query);
                while($fila=$resultado2->fetch_assoc()){
                  $estadoamigo2 = $fila["activo"];  
                }
                if($estadoamigo2==0){
         echo "<form style='display:inline'>            
<p style='color:#3b83bd; padding-left:3em'>$amigo2<span class='circulo_red'>-</span></p>
</form><br>";
                }else{
                      echo "<form style='display:inline'>            
<p style='color:#3b83bd; padding-left:3em'>$amigo2<span class='circulo_green'>-</span></p>
</form><br>";
                }         
            }else{
                $query = "select * from usuarios where usuario='$amigo1'";
            $resultado3 = $mysqli->query($query);
                while($fila=$resultado3->fetch_assoc()){
                  $estadoamigo1 = $fila["activo"];  
                }
                  if($estadoamigo1==1){ 
            echo "<form style='display:inline'>
<p style='color:#3b83bd; padding-left:3em'>$amigo1<span class='circulo_green'>-</span></p>
</form><br>";
                  }else{
                        echo "<form style='display:inline'>
<p style='color:#3b83bd; padding-left:3em'>$amigo1<span class='circulo_red'>-</span></p>
</form><br>";   
                  }
            } 
    }
    }
    ?>
                  </body>
                  </html>

			

		

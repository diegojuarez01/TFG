<html>
    <script src='js/sweetalert.min.js'></script>
        <?php 
       include_once 'conectar.php';	
    /* Empezamos la sesión */
        session_start();
    /* Obtenemos variable*/
        $_SESSION['tipousuario'];
    /* Si la variable de sesion esta vacia, redireccionar al index y mostramos un alert. */
        if(empty($_SESSION['tipousuario'])){       
    header('Location: index.php');
    }else if($_SESSION['tipousuario']=='Usuario'){
	 header('Location: index.php');
	}
                include_once 'head.php';
                include_once 'menunavegacional.php';
?>
                <script>
			function enviar(pagina){
				document.jugadores.action = pagina;
				document.jugadores.submit();
				}
		</script>
  <div class="container">
            <div class="jumbotron">
                <center><h1>GESTIÓN DE JUGADORES</h1></center>
            </div>
        </div> 
        <div class="container">
            <div class="row">     
                <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><center>Lista de usuarios</h3></center>
                                </div>
                                <div class="panel-body">    
                                <center>
                                    <form method="post" name="jugadores" action="">                                       
                                        <table id="ranking" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nick</th>
                                                    <th>DNI</th>
                                                    <th>Nombre</th>
                                                    <th>Apellidos</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody data-link="row" class="rowlink">     			
<?php 	
//Mostrara a todos los usuarios que no sean administradores
$query = "Select * from usuarios where tipo='Usuario'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Error al acceder a la base de datos de jugadores.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$usuarios=$fila["usuario"];
$dni=$fila["dni"];
$nombre=$fila["nombre"];
$apellidos=$fila["apellidos"];
$foto=$fila["fotografia"];
        //Si no tiene foto el usuario se mostrara la imagen por defecto.
         if(empty($foto)){
                     $foto = "Imagenes/Usuarios/defecto.jpg";        
                    }if($contador%2==0){ 
                        echo "<tr>
                        <td>$usuarios</td>
                        <td>$dni</td>
                        <td>$nombre</td>
                        <td>$apellidos</td>
                        <td >  <label class='custom-control custom-checkbox'>
                                    <input type=checkbox class='custom-control-input' name=borrar[]  value=$usuarios >
                                    <span class='custom-control-indicator'></span>
                                </label>  
                             </td>
                        </tr>";
                    }else{ 
                        echo "<tr>
                        <td>$usuarios</td>
                        <td>$dni</td>
                        <td>$nombre</td>
                        <td>$apellidos</td>
                          <td >  <label class='custom-control custom-checkbox'>
                                    <input type='checkbox' class='custom-control-input' name=borrar[]  value=$usuarios >
                                    <span class='custom-control-indicator'></span>
                                </label> </td>                   
                             
                        </tr>";
                        }
                        $contador=$contador+1;
                    }
    }
?>
</table>
<button class='btn-default-perfil' name='enviar1' style='width: 40%;float:left;'> Eliminar jugadores </button>
<button class='btn-default-perfil' onClick="enviar('crearadministrador.php')" style='width: 40%;float:left;'> Nuevo administrador </button>
<br>  <br>  <br>  <br>
</form>
                                  
	</div>
                                </div>
                    </div>
                </div>
            </div>
<?php
    include_once 'footer.php';
          //Si el usuario ha enviado el formulario1 ejecuta el siguiente codigo
          if(isset($_POST['enviar1'])){
              include_once 'eliminarjugador.php';    
          }
?>
        <script src='js/jquery.min.js'></script>    
        <script src='js/bootstrap.min.js'></script>
    </body>
</html>

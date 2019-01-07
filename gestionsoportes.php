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
		<script type="text/javascript">
			//Funcion para enviar un formulario a diferentes paginas
			function enviar(pagina){
				document.soportes.action = pagina;
				document.soportes.submit();
				}
                    </script>
  <div class="container">
            <div class="jumbotron">
               <center> <h1>GESTIÓN DE SOPORTES</h1></center>
            </div>
        </div> 
        <div class="container">
            <div class="row">     
                <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Lista de soportes de los usuarios</h3>
                                </div>
                                <div class="panel-body">    
                                <center>
                                    <form method="post" name="soportes" action="">                                    
                                        <table id="soportes" class="table table-striped table-hover">
                                            <thead>
                                                <tr>     
                                                    <th>ID_SOPORTE</th>
                                                    <th>Usuario</th>
                                                    <th>Asunto</th>
                                                </tr>
                                            </thead>
                                            <tbody data-link="row" class="rowlink">     			
<?php 	
//Mostrara a todos los usuarios que no sean administradores
$query = "Select * from soporte where estado='en_espera'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Error al acceder a la base de datos de jugadores.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$usuario=$fila["usuario"];
$asunto=$fila["asunto"];
$idsoporte=$fila["num_soporte"];
        if($contador%2==0){ 
            echo "<tr>
                <td><a href=versoporte.php?num_soporte=$idsoporte> $idsoporte</td>
                <td>$usuario</td>
                <td>$asunto</td>
                </tr>";
                    }else{ 
            echo "<tr>
                <td><a href=versoporte.php?num_soporte=$idsoporte> $idsoporte</td>
                <td>$usuario</td>
                <td>$asunto</td>
                </tr>";
                        }
                        $contador=$contador+1;
                    }
    }
?>
                                            </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <script src='js/jquery.min.js'></script>    
        <script src='js/bootstrap.min.js'></script>
            <!--Para enviarnos a la pagina indicada al pulsar en un elemento de la table-->
        <script> 
            $(document).ready(function() {
        $('#soportes tr').click(function() {
            var href = $(this).find("a").attr("href");
            if(href) {
                window.location = href;
            }
        });
    });
   
        </script>
         <br>        <br>        <br>  <br>        <br>        <br>
    </body>

    <?php
    include_once 'footer.php';
?>
</html>								
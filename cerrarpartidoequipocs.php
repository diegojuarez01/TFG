
<html>
        <script src='js/sweetalert.min.js'></script>
<?php
	include_once 'head.php';
        include_once 'menunavegacional.php';
        include "conectar.php";
        session_start();
        $_SESSION['tipousuario'];
    /* Si la variable de sesion esta vacia, redireccionar al index y mostramos un alert. */
        if(empty($_SESSION['tipousuario'])){       
        header('Location: index.php');
        }else if($_SESSION['tipousuario']=='Usuario'){
             header('Location: index.php');
        }
        $idpartidoequipo=$_GET["id_partido_equipo"];
        //Mostrara a todos los partidos individuales pendientes
        $query = "Select * from partidos_equipo_cs  where id_partido_equipo_cs='$idpartidoequipo'";
        $resultado = $mysqli->query($query);
        if($resultado==0){
        echo "Error al acceder a la base de datos de partidos.<br>";
        }else{
        $contador=1; 
            while($fila=$resultado->fetch_assoc()){
                $local=$fila["locales"];
                $visitante=$fila["visitantes"];
            }
        }
?>	 
	 <div class="container">
            <div class="jumbotron">
                <h1>CERRAR PARTIDOS DE EQUIPO</h1>
            </div>
        </div> 
        <div class="container">
            <div class="row">     
                <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Establecer ganador</h3>
                                </div>
                                <div class="panel-body">    
                                    <form method="post" name="partidoequipo" action="<?php echo $_SERVER['REQUEST_URI']?>">   
                                          <div class="form-group">
                                        <label for="usuario">Equipo ganador:</label></br></br>	
                                        <select class='selectpicker form-control' id='selectganador'  required name='selectganador'onChange=valorselectganador();>
                                        <option value=''disabled   selected='selected'>- Selecciona el equipo ganador del partido -</option>
                                        <option value='<?php echo $local?>'><?php echo $local?></option>
                                        <option value='<?php echo $visitante?>'><?php echo $visitante?></option>
                                        </select>
                                          </div>
                                        <input type="hidden" id="idpartido" name="idpartido"value='<?php echo "$idpartidoequipo"?>'/>
                                        <input type="hidden" id="local" name="local"value='<?php echo $local?>'/>
                                        <input type="hidden" id="visitante" name="visitante"value='<?php echo $visitante?>'/>
                                    
                                          <div class="form-group">
                                    <label for="kills1">Kills equipo local:</label></br></br>	
                                    <input type="number" id="kills_1" name="kills_1" class="form-control" required/>
                                    </div>
                                    <div class="form-group">
                                    <label for="kills2">Kills equipo visitante:</label></br></br>	
                                    <input type="number" id="kills_2" name="kills_2" class="form-control"  required/>
                                    </div>
                                        <input type="submit" id="submit" name='enviar' value="Cerrar partido" />
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
              include_once 'cerrarpartidoequipocs2.php';    
          }

    ?>
</html>			


				

		
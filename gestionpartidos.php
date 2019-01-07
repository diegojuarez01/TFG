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
               <center> <h1>GESTIÓN DE PARTIDOS</h1></center>
            </div>
        </div> 
        <div class="container">
            <div class="row">     
                <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Lista de partidos individuales pendientes LOL</h3>
                                </div>
                                <div class="panel-body">    
                                <center>
                                    <form method="post" name="soportes" action="">                                    
                                        <table id="partidos" class="table table-striped table-hover">
                                            <thead>
                                                <tr>     
                                                    <th>PARTIDO</th>
                                                    <th>LOCAL</th>
                                                    <th>VISITANTE</th>
                                                </tr>
                                            </thead>
                                            <tbody data-link="row" class="rowlink">     							
<?php 
//Mostrara a todos los partidos individuales pendientes
$query = "Select * from partidos_individuales where ganador='Partido pendiente'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Error al acceder a la base de datos de partidos.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$idpartido=$fila["id_partido"];
$jugador1=$fila["jugador1"];
$jugador2=$fila["jugador2"];
if($contador%2==0){ 
echo "<tr>
<td><a href=cerrarpartidoindividual.php?id_partido=$idpartido>$idpartido</td>
<td>$jugador1</td>
<td>$jugador2</td>
</tr>";
}else{ 
echo "<tr>
<td><a href=cerrarpartidoindividual.php?id_partido=$idpartido>$idpartido</td>
<td>$jugador1</td>
<td>$jugador2</td>
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
        <div class="container">
            <div class="row">     
                <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Lista de partidos equipo pendientes LOL</h3>
                                </div>
                                <div class="panel-body">    
                                <center>
                                    <form method="post" name="soportes" action="">                                    
                                        <table id="partidos" class="table table-striped table-hover">
                                            <thead>
                                                <tr>     
                                                    <th>PARTIDO_EQUIPO</th>
                                                    <th>LOCAL</th>
                                                    <th>VISITANTE</th>
                                                </tr>
                                            </thead>
                                            <tbody data-link="row" class="rowlink">   
<?php 	
//Mostrara a todos los partidos individuales pendientes
$query = "Select * from partidos_equipo where ganador='Partido pendiente'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Error al acceder a la base de datos de partidos.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$idpartidoequipo=$fila["id_partido_equipo"];
$locales=$fila["locales"];
$visitantes=$fila["visitantes"];
if($contador%2==0){ 
echo "<tr>
<td><a href=cerrarpartidoequipo.php?id_partido_equipo=$idpartidoequipo>$idpartidoequipo</td>
<td>$locales</td>
<td>$visitantes</td>
</tr>";
}else{
echo "<tr>
<td><a href=cerrarpartidoequipo.php?id_partido_equipo=$idpartidoequipo>$idpartidoequipo</td>
<td>$locales</td>
<td>$visitantes</td>
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
        <div class="container">
            <div class="row">     
                <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Lista de partidos individuales pendientes CS</h3>
                                </div>
                                <div class="panel-body">    
                                <center>
                                    <form method="post" name="soportes" action="">                                    
                                        <table id="partidos" class="table table-striped table-hover">
                                            <thead>
                                                <tr>     
                                                    <th>PARTIDO</th>
                                                    <th>LOCAL</th>
                                                    <th>VISITANTE</th>
                                                </tr>
                                            </thead>
                                            <tbody data-link="row" class="rowlink">     							
<?php 
//Mostrara a todos los partidos individuales pendientes
$query = "Select * from partidos_individuales_cs where ganador='Partido pendiente'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Error al acceder a la base de datos de partidos.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$idpartido=$fila["id_partido_cs"];
$jugador1=$fila["jugador1"];
$jugador2=$fila["jugador2"];
if($contador%2==0){ 
echo "<tr>
<td><a href=cerrarpartidoindividualcs.php?id_partido=$idpartido>$idpartido</td>
<td>$jugador1</td>
<td>$jugador2</td>
</tr>";
}else{ 
echo "<tr>
<td><a href=cerrarpartidoindividualcs.php?id_partido=$idpartido>$idpartido</td>
<td>$jugador1</td>
<td>$jugador2</td>
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
        <div class="container">
            <div class="row">     
                <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Lista de partidos equipo pendientes CS</h3>
                                </div>
                                <div class="panel-body">    
                                <center>
                                    <form method="post" name="soportes" action="">                                    
                                        <table id="partidos" class="table table-striped table-hover">
                                            <thead>
                                                <tr>     
                                                    <th>PARTIDO_EQUIPO</th>
                                                    <th>LOCAL</th>
                                                    <th>VISITANTE</th>
                                                </tr>
                                            </thead>
                                            <tbody data-link="row" class="rowlink">   
<?php 	
//Mostrara a todos los partidos individuales pendientes
$query = "Select * from partidos_equipo_cs where ganador='Partido pendiente'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Error al acceder a la base de datos de partidos.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$idpartidoequipo=$fila["id_partido_equipo_cs"];
$locales=$fila["locales"];
$visitantes=$fila["visitantes"];
if($contador%2==0){ 
echo "<tr>
<td><a href=cerrarpartidoequipocs.php?id_partido_equipo=$idpartidoequipo>$idpartidoequipo</td>
<td>$locales</td>
<td>$visitantes</td>
</tr>";
}else{
echo "<tr>
<td><a href=cerrarpartidoequipocs.php?id_partido_equipo=$idpartidoequipo>$idpartidoequipo</td>
<td>$locales</td>
<td>$visitantes</td>
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
        $('#partidos tr').click(function() {
            var href = $(this).find("a").attr("href");
            if(href) {
                window.location = href;
            }
        });
    });
        </script>
    </body>
  
    <?php
    include_once 'footer.php';
?>
</html>		
				

		
<html>
   <?php
	session_start();
	include_once 'conectar.php';	
	include_once 'head.php';
	?>
       <script>
        function MostrarRanking(num) {
            if (num == "") {
                document.getElementById("rankingcambiante").innerHTML = "";
                return;
            } else { 
                if (window.XMLHttpRequest) {   
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("rankingcambiante").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","ranking_individualcsajax.php?num=" + num,true);
                xmlhttp.send();
            }
            
        }
        
    </script>
           <script> 
                   <!--Para enviarnos a la pagina indicada al pulsar en un elemento de la table-->
                function RetarJugador() {
        $('#ranking tr').click(function(){
            var href = $(this).find("a").attr("href");
            if(href) {
                window.location = href;
            }
        });
    }
        </script>
    <body>
        <?php
	include_once 'menunavegacional.php';
	?>  
        
        <div class="container">
            <div class="jumbotron">
                <h1>RANKING CS LIGA INDIVIDUAL</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div>
                            <p class="textobotonjugar"> !Empieza a jugar ahora! 
                                <a href="jugar1v1.php">
                                    <button class="juegaahora">JUGAR </button>
                                </a>
                            </p>
                            </div>
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
                                    <h3 class="panel-title">Clasificación</h3>
                                </div>
                                <div class="panel-body">    
                                <center>
                                    <form method="post" name="rankingequipos" action="">    
                                          <div class="col-sm-2">
                                           <select class ='form-control' name='lista'  id='lista' onchange='MostrarRanking(this.value)' >
                                            <option value='1'> 1  -  10 </option>
                                                <option  value='2'> 11 - 20 </option>
                                                    <option  value='3'> 21 - 30 </option>
                                                        <option  value='4'> 31 - 40 </option>
                                                            <option  value='5'> 41 - 50 </option>
                                                                <option  value='6'> 51 - 60 </option>
                                        </select>
                                           <br></div>
                                          <div id='rankingcambiante' name='rankingcambiante'>
                                        <table id="ranking" class="table table-striped table-hover" onclick='RetarJugador()'>
                                            <thead>
                                                <tr>
                                                    <th >Puesto</th>
                                                    <th >Jugadores</th>
                                                    <th >PT</th>
                                                    <th >PG</th>
                                                    <th >PP</th>  
                                                    <th >Pts</th>
                                                </tr>
                                            </thead>
                                            <tbody data-link="row" class="rowlink">                                 
<?php 
//Colocamos a los equipos con mayor puntuacion primero
$query = "Select * from usuarios ORDER BY puntuacioncs DESC";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Error al acceder a la base de datos de clientes.<br>";
}else{
$contador=1; 
while($row=$resultado->fetch_assoc()){
$usuario=$row["usuario"];
$nombre=$row["nombre"];
$puntuacion=$row["puntuacioncs"];
$ganados=$row["partidos_usuario_ganadoscs"];
$perdidos=$row["partidos_usuario_perdidoscs"];
$jugados= $perdidos + $ganados;

if($contador <= 10){
       echo " 
<tr>
    <td class='col-md-1'>$contador</td>
    <td class='col-md-2'>$usuario</td>
    <td class='col-md-1'>$jugados</td>
    <td class='col-md-1'>$ganados</td>    
    <td class='col-md-1'>$perdidos</td>      
    <td class='col-md-2'><a href=perfiljugadorcs.php?nombre=$usuario></a>$puntuacion</td>
</tr>";
}
$contador=$contador+1;
}
}
?>
                        </tbody>   
                    </table>
                                          </div>
                </form>
            </div>
        </div>	
                    </div>	
                </div>	
            </div>	
<?php
    include_once 'footer.php';
?>
        <script src='js/jquery.min.js'></script>    
        <script src='js/bootstrap.min.js'></script>
    </body>
</html>


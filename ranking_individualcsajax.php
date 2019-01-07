<html>
   <?php
	session_start();
	include_once 'conectar.php';	
	include_once 'head.php';
	$num=$_GET["num"];
        $inicio = (10*($num-1))+1;
        $limit= $num*10;?>

    
 <table id="ranking" class="table table-striped table-hover" onclick="RetarJugador()"> 
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

if($num == 1 && $contador <= 10){
          echo " 
<tr>
    <td class='col-md-1'>$contador</td>
    <td class='col-md-2'>$usuario</td>
    <td class='col-md-1'>$jugados</td>
    <td class='col-md-1'>$ganados</td>    
    <td class='col-md-1'>$perdidos</td>      
    <td class='col-md-2'><a href=perfiljugadorcs.php?nombre=$usuario></a>$puntuacion</td>
</tr>";

}else if($contador >= $inicio && $contador <= $limit ){
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

                
                             

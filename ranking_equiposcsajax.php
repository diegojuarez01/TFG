<html>
   <?php
	session_start();
	include_once 'conectar.php';	
	include_once 'head.php';
	$num=$_GET["num"];
        $inicio = (10*($num-1))+1;
        $limit= $num*10;
        ?>
 <table id="ranking" class="table table-striped table-hover" onclick="RetarEquipo()"> 
     <thead>
                                                <tr>
                                                    <th>Puesto</th>
                                                    <th>Equipo</th>                                               
                                                    <th >PT</th>
                                                    <th >PG</th>
                                                    <th >PP</th>
                                                    <th >Pts</th>  
                                                </tr>
                                                </thead>
                                            <tbody data-link="row" class="rowlink">                          
<?php 
//Colocamos a los equipos con mayor puntuacion primero
$query = "Select * from equipo ORDER BY puntuacioncs DESC";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Error al acceder a la base de datos de clientes.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$nombre=$fila["nombre"];
$puntuacion=$fila["puntuacioncs"];
$ganados=$fila["partidos_equipo_ganadoscs"];
$perdidos=$fila["partidos_equipo_perdidoscs"];
$jugados=$perdidos + $ganados;
if($num == 1 && $contador <= 10){
 echo "
<tr>
    <td class='col-md-1'>$contador</td>
    <td class='col-md-2'>$nombre</td>
    <td class='col-md-1'>$jugados</td>       
    <td class='col-md-1'>$ganados</td>    
    <td class='col-md-1'>$perdidos</td>      
    <td class='col-md-2'> <a href=perfilequipocs.php?equipo=$nombre></a>$puntuacion</td>
</tr>";
}else if($contador >= $inicio && $contador <= $limit ){
echo "
<tr>
    <td class='col-md-1'>$contador</td>
    <td class='col-md-2'>$nombre</td>
    <td class='col-md-1'>$jugados</td>       
    <td class='col-md-1'>$ganados</td>    
    <td class='col-md-1'>$perdidos</td>      
    <td class='col-md-2'> <a href=perfilequipocs.php?equipo=$nombre></a>$puntuacion</td>
</tr>";
}
$contador=$contador+1;
}
}
?>                         
                        </tbody>   
                         </table>

                
                             


<html>
    <script src='js/sweetalert.min.js'></script>
<?php 
    include_once 'head.php';
    include "conectar.php";
    //Para que solo se pueda acceder por el formulario
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: perfilusuario.php');
    }
    
$nombre=$_POST["nombre"];
$numequipo=$_POST["numequipo"];
$foto = $_FILES['foto']['name'];
$ruta = $_FILES['foto']['tmp_name'];
$destino = 'Imagenes/Equipos/'.$foto;
copy($ruta,$destino);
$query = "select * from equipo where nombre='$nombre'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo " <h4>Error al modificar el equipo en la Base de Datos.</h4><br>";
}else{
while($fila=$resultado->fetch_assoc()){
$nombrecomprobacion=$fila["nombre"]; 
}if($nombrecomprobacion==''){
    if (is_uploaded_file($_FILES['foto']['tmp_name'])){
$query = "update equipo set nombre='$nombre',fotografia='$destino' where num_equipo='$numequipo'";
$resultado = $mysqli->query($query);  
if($resultado==0){
echo " <h4>Error al modificar el equipo en la Base de Datos.</h4><br>";
}else{
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Equipo editado',
            text: 'Equipo modificado correctamente',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";	
}
}else{
	$query = "update equipo set nombre='$nombre' where num_equipo='$numequipo'";
        $resultado = $mysqli->query($query); 
        if($resultado==0){
echo " <h4>Error al modificar el equipo en la Base de Datos.</h4><br>";
}else{
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Equipo editado',
            text: 'Equipo modificado correctamente',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";	
    }
        }
	}else{
if (is_uploaded_file($_FILES['foto']['tmp_name'])){
    	$query = "update equipo set fotografia='$destino' where num_equipo='$numequipo'";
        $resultado = $mysqli->query($query); 
if($resultado==0){
echo " <h4>Error al modificar el equipo en la Base de Datos.</h4><br>";
}else{
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Equipo editado',
            text: 'Equipo modificado correctamente',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";	
}
}else{
	
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Equipo editado',
            text: 'Equipo modificado correctamente',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";	

	}
}
}
?>
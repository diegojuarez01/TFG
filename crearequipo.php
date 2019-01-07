<html>
   <script src='js/sweetalert.min.js'></script>
<?php 
    include 'head.php';
    session_start();
    $_SESSION['tipousuario'];
			
include "conectar.php";
//Para que solo se pueda acceder por el formulario
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: perfilusuario.php');
    return;
} 
$nuevojugador=$_POST["jugador1"];
$contrasenia=$_POST["contrasenia"];
$nombre=$_POST["nombre"];
$puntuacion=1000;
$puntuacioncs=1000;
$foto ="Imagenes/Equipos/defecto.jpg";  

if($nombre=='' OR $contrasenia==''){
    echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Error',
            text: 'Introduzca un nombre de equipo y una contraseña',
            type: 'warning'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 300);
</script>";   
}else{
//Encriptamos la contraseña al crear un nuevo equipo.
$contrasenia = password_hash($contrasenia,PASSWORD_DEFAULT);    
//Comprobamos que el equipo no esta repetido en la bd
$query = "select * from equipo where nombre='$nombre'";
$resultado = $mysqli->query($query);
{
//Si no hay ningun usuario con el mismo nombre de usuario se hara un insert a la bd con los datos obtenidos del formulario
if($resultado==0){
	echo "Error al acceder a la base de datos de equipo.<br>";	
}else{ 
while($fila=$resultado->fetch_assoc()){
$usuariocomprobacion=$fila["nombre"]; 
 echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Equipo en uso',
            text: 'Utilice otro nombre de equipo',
            type: 'warning'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 300);
</script>";   	
}if($usuariocomprobacion==''){
    $query = "insert into equipo (nombre,contrasenia,jugador1,puntuacion,puntuacioncs,fotografia) values ('$nombre','$contrasenia','$nuevojugador','$puntuacion','$puntuacioncs','$foto')";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Error al acceder a la base de datos de equipo.<br>";	
}else{
    echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Equipo creado',
            text: 'Creaste $nombre',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 300);
</script>";		
}
}
}
}
}


?>
<html>
    <script src='js/sweetalert.min.js'></script>
<?php
//Para que solo se pueda acceder por el formulario
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: crearadministrador.php');
} 
include "conectar.php";	
include "head.php";
    session_start();
    $_SESSION['tipousuario']; 
//Recogemos los datos del formulario
$usuario=$_POST["usuario"];
$contrasenia=$_POST["password"];
$tipo="Administrador";
$puntuacion=1000;
$puntuacioncs=1000;
$fecha=date("Y-m-d H:i:s");  
$foto= "Imagenes/Usuarios/defecto.jpg";  
//Encriptamos la contraseña al crear un nuevo usuario.
$contrasenia = password_hash($contrasenia,PASSWORD_DEFAULT);
$query = "select * from usuarios where usuario='$usuario'";
$resultado = $mysqli->query($query);
{
//Si no hay ningun usuario con el mismo nombre de usuario se hara un insert a la bd con los datos obtenidos del formulario
if($resultado==0){
    echo "Error al acceder a la base de datos de usuario.<br>";	
}else{ 
while($fila=$resultado->fetch_assoc()){
$usuariocomprobacion=$fila["usuario"];
 echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Usuario en uso',
            text: 'Busque otro nombre de usuario',
            type: 'warning'
        }, function() {
            window.location = 'gestionjugadores.php';
        });
    }, 300);
</script>";
}if($usuariocomprobacion==''){
$query = "insert usuarios(usuario,contrasenia,tipo,puntuacion,puntuacioncs,fotografia,fecha_registro) values ('$usuario','$contrasenia','$tipo','$puntuacion','$puntuacioncs','$foto','$fecha')";
$resultado = $mysqli->query($query);	
if($resultado==0){
echo "Error al acceder a la base de datos de usuario.<br>";	
}
else{ 
 echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: '!Hecho!',
            text: 'Administrador creado correctamente',
            type: 'success'
        }, function() {
            window.location = 'gestionjugadores.php';
        });
    }, 300);
</script>";		
}
}
}
}
?>

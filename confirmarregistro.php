<?php 
//Para que solo se pueda acceder por el formulario
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registro.php');
}
include "conectar.php"; 
error_reporting(0);	
//Recogemos los datos del formulario
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$email=$_POST["email"];
$usuario=$_POST["usuario"];
$contrasenia=$_POST["password"];
$tipo="Usuario";
$puntuacion=1000;
$foto= "Imagenes/Usuarios/defecto.jpg";  
 $fecha=date("Y-m-d H:i:s");  
//Encriptamos la contraseña al crear un nuevo usuario.
$contrasenia = password_hash($contrasenia,PASSWORD_DEFAULT);
$query = "INSERT INTO usuarios (nombre,apellidos,email,usuario,contrasenia,tipo,puntuacion,puntuacioncs,fecha_registro,fotografia) values ('$nombre','$apellidos','$email','$usuario','$contrasenia','$tipo','$puntuacion','$puntuacion','$fecha','$foto')";
$resultado = $mysqli->query($query);		
if($resultado==0){
echo "Error al acceder a la base de datos de usuario.<br>";	
}else{ 
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Bienvenido',
            text: 'Inicia sesión para empezar a jugar',
            type: 'success'
        }, function() {
            window.location = 'Iniciar_sesion.php';
        });
    }, 100);
</script>";		
          }
?>

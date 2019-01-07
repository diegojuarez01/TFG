<html>
    <script src='js/sweetalert.min.js'></script>
<?php 
    include ('head.php');
    /* Obtenemos variable*/
    $_SESSION['tipousuario'];
//Para que solo se pueda acceder por el formulario
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contacto.php');
} 	
include "conectar.php";
$usuario=$_POST["usuario"];
$asunto=$_POST["name"];
$mensaje=$_POST["message"];
$estado="en_espera";
$estado_admin="abierto";
$query = "select * from soporte where usuario='$usuario' AND asunto='$asunto'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "$usuario no tienen ningun soporte asignado con $asunto.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$mensaje=$fila["mensaje"];
$asunto=$fila["asunto"];
$contador++;
}
//Si el usuario no tiene ningun soporte  con el mismo asunto
if($contador==1){
    $query = "insert into soporte (asunto,mensaje,usuario,estado,estado_admin) values ('$asunto','$mensaje','$usuario','$estado','$estado_admin')";
    $resultado = $mysqli->query($query);
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Soporte creado',
            text: 'Nuestros administradores contestaran lo antes posible',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 300);
</script>"; 
}else{
  echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Cambia el asunto',
            text: 'Soporte ya abierto',
            type: 'warning'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 300);
</script>";  
}
}

?>
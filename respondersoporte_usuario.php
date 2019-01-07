<html>
    <script src='js/sweetalert.min.js'></script>
        <?php 
                include_once 'head.php';
                include_once 'conectar.php';
//Para que solo se pueda acceder por el formulario
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
} 
$numsoporte=$_POST["numsoporte"];	
$respuesta1=$_POST["respuesta1"];
$estado= 'en_espera';
$estado_admin= 'abierto';
// Update con la respuesta del admin.
$query = "INSERT INTO mensajes_soporte (mensaje,num_soporte) values ('$respuesta1','$numsoporte')";
$resultado = $mysqli->query($query); 
if($resultado==0){
echo "Error al responder al soporte.<br>";
}else{
$query = "UPDATE soporte set estado='$estado',estado_admin='$estado_admin' where num_soporte='$numsoporte'";
$resultado = $mysqli->query($query);
    
  echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: '!Hecho!',
            text: 'Nuestros administradores contestaran lo antes posible',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";    
}
?>	

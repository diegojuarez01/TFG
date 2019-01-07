<html>
    <script src='js/sweetalert.min.js'></script>
<?php 
    include_once 'head.php';
    include "conectar.php";
    //Para que solo se pueda acceder por el formulario
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: perfilusuario.php');
    }          
$idpeticion=$_POST["idpeticion"];
$nombre = $_POST["nombre"];
$usuario = $_SESSION['nombre'];

$query = "DELETE from peticiones_de_amistad where id_peticion_amistad='$idpeticion'";
$resultado = $mysqli->query($query);
    if($resultado==0){
        echo " <h4>Error.</h4><br>";
    }else{
             echo "<script type='text/javascript'>
          setTimeout(function() {
                 swal({
                     title: 'Peticion rechazada',
                     text: '',
                     type: 'success'
                 }, function() {
                     window.location = 'perfilusuario.php';
                 });
             }, 100);
         </script>";
}               

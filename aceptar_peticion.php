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

$query = "select * from peticiones_de_amistad where id_peticion_amistad='$idpeticion'";
$resultado = $mysqli->query($query);
    if($resultado==0){
        echo " <h4>Error.</h4><br>";
    }else{
        while($fila=$resultado->fetch_assoc()){
            //Creamos la amistad
        $query = "INSERT INTO amistades (amigo1,amigo2) values ('$usuario','$nombre')";
        $resultado = $mysqli->query($query);
             if($resultado==0){
        echo " <h4>Error.</h4><br>";
            }else{
                //Borramos la peticion_de_amistad y mostramos mensaje
                     $query = "DELETE FROM peticiones_de_amistad where id_peticion_amistad='$idpeticion'";
                     $resultado = $mysqli->query($query);
                           if($resultado==0){
                            echo " <h4>Error.</h4><br>";
                           }else{
                   echo "<script type='text/javascript'>
          setTimeout(function() {
                 swal({
                     title: 'Amigo añadido',
                     text: '',
                     type: 'success'
                 }, function() {
                     window.location = 'perfilusuario.php';
                 });
             }, 100);
         </script>";
                }
            }
            }
        }               
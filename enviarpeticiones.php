<html>
    <script src='js/sweetalert.min.js'></script>
<?php 
    include_once 'head.php';
    include "conectar.php";
    //Para que solo se pueda acceder por el formulario
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: perfilusuario.php');
    }          
$peticion=$_POST["nombre"];
$usuario = $_SESSION['nombre'];


$query = "select * from amistades where amigo1='$peticion' AND amigo2='$usuario' OR (amigo1='$usuario' AND amigo2='$peticion')";
$resultado = $mysqli->query($query);
if($resultado==0){
        echo " <h4>Error1.</h4><br>";
    }else{
        $check=2;
        while($fila=$resultado->fetch_assoc()){
            $check++;
        }
        if($check==2){
            $query = "select * from usuarios where usuario='$peticion' AND usuario != '$usuario'";
$resultado = $mysqli->query($query);
    if($resultado==0){
        echo " <h4>Error1.</h4><br>";
    }else{
        $comprobarusuario=5;
        while($fila=$resultado->fetch_assoc()){
            $comprobarusuario++;
             //Si existe una peticion de amistad ya enviada dara error
            $query = "select * from peticiones_de_amistad where amigo_peticion='$peticion' AND amigo_envio='$usuario' OR (amigo_peticion='$usuario' AND amigo_envio='$peticion')";
            $resultado = $mysqli->query($query);
              $contador=1; 
               if($resultado==0){
                 echo " <h4>Error2.</h4><br>";
                 }else{
              
                while($fila=$resultado->fetch_assoc()){
                    $contador=2;
                }     
                 }               
               if($contador==2){
                   //Error peticion ya estaba enviada.
                            echo "<script type='text/javascript'>
          setTimeout(function() {
                 swal({
                     title: 'Peticion pendiente',
                     text: 'La peticion ya habia sido enviada anteriormente',
                     type: 'error'
                 }, function() {
                     window.location = 'perfilusuario.php';
                 });
             }, 300);
         </script>";	
                   return;
               }else{    
        $query = "INSERT INTO peticiones_de_amistad (amigo_envio,amigo_peticion) values ('$usuario','$peticion')";
        $resultado = $mysqli->query($query);	
                         echo "<script type='text/javascript'>
          setTimeout(function() {
                 swal({
                     title: 'Peticion enviada',
                     text: 'Peticion enviada correctamente',
                     type: 'success'
                 }, function() {
                     window.location = 'perfilusuario.php';
                 });
             }, 300);
         </script>";
                                  return;
               } 
                }
       
    }          
        }else{
                             echo "<script type='text/javascript'>
          setTimeout(function() {
                 swal({
                     title: 'El amigo ya esta en tu lista',
                     text: '',
                     type: 'error'
                 }, function() {
                     window.location = 'perfilusuario.php';
                 });
             }, 100);
         </script>";	
            
        }
        
        if($comprobarusuario==5 && $peticion == $usuario){
                             echo "<script type='text/javascript'>
          setTimeout(function() {
                 swal({
                     title: 'No te puedes enviar solicitud a ti mismo',
                     text: '',
                     type: 'error'
                 }, function() {
                     window.location = 'perfilusuario.php';
                 });
             }, 300);
         </script>";
        }elseif($comprobarusuario==5 && $peticion != $usuario){
                                  echo "<script type='text/javascript'>
          setTimeout(function() {
                 swal({
                     title: 'Ese usuario no existe',
                     text: '',
                     type: 'error'
                 }, function() {
                     window.location = 'perfilusuario.php';
                 });
             }, 300);
         </script>"; 
        }
        }


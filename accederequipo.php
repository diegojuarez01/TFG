<html>
   <script src='js/sweetalert.min.js'></script>
<?php 
    include 'head.php';
/* Obtenemos variable*/
    $_SESSION['tipousuario'];		
    include "conectar.php";
    
    //Para que solo se pueda acceder por el formulario
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: Iniciar_sesion.php');
    } 
$nombre=$_POST["nombre"];
$nuevojugador=$_POST["jugador1"];
$contrasenia=$_POST["contrasenia"];
if($nombre==''){
		echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Error',
            text: 'Debe de introducir nombre de equipo',
            type: 'warning'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";
}elseif ($contrasenia==''){
    		echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Error',
            text: 'Debe de introducir la contraseña',
            type: 'warning'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";
}else{  
$query = "select * from equipo where nombre='$nombre'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo " <h4>Error al acceder al equipo en la Base de Datos.</h4><br>";
}else{
while($fila=$resultado->fetch_assoc()){
$jugador1=$fila["jugador1"]; 
$jugador2=$fila["jugador2"]; 
$jugador3=$fila["jugador3"]; 
$jugador4=$fila["jugador4"]; 
$jugador5=$fila["jugador5"]; 
$jugador6=$fila["jugador6"]; 
$cifrada=$fila["contrasenia"];
}
}
//Comprobamos la contraseña introducida con la clave cifrada.
if (password_verify ($contrasenia,$cifrada)){
    if($jugador1==''){
	echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Equipo invalido',
            text: 'El equipo no existe o password incorrecta',
            type: 'warning'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";	
}else if($jugador2==''){
$query = "update equipo set jugador2='$nuevojugador' where nombre='$nombre'";
$resultado = $mysqli->query($query);    
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Enhorabuena',
            text: 'Entraste a $nombre',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";
}else if($jugador3==''){
$query = "update equipo set jugador3='$nuevojugador' where nombre='$nombre'";
$resultado = $mysqli->query($query);    
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Enhorabuena',
            text: 'Entraste a $nombre',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";
}else if($jugador4==''){
$query = "update equipo set jugador4='$nuevojugador' where nombre='$nombre'";
$resultado = $mysqli->query($query);    
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Enhorabuena',
            text: 'Entraste a $nombre',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";
}else if($jugador5==''){
$query = "update equipo set jugador5='$nuevojugador', completo='1' where nombre='$nombre'";
$resultado = $mysqli->query($query);    
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Enhorabuena',
            text: 'Entraste a $nombre',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";
}else if($jugador6==''){
$query = "update equipo set jugador6='$nuevojugador' where nombre='$nombre'";
$resultado = $mysqli->query($query);    
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Enhorabuena',
            text: 'Entraste a $nombre',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";
}else{
	echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Equipo completo',
            text: 'Uno de los miembros debera abandonar',
            type: 'warning'
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
            title: 'Error',
            text: 'Contraseña incorrecta',
            type: 'warning'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";   
}
}


?>
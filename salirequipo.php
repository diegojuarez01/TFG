<html>
   <script src='js/sweetalert.min.js'></script>
<?php
    include 'head.php';
//Para que solo se pueda acceder por el formulario
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: perfilusuario.php');
} 
include "conectar.php"; 
$usuario=$_POST["usuario"];
$numequipo=$_POST["numequipo"];
$query = "select * from equipo where num_equipo='$numequipo'";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "<center><br>Error al eliminar al usuario del equipo</center></br>";
}else{
while($fila=$resultado->fetch_assoc()){
$jugador1=$fila["jugador1"]; 
$jugador2=$fila["jugador2"]; 
$jugador3=$fila["jugador3"]; 
$jugador4=$fila["jugador4"]; 
$jugador5=$fila["jugador5"]; 
$jugador6=$fila["jugador6"]; 	
}if($jugador1==$usuario){
    	echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Error',
            text: 'El lider no puede abandonar el equipo',
            type: 'warning'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";		
}
else if($jugador2==$usuario){
    if($jugador6==''){
$query = "update equipo set jugador2='$jugador3',jugador3='$jugador4',jugador4='$jugador5',jugador5='$jugador6',jugador6='',completo='0' where num_equipo='$numequipo'";        
    $resultado = $mysqli->query($query);
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: '!Hecho!',
            text: 'Ha abandonado el equipo',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";

    }else{
$query = "update equipo set jugador2='$jugador3',jugador3='$jugador4',jugador4='$jugador5',jugador5='$jugador6',jugador6='' where num_equipo='$numequipo'";
$resultado = $mysqli->query($query);
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: '!Hecho!',
            text: 'Ha abandonado el equipo',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";
    }
}
else if($jugador3==$usuario){
        if($jugador6==''){
$query = "update equipo set jugador3='$jugador4',jugador4='$jugador5',jugador5='$jugador6',jugador6='',completo='0' where num_equipo='$numequipo'";        
    $resultado = $mysqli->query($query);
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: '!Hecho!',
            text: 'Ha abandonado el equipo',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";

    }else{
$query = "update equipo set jugador3='$jugador4',jugador4='$jugador5',jugador5='$jugador6',jugador6='' where num_equipo='$numequipo'";
$resultado = $mysqli->query($query);
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: '!Hecho!',
            text: 'Ha abandonado el equipo',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";
    }
}
else if($jugador4==$usuario){
            if($jugador6==''){
$query = "update equipo set jugador4='$jugador5',jugador5='$jugador6',jugador6='',completo='0' where num_equipo='$numequipo'";        
    $resultado = $mysqli->query($query);
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: '!Hecho!',
            text: 'Ha abandonado el equipo',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";

    }else{
$query = "update equipo set jugador4='$jugador5',jugador5='$jugador6',jugador6='' where num_equipo='$numequipo'";
$resultado = $mysqli->query($query);
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: '!Hecho!',
            text: 'Ha abandonado el equipo',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";
    }
}
else if($jugador5==$usuario){
               if($jugador6==''){
$query = "update equipo set jugador5='$jugador6',jugador6='',completo='0' where num_equipo='$numequipo'";        
    $resultado = $mysqli->query($query);
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: '!Hecho!',
            text: 'Ha abandonado el equipo',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";

    }else{
$query = "update equipo set jugador5='$jugador6',jugador6='' where num_equipo='$numequipo'";
$resultado = $mysqli->query($query);
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: '!Hecho!',
            text: 'Ha abandonado el equipo',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";
    }
}
else if($jugador6==$usuario){
$query = "update equipo set jugador6='' where num_equipo='$numequipo'";
$resultado = $mysqli->query($query);
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: '!Hecho!',
            text: 'Ha abandonado el equipo',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";
}
}
?>				
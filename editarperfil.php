<?php 
//Para que solo se pueda acceder por el formulario
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: perfilusuario.php');
} 
include "conectar.php";                  
$dni=$_POST["dni"];
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$direccion=$_POST["direccion"];
$cp=$_POST["cp"];
$poblacion=$_POST["poblacion"];
$provincia=$_POST["provincia"];
$telefono=$_POST["telefono"];
$email=$_POST["email"];
$usuario=$_POST["usuario"];
$contrasenia=$_POST["contrasenia"];
$foto = $_FILES['foto']['name'];
$ruta = $_FILES['foto']['tmp_name'];
$destino = 'Imagenes/Usuarios/'.$foto;
copy($ruta,$destino);

if($contrasenia == ''){
if (is_uploaded_file($_FILES['foto']['tmp_name'])){
    $query = "update usuarios set dni='$dni',nombre='$nombre',apellidos='$apellidos',direccion='$direccion',cp='$cp',poblacion='$poblacion',provincia='$provincia',telefono='$telefono',email='$email',fotografia='$destino' where usuario='$usuario'";
    $resultado = $mysqli->query($query);
if($resultado==0){
echo " <h4>Error al modificar el usuario en la Base de Datos.</h4><br>";
}else{
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Perfil Editado',
            text: 'Su perfil se edito correctamente',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";	
}
}else{
    $query = "update usuarios set dni='$dni', nombre='$nombre', apellidos='$apellidos', direccion='$direccion', cp='$cp',poblacion='$poblacion',provincia='$provincia',telefono='$telefono',email='$email' where usuario='$usuario'";
    $resultado = $mysqli->query($query);
if($resultado==0){
echo " <h4>Error al modificar el usuario en la Base de Datos.</h4><br>";
}else{
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Perfil Editado',
            text: 'Su perfil se edito correctamente',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";	
}
}
}else{       
$contrasenia = password_hash($contrasenia,PASSWORD_DEFAULT);
if (is_uploaded_file($_FILES['foto']['tmp_name'])){
    $query = "update usuarios set dni='$dni',nombre='$nombre',apellidos='$apellidos',direccion='$direccion',cp='$cp',poblacion='$poblacion',provincia='$provincia',telefono='$telefono',email='$email',contrasenia='$contrasenia',fotografia='$destino' where usuario='$usuario'";
    $resultado = $mysqli->query($query);
if($resultado==0){
echo " <h4>Error al modificar el usuario en la Base de Datos.</h4><br>";
}else{
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Perfil Editado',
            text: 'Su perfil se edito correctamente',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";
}
}else{
    $query = "update usuarios set dni='$dni', nombre='$nombre', apellidos='$apellidos',contrasenia='$contrasenia', direccion='$direccion', cp='$cp',poblacion='$poblacion',provincia='$provincia',telefono='$telefono',email='$email' where usuario='$usuario'";
    $resultado = $mysqli->query($query);
if($resultado==0){
echo " <h4>Error al modificar el usuario en la Base de Datos.</h4><br>";
}else{
echo "<script type='text/javascript'>
 setTimeout(function() {
        swal({
            title: 'Perfil Editado',
            text: 'Su perfil se edito correctamente',
            type: 'success'
        }, function() {
            window.location = 'perfilusuario.php';
        });
    }, 100);
</script>";	
}
}
}
?>
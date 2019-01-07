<?php
class ValidadorInicio{
    
    private $aviso_inicio;
    private $aviso_cierre;
            
    private $usuario;
    private $clave;

    private $error_usuario;
    private $error_clave1;
    

    private $usuariocomprobacion;
    private $passwordcomprobacion;
    
    public function __Construct($usuario,$clave)  {
       
        $this -> aviso_inicio ="<br><div class='alert alert-danger' role='alert'>";
        $this -> aviso_cierre ="</div>";

             $this -> usuario ="";
              $this -> clave = "";
             
                  $this -> error_usuario= $this -> ValidarUsuario($usuario,$clave);        
    }
    
    private function variable_vacia($variable){
        if(isset($variable) && !empty($variable)){
            return true;    
        }else{
            return false;
        }
    }    
   
      private function ValidarUsuario($usuario,$clave1){
        if(!$this -> variable_vacia($usuario)){
            return "Debes escribir un nombre de usuario.";
        }else{
            $this -> usuario = $usuario;
        }
error_reporting(0);
session_start();
include 'conectar.php';
//Esta linea de codigo nos servira para parar la inyeccion de codigo. como podria ser ('or '1'='1 ).
$clave1 = $mysqli->real_escape_string($clave1);
//Hacemos select en la tabla empleados para los usuarios para obtener la contraseña cifrada
$query = "SELECT * FROM usuarios WHERE usuario='$usuario'";
$resultado = $mysqli->query($query);
$cifrada = NULL;
if($resultado==NULL){
echo "Error al acceder a la base de datos";
}else{
while($fila=$resultado->fetch_assoc()){
$cifrada=$fila["contrasenia"];
}
}
//Comprobamos la contraseña introducida con la clave cifrada.
if (password_verify ($clave1,$cifrada)){
$tipo=null;
$empleado=0;
//Hacemos select en la tabla empleados para los usuarios con el usuario y password introducidos.
$query = "SELECT * FROM usuarios WHERE usuario='$usuario'";
$resultado = $mysqli->query($query);
if($resultado==NULL){
echo "Error al acceder a la base de datos";
}else{
while($fila=$resultado->fetch_assoc()){
//Si encuentra algun usuario con ese nombre de usuario y password guardamos el tipo de usuario	
$tipo=$fila["tipo"];
$nombre=$fila["usuario"]; 
//dependiendo del tipo de usuario que sea se crearan unas variables u otras 
//Iniciamos la session y creamos variables para administrador
$_SESSION['tipousuario']=$tipo;
$_SESSION['nombre']=$nombre;
//Cambiamos el estado de usuario a conectado (activo=1)
    $query = "UPDATE usuarios SET activo = 1 WHERE usuario='$usuario'";
    $resultado = $mysqli->query($query);
echo "<script language='javascript'>window.location='index.php'</script>";
return "";
}if ($tipo==null){
session_destroy();
return 'Contraseña incorrecta.   <a href='.'recuperarpassword.php'.'>   Recuperar contraseña</a>';
}
}
}else{
return 'Contraseña incorrecta.  <a href='.'recuperarpassword.php'.'>   Recuperar contraseña</a>';	
}   
}
        public function ObtenerUsuario(){
            return $this -> usuario;
        }
          public function ObtenerClave1(){
            return $this -> clave1;
        } 
         public function ObtenerErrorUsuario(){
            return $this -> error_usuario;
        }
         public function ObtenerErrorClave1(){
            return $this -> error_clave1;
        }
        
        public function MostrarErrorUsuario(){
            if($this -> error_usuario !== ""){
                echo $this -> aviso_inicio.$this -> error_usuario . $this -> aviso_cierre;
            }
        }      
       
        //Si no hay ningun error en el formulario.
        public function InicioValido(){
                if($this ->$this->error_usuario === ""){
                            return true;
                        }else{         
                            return false;
                        }     
        }
}
?>


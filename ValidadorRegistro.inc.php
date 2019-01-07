<?php
class ValidadorRegistro{
    
    private $aviso_inicio;
    private $aviso_cierre;
            
    private $nombre;
    private $apellidos;
    private $usuario;
    private $email;
    private $clave;
    
    private $error_nombre;
    private $error_apellidos;
    private $error_usuario;
    private $error_email;
    private $error_clave1;
    private $error_clave2;
    
    private $emailcomprobacion;
    private $usuariocomprobacion;
    
    public function __Construct($nombre,$apellidos,$usuario,$email,$clave1,$clave2)  {
       
        $this -> aviso_inicio ="<br><div class='alert alert-danger' role='alert'>";
        $this -> aviso_cierre ="</div>";

        $this -> nombre ="";
          $this -> apellidos ="";
            $this -> email ="";
             $this -> usuario ="";
              $this -> clave = "";
              
             $this -> error_nombre = $this -> ValidarNombre($nombre);
               $this -> error_apellidos= $this -> ValidarApellidos($apellidos);
                $this -> error_email = $this -> ValidarEmail($email);
                  $this -> error_usuario= $this -> ValidarUsuario($usuario);
                   $this -> error_clave1 = $this -> ValidarPassword1($clave1);
                     $this -> error_clave2 = $this -> ValidarPassword2($clave1,$clave2); 
                     if($this -> error_clave1 === "" && $this -> error_clave2 === ""){
                         $this -> clave = $clave1;
                     }
    }
    
    private function variable_vacia($variable){
        if(isset($variable) && !empty($variable)){
            return true;    
        }else{
            return false;
        }
    }    
    private function ValidarNombre($nombre){
          
        if(!$this -> variable_vacia($nombre)){
            return "Debes escribir tu nombre.";
        }else{
            $this -> nombre = $nombre;
        }
     return "";
    }
    
       private function ValidarApellidos($apellidos){
        if(!$this -> variable_vacia($apellidos)){
            return "Debes escribir tus apellidos.";
        }else{
            $this -> apellidos = $apellidos;
        }
        return "";
    }
    
      private function ValidarUsuario($usuario){
        if(!$this -> variable_vacia($usuario)){
            return "Debes escribir un nombre de usuario.";
        }else{
            $this -> usuario = $usuario;
        }
        error_reporting(0);
        session_start();
        include 'conectar.php';  
        $usuariocomprobacion='';
        if(strlen($usuario) > 15){
            return "La clave debe ser menor de 16 caracteres";
        }
        //Comprobamos que el usuario no esta repetido en la bd
        $query = "SELECT * FROM usuarios WHERE usuario='$usuario'";
        $resultado = $mysqli->query($query);
        {
        //Si no hay ningun usuario con el mismo nombre de usuario se hara un insert a la bd con los datos obtenidos del formulario
        if($resultado==0){
        print "Error al acceder a la base de datos de usuario.<br>";	
        }else{ 
        while($fila=$resultado->fetch_assoc()){
        $usuariocomprobacion=$fila["usuario"]; 
        }if($usuariocomprobacion==''){
              return "";
        }else{
            return "Usuario en uso, utilice otro nombre de usuario ";
          }
          } 
        }
    }
    
    private function ValidarEmail($email){
        if(!$this -> variable_vacia($email)){
            return "Debes escribir un email.";
        }else{
            $this -> email = $email;
        }      
        include 'conectar.php';  
        $emailcomprobacion='';
        //Comprobamos que el usuario no esta repetido en la bd
        $query = "select * from usuarios where email='$email'";
        $resultado = $mysqli->query($query);
        {
        //Si no hay ningun usuario con el mismo nombre de usuario se hara un insert a la bd con los datos obtenidos del formulario
        if($resultado==0){
        print "Error al acceder a la base de datos de email.<br>";	
        }else{ 
        while($fila=$resultado->fetch_assoc()){
        $emailcomprobacion=$fila["email"]; 
        }if($emailcomprobacion==''){
              return "";
        }else{
            return "Email en uso, utilice otro email";
          }
          }  
        }
        }
    
        private function ValidarPassword1($clave1){
        if(!$this -> variable_vacia($clave1)){
            return "Debes escribir una contraseña.";
        }else{
            $this -> $clave1 = $clave1;
        }if(strlen($clave1) < 8){
            return "La clave debe ser mayor de 8 caracteres";
        }
        return "";
        }
        
        private function ValidarPassword2($clave1,$clave2){
        if(!$this -> variable_vacia($clave2)){
            return "Debes rellenar la contraseña.";
        }else{
            $this -> $clave2 = $clave2;
        }if($clave1 !== $clave2){
            return "Las contraseñas deben coincidir";
        }
        return "";
        }
        
        public function ObtenerNombre(){
            return $this -> nombre;
        }
        public function ObtenerEmail(){
            return $this -> email;
        }
        public function ObtenerUsuario(){
            return $this -> usuario;
        } 
        public function ObtenerApellidos(){
            return $this -> apellidos;
        }
          public function ObtenerClave(){
            return $this -> clave;
        }
        public function ObtenerErrorNombre(){
            return $this -> error_nombre;
        }
         public function ObtenerErrorApellidos(){
            return $this -> error_apellidos;
        }
         public function ObtenerErrorUsuario(){
            return $this -> error_usuario;
        }
         public function ObtenerErrorEmail(){
            return $this -> error_email;
        }
         public function ObtenerErrorClave1(){
            return $this -> error_clave1;
        }
         public function ObtenerErrorClave2(){
            return $this -> error_clave2;
        }
        
        public function MostrarNombre() {
            if($this-> nombre !== ""){
                echo 'value="'.$this ->nombre.'"';
            }       
        }
         public function MostrarApellidos() {
            if($this-> apellidos !== ""){
                echo 'value="'.$this ->apellidos.'"';
            }       
        }
         public function MostrarEmail() {
            if($this-> email !== ""){
                echo 'value="'.$this ->email.'"';
            }       
        }
         public function MostrarUsuario() {
            if($this-> usuario !== ""){
                echo 'value="'.$this ->usuario.'"';
            }       
        }
        public function MostrarErrorNombre(){
            if($this -> error_nombre !== ""){
                echo $this -> aviso_inicio.$this -> error_nombre . $this -> aviso_cierre;
            }
        }
        public function MostrarErrorApellidos(){
            if($this -> error_apellidos !== ""){
                echo $this -> aviso_inicio.$this -> error_apellidos . $this -> aviso_cierre;
            }
        }
        public function MostrarErrorEmail(){
            if($this -> error_email !== ""){
                echo $this -> aviso_inicio.$this -> error_email . $this -> aviso_cierre;
            }
        }
        public function MostrarErrorUsuario(){
            if($this -> error_usuario !== ""){
                echo $this -> aviso_inicio.$this -> error_usuario . $this -> aviso_cierre;
            }
        }
        public function MostrarErrorPassword1(){
            if($this -> error_clave1 !== ""){
                echo $this -> aviso_inicio.$this -> error_clave1 . $this -> aviso_cierre;
            }
        }
        public function MostrarErrorPassword2(){
            if($this -> error_clave2 !== ""){
                echo $this -> aviso_inicio.$this -> error_clave2 . $this -> aviso_cierre;
            }
        }
        //Si no hay ningun error en el formulario.
        public function RegistroValido(){
                if($this -> error_nombre === "" && 
                        $this -> error_email === "" && 
                        $this->error_apellidos === "" &&
                        $this->error_usuario === "" &&
                        $this -> error_clave1 === "" &&
                        $this-> error_clave2 === ""){
                            return true;
                        }else{
                            return false;
                        }     
        }
}
?>

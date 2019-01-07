<?php 

class Usuario {
    
   private $id_usuario;
   private $nombre;
   private $apellidos;
   private $poblacion;
   private $provincia;
   private $telefono;
   private $dni;
   private $direccion;
   private $cp;
   private $tipo;
   private $email;
   private $fotografia;
   private $usuario;
   private $contrasenia;
   private $puntuacion;
   private $fecha_registro;
   private $activo;
   
   public function __construct($id,$nombre,$apellidos,$email,$usuario,$contrasenia,$fecha_registro,$activo,$puntuacion,$tipo){
       $this -> id = $id;
       $this -> nombre = $nombre;
       $this -> apellidos = $apellidos;
       $this -> email = $email;
       $this-> usuario = $usuario;
       $this -> contrasenia = $contrasenia;
       $this -> puntuacion = $puntuacion;
       $this -> fecha_registro = $fecha_registro;
       $this -> activo = $activo;
   }
   
   public function obtener_id(){
       return $this ->id;
   }
    public function obtener_nombre(){
       return $this ->nombre;
   }
    public function obtener_apellidos(){
       return $this ->apellidos;
   }
    public function obtener_email(){
       return $this ->email;
   }
    public function obtener_usuario(){
       return $this ->usuario;
   }
    public function obtener_contrasenia(){
       return $this ->contrasenia;
   }
    public function obtener_puntuacion(){
       return $this ->puntuacion;
   }
    public function obtener_fecha_registro(){
       return $this ->fecha_registro;
   }
    public function obtener_activo(){
       return $this ->activo;
   }
    public function cambiar_nombre(){
       return $this ->nombre = $nombre;
   }
    public function cambiar_apellidos(){
       return $this ->apellidos = $apellidos;
   }
    public function cambiar_email(){
       return $this ->email = $email;
   }
   public function cambiar_contrasenia(){
       return $this ->contrasenia = $contrasenia;
   }
    public function cambiar_puntuacion(){
       return $this ->puntuacion = $puntuacion;
   }
       public function cambiar_activo(){
       return $this ->activo = $activo;
   }
}

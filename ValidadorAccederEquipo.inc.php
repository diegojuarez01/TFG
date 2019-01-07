<?php
class ValidadorAccederEquipo{
    
    private $aviso_inicio;
    private $aviso_cierre;
            
    private $nombre;
    private $clave;

    private $error_nombre;
    private $error_clave1;
    

    private $nombrecomprobacion;
    private $passwordcomprobacion;
    
    public function __Construct($nombre,$clave)  {
       
        $this -> aviso_inicio ="<br><div class='alert alert-danger' role='alert'>";
        $this -> aviso_cierre ="</div>";

             $this -> nombre ="";
              $this -> clave = "";
                    $this -> error_clave1 = $this -> ValidarClave($clave1);
                        $this -> error_usuario= $this -> ValidarEquipo($nombre,$clave);        
    }
    
    private function variable_vacia($variable){
        if(isset($variable) && !empty($variable)){
            return true;    
        }else{
            return false;
        }
    }    
    
     private function ValidadorClave($clave1){
        if(!$this -> variable_vacia($clave1)){
            return "Debes escribir una contraseña.";
        }else{
            $this -> clave1 = $clave1;
        }
     }
     
      private function ValidarEquipo($nombre,$clave1){
        if(!$this -> variable_vacia($nombre)){
            return "Debes escribir un nombre de equipo.";
        }     
        else{
            $this -> nombre = $nombre;
        } 
}

        public function Obtenernombre(){
            return $this -> nombre;
        }
          public function ObtenerClave1(){
            return $this -> clave1;
        } 
         public function ObtenerErrornombre(){
            return $this -> error_nombre;
        }
         public function ObtenerErrorClave1(){
            return $this -> error_clave1;
        }
        
        public function MostrarErrornombre(){
            if($this -> error_nombre !== ""){
                echo $this -> aviso_inicio.$this -> error_nombre . $this -> aviso_cierre;
            }
        }      
         public function MostrarErrorclave1(){
            if($this -> error_clave1 !== ""){
                echo $this -> aviso_inicio.$this -> error_clave1 . $this -> aviso_cierre;
            }
        } 
        //Si no hay ningun error en el formulario.
        public function AccederEquipoValido(){
                if($this ->$this->error_nombre === "" && 
                        $this -> error_clave1 === ""){
                            return true;
                        }else{         
                            return false;
                        }     
        }
}
?>


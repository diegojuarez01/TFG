<?php
class ValidadorEditarPerfil{
    
    private $aviso_inicio;
    private $aviso_cierre;    
    private $clave;
    private $error_clave1;
        
    public function __Construct($clave1)  {
       
        $this -> aviso_inicio ="<br><div class='alert alert-danger' role='alert'>";
        $this -> aviso_cierre ="</div>";

              $this -> clave = "";

                   $this -> error_clave1 = $this -> ValidarPassword1($clave1);
    }
    
    private function variable_vacia($variable){
        if(isset($variable) && !empty($variable)){
            return true;    
        }else{
            return false;
        }
    }    
  
        private function ValidarPassword1($clave1){
        if(!$this -> variable_vacia($clave1)){
            return "";
        }else{
            $this -> $clave1 = $clave1;
        }if(strlen($clave1) < 8){
            return "La clave debe ser mayor de 8 caracteres";
        }
        return "";
        }
           
         public function ObtenerErrorClave1(){
            return $this -> error_clave1;
        }
      
        public function MostrarErrorPassword1(){
            if($this -> error_clave1 !== ""){
                echo $this -> aviso_inicio.$this -> error_clave1 . $this -> aviso_cierre;
            }
        }
       
        //Si no hay ningun error en el formulario.
        public function EditarPerfilValido(){
                if($this -> error_clave1 === ""){
                            return true;
                        }else{
                            return false;
                        }     
        }
}
?>


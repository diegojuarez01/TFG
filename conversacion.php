<?php 
                include_once 'conectar.php';
                $user = $_POST['usuario'];
                $message = $_POST['mensaje'];
                $query = "select id_conversacion from conversacion order by id_conversacion  desc limit 1";
                 $resultado = $mysqli->query($query);
                    while($data = mysqli_fetch_assoc($resultado)){
                        $maximo = $data['id_conversacion'];
                  }
                if($maximo>100){
                 $minimo= $maximo - 60;
                }
                $minimo= 0;
                $query = "select usuario,mensaje,fecha,tipo from conversacion order by id_conversacion asc LIMIT $minimo,$maximo";
                $resultado = $mysqli->query($query);
                
               while($data = mysqli_fetch_assoc($resultado)){
                   if($data['tipo'] == 'Administrador'){
                   echo '<p style="color:white";>'.'<b style="color:C6C5C4">'.$data['fecha'].'</b>'.' '.'<b style="color:red">'.'ADMIN '.$data['usuario'].'</b>: '.$data['mensaje'].'</p>';
                   }else{
                   
                   echo '<p style="color:white";>'.'<b style="color:C6C5C4">'.$data['fecha'].'</b>'.' '.'<b style="color:deepskyblue">'.$data['usuario'].'</b>: '.$data['mensaje'].'</p>';
                   }
                   }
               
                ?>	

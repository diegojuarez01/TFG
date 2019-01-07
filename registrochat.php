<?php 
                include_once 'conectar.php';
                $user = $_POST['usuario'];
                $message = $_POST['mensaje'];
                $fecha=date("H:i:s");          
                $query = "select tipo from usuarios where usuario='$user'";
                $resultado = $mysqli->query($query); 
                while($data = mysqli_fetch_assoc($resultado)){
                     $tipo = $data['tipo'];
                }
                $query = "INSERT INTO conversacion (usuario,mensaje,fecha,tipo) values ('$user','$message','$fecha','$tipo')";
                $resultado = $mysqli->query($query); 
                ?>			
	</body>
</html>


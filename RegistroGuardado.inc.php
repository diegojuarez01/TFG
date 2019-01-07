 <?php
 if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: Iniciar_Sesion.php');
    } 
?>
<div class="form-group">
    <label for="user_login">Nombre:</label>
    <input type="text" name="nombre" id="nombre" class="form-control" <?php $validador -> MostrarNombre()?>  required="required" placeholder="Introduzca su nombre"/>
<?php 
$validador -> MostrarErrorNombre();
?>
</div>
<div class="form-group">
    <label for="user_login">Apellidos:</label>
    <input type="text" name="apellidos" id="apellidos" class="form-control" size="32" <?php $validador -> MostrarApellidos()?>   required="required" placeholder="Introduzca sus apellidos"/>
<?php 
$validador -> MostrarErrorApellidos();
?>
</div>
<div class="form-group">
    <label for="user_login">E-mail:</label>
    <input type="email" name="email" id="email" class="form-control" <?php $validador -> MostrarEmail()?>  required="required" placeholder="Introduzca un email valido"/>
<?php 
$validador -> MostrarErrorEmail();
?>
</div>
<div class="form-group">
    <label for="user_pass">Nombre de usuario:</label>
    <input type="text" name="usuario" id="usuario"  class="form-control" <?php $validador -> MostrarUsuario()?>  required="required" placeholder="Introduzca un nombre de usuario"/>
<?php 
$validador -> MostrarErrorUsuario();
?>
</div>
<div class="form-group">
    <label for="user_pass">Contraseña:</label>
    <input type="password" name="password" id="password" class="form-control" value="" placeholder="Contraseña con 8 caracteres minimo" required="required"/>
<?php 
$validador -> MostrarErrorPassword1();
?>
</div>
<div class="form-group">
    <label for="user_pass">Repita la contraseña:</label>
    <input type="password" name="password2" id="password2" class="form-control" value=""  required="required"placeholder="Repita la contraseña" />
<?php 
$validador -> MostrarErrorPassword2();
?>
</div>
<br>
<button type="submit" id="submit" name="enviar" value="Registrarse" class="btn-default">Registrarse</button>

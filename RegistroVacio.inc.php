<div class="form-group">
    <label for="user_login">Nombre:</label>
    <input type="text" name="nombre" id="nombre" class="form-control"  value=""  required="required" placeholder="Introduzca su nombre"/>
</div>
<div class="form-group">
    <label for="user_login">Apellidos:</label>
    <input type="text" name="apellidos" id="apellidos" class="form-control" size="32" value=""  required="required" placeholder="Introduzca sus apellidos"/>
</div>
<div class="form-group">
    <label for="user_login">E-mail:</label>
    <input type="email" name="email" id="email" class="form-control" value="" required="required" placeholder="Introduzca un email valido"/>
</div>
<div class="form-group">
    <label for="user_pass">Nombre de usuario:</label>
    <input type="text" name="usuario" id="usuario"  class="form-control" value="" required="required" placeholder="Introduzca un nombre de usuario"/>
</div>
<div class="form-group">
    <label for="user_pass">Contraseña:</label>
    <input type="password" name="password" id="password" class="form-control" value="" placeholder="Contraseña con 8 caracteres minimo" required="required"/>
</div>
<div class="form-group">
    <label for="user_pass">Repita la contraseña:</label>
    <input type="password" name="password2" id="password2" class="form-control" value=""  required="required"placeholder="Repita la contraseña" />
</div>
<br>
<button type="submit" id="submit" name="enviar" value="Registrarse" class="btn-default">Registrarse</button>
                   </form>
                        </div>
                    </div>
                </div>
            </div>
   
 <?php 
 include_once 'footer.php';?>
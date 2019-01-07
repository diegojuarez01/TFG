<!DOCTYPE html>
<html xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
<html>
    <script src='js/sweetalert.min.js'></script>

	<?php
	include_once 'conectar.php'; 	
	include ('head.php');
         $usuarioregistrado = $_SESSION['nombre'];
          if(empty($_SESSION['invitado']) && empty($_SESSION['nombre'])){
         if($usuarioregistrado==''){
             $random = rand(1, 1000);
             $usuarioregistrado= 'invitado'.$random;
             $_SESSION['invitado']=$usuarioregistrado;
         }
          }elseif(empty($_SESSION['nombre'])){
              $usuarioregistrado=$_SESSION['invitado'];
          }else{
              $usuarioregistrado = $_SESSION['nombre'];
          }
	?>
    <body>
        <?php
	include 'menunavegacional.php';
	?>
        
    <div class="container   ">
        <div class="jumbotron">
          <h1>ÚLTIMAS NOVEDADES</h1>  
          <br>
           </div>
    </div>

        <div class="container">
            <div class="row">     
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-body">
<!-- Slideshow-->
<div class="slideshow-container">
  <div class="mySlides">
    <div class="numbertext">1 / 3</div>
    <img src="Imagenes/Equipos/revenge.jpg" alt='Equipo revenge' style="width:100%">
    <div class="text">Bienvenida a revenge</div>
  </div>
  <div class="mySlides">
    <div class="numbertext">2 / 3</div>
    <img src="Imagenes/Equipos/dragons.jpg" alt='Equipo dragons' style="width:100%">
    <div class="text">Bienvenida a dragons</div>
  </div>
  <div class="mySlides">
    <div class="numbertext">3 / 3</div>
    <img src="Imagenes/Equipos/spartan.jpg" alt='Equipo spartan' style="width:100%">
    <div class="text">Bienvenida a Spartans</div>
  </div>
  <!-- Siguiente 10095 y atras 10094-->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
                    <script> 
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
 
}
        </script>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                 Chat global
                            </h3>
                        </div>
                        <div class="panel-body">
                                  <section  style="padding: 5%;">			        
				<div class="row">
					<form id="formChat" name='formChat'>
						<div class="form-group">							
							<div class="row">
								<div class="col-md-12" >
									<div id="conversacion" style="
                                                                             height:300px;background-color:#063971;color:white; padding: 12px;  border-radius: 5px; overflow-x: hidden;">		
									</div>
								</div>
							</div>
                                                      <input type="hidden" class="form-control" id="usuario" name="usuario" value="<?php echo $usuarioregistrado ?>">
						</div>
						<div class="form-group">				
                                                    <textarea autofocus id="mensaje" name="mensaje" placeholder="Introduzca mensaje"  class="form-control" rows="1" style="overflow:hidden;"></textarea>
                                                </div>
						<button type = 'submit' id="enviar" class="btn-default-perfil" style='width: 40%;'>Enviar</button>
					</form>
				</div>
			</section>	
                        </div>
                    </div>
                </div>         
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                 Últimos jugadores
                            </h3>
                        </div>
                        <div class="panel-body">
                                  <form method="post" name="nuevosusuarios" action=""> 
                            <table id="ultimosusuarios" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nuevos usuarios</th>                                            
                                                </tr>
                                            </thead>
                                            <tbody data-link="row" class="rowlink">  
                                                <?php 	
//Colocamos a los equipos con mayor puntuacion primero
$query = "Select * from usuarios ORDER BY fecha_registro DESC LIMIT 10";
$resultado = $mysqli->query($query);
if($resultado==0){
echo "Error al acceder a la base de datos de clientes.<br>";
}else{
$contador=1; 
while($fila=$resultado->fetch_assoc()){
$usuario=$fila["usuario"];
if($contador%2==0){ 
echo "
<tr>
    <td><a href=perfiljugadoravanzado.php?nombre=$usuario></a>$usuario</td>
</tr>";
}else{ 
echo " 
<tr>
    <td><a href=perfiljugadoravanzado.php?nombre=$usuario></a>$usuario</td> 
</tr>";
}
$contador=$contador+1;
}
}
?>
                                                </tbody>   
                    </table>
                                  </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

 <?php 
 include ('footer.php');
 ?>
     <script src='js/jquery.min.js'></script>    
    <script src='js/bootstrap.min.js'></script>
            <!--Para enviarnos a la pagina indicada al pulsar en un elemento de la table-->
        <script> 
            $(document).ready(function() {              
        $('#ultimosusuarios tr').click(function() {
            var href = $(this).find("a").attr("href");
            if(href) {
                window.location = href;
            }
        });
    });
        </script>
        <script>
		 var registrarMensaje = function(){
                            $('#enviar').on('click',function(e){
                              e.preventDefault();
                                 var datos = $('#formChat').serialize();
                                    $.ajax({
                                        type:"POST",
                                        url:"registrochat.php",
                                        data: datos
                                    }).done(function(info){  
                                        //Limpiamos mensaje
                                        $('#mensaje').val("");
                                        var altura = $('#conversacion').prop('scrollHeight');
                                        $('#conversacion').scrollTop(altura);
                                             document.getElementById("mensaje").focus();
                                    }) 
                            });
                        }
			$(document).on("ready", function(){				
				registrarMensaje();                  
                                $.ajaxSetup({'cache':false});
                                setInterval('CargarMensaje()',500);
                                });
                         var text = 1
                 var CargarMensaje = function(){
                    
                        $.ajax({
                            type:"POST",
                            url:"conversacion.php",
                        }).done(function(info){                        
    //Cargamos los datos obtenidos en conversacion.php en la id= conversacion                        
    $('#conversacion').html(info);
    $('#conversacion p:last-child').css({
        "padding-bottom":"20px" 
    });
    if(text==1){
var altura = $('#conversacion').prop('scrollHeight');
 $('#conversacion').scrollTop(altura);
 text++;
    }else{  
    }
                                    }); 
                        }                  
    </script>     
    </body>
</html>


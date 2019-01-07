<?php
	error_reporting(0);
        function menupordefecto()
        {
    echo ("<nav class='navbar navbar-default'>
                <div class='container'><div class='navbar-header'>
                <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
                <span class='sr-only'>Toggle navigation</span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                </button>          
                </div>  
                <div id='navbar' class='navbar-collapse collapse'>         
                <ul class='nav navbar-nav'>
                <li class='active'><a href='index.php'><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Home</a></li>
                <li><a href='Stream.php'><span class='icon-tv '></span>Stream</a></li>"); 
        }
        
function menuusuario(){
    echo("       
         <li><a href='perfilusuario.php'><span class='icon-user '></span>Mi perfil</a></li>
                  <li class='dropdown'>
                  <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span class='icon-play '></span>Jugar<span class='caret'></span></a>
                  <ul class='dropdown-menu'>
                  <li class='dropdown-header'>LIGAS</li>
                  <li role='separator' class='divider'></li>
                  <li role='separator' class='divider'></li>
                  <li class='dropdown-header'>Partidos individuales</li>
                  <li role='separator' class='divider'></li>
                  <li role='separator' class='divider'></li>
                  <li><a href='jugar1v1.php'>LeagueOfLegends 1v1</a></li> 
                   <li role='separator' class='divider'></li>
                  <li><a href='jugar1v1cs.php'>Counter-Strike 1v1</a></li>
                  </ul></li>
		   "); 
}

function menuadmin(){
     echo("     <li><a href='perfilusuario.php'>Mi perfil</a></li> 
                   <li class='dropdown'>
                  <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span class='icon-play '></span>Jugar<span class='caret'></span></a>
                  <ul class='dropdown-menu'>
                  <li class='dropdown-header'>LIGAS</li>
                  <li role='separator' class='divider'></li>
                  <li role='separator' class='divider'></li>
                  <li class='dropdown-header'>Partidos individuales</li>
                  <li role='separator' class='divider'></li>
                  <li role='separator' class='divider'></li>
                  <li><a href='jugar1v1.php'>LeagueOfLegends 1v1</a></li> 
                   <li role='separator' class='divider'></li>
                  <li><a href='jugar1v1cs.php'>Counter-Strike 1v1</a></li>
                  </ul></li>
                <li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Administrador<span class='caret'></span></a>
                <ul class='dropdown-menu'>
                <li class='dropdown-header'>Menu administrador</li>
                    <li role='separator' class='divider'></li>
                  <li role='separator' class='divider'></li>
                <li><a href='gestionjugadores.php'>Gestionar jugadores</a></li>
                 <li role='separator' class='divider'></li>
                <li><a href='gestionsoportes.php'>Gestionar soportes</a></li> 
                 <li role='separator' class='divider'></li>
                <li><a href='gestionpartidos.php'>Gestionar partidos</a></li>                
                </ul></li>
                ");
}

function listadesplegablemenu(){
                 echo("<li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span class='icon-stats-bars'></span>Rankings<span class='caret'></span></a>
                <ul class='dropdown-menu'>
                <li class='dropdown-header'>League of legends</li>
                    <li role='separator' class='divider'></li>
                  <li role='separator' class='divider'></li>
                <li><a href=ranking_individual.php>Ranking individual</a></li>
                 <li role='separator' class='divider'></li>
                <li><a href=ranking_equipos.php>Ranking equipos</a></li>
                    <li role='separator' class='divider'></li>
                  <li role='separator' class='divider'></li>
                <li class='dropdown-header'>Counter strike</li>
                    <li role='separator' class='divider'></li>
                  <li role='separator' class='divider'></li>
                <li><a href=ranking_individualcs.php>Ranking individual</a></li>
                 <li role='separator' class='divider'></li>
                <li><a href=ranking_equiposcs.php>Ranking equipos</a></li>
                </ul></li></ul>
                ");
}   

function menulogindefecto(){
         echo ("<ul class='nav navbar-nav navbar-right'>
            <li><a href=registro.php>Registrarse</a></li>
            <li class='active'><a href='Iniciar_sesion.php'>Login<span class='sr-only'>(current)</span></a></li>
          </ul>
        </div>          
      </div>
    </nav>"); 
}

function menuloginusuarios(){
   echo ("<ul class='nav navbar-nav navbar-right'>
       <li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span class='icon-cog'></span> Ajustes<span class='caret'></span></a>
                <ul class='dropdown-menu'>
                <li><a href=cerrarsesion.php><span class='icon-exit'></span>Cerrar sesion</a></li>
                <li role='separator' class='divider'></li>
                <li><a href='contacto.php'>Abrir soporte</a></li>
                <li role='separator' class='divider'></li>
                <li><a href=perfilusuario.php>Mi perfil</a></li> 
                </ul></li>   </ul></ul>  
        </div>
      </div>
    </nav>  
       ");   
}
        //Si la variable de sesion que indica el tipo de usuario esta vacia se mostrara un menu para logearse
				if(empty($_SESSION['tipousuario'])){ 
                                    menupordefecto();
                                    listadesplegablemenu();
                                    menulogindefecto(); 
                                }   
	//Si la variable contiene algun valor habra que controlar los valores para Usuario y Administrador
				else{
				if ($_SESSION['tipousuario']=="Usuario"){
                                    menupordefecto();
                                    menuusuario();
                                    listadesplegablemenu();
                                    menuloginusuarios();
				}elseif ($_SESSION['tipousuario']=="Administrador"){
                                    menupordefecto();
                                    menuadmin();
                                    listadesplegablemenu();
                                    menuloginusuarios();
				}
                                }?>
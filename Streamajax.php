<html>
   <?php
	session_start();
	include "conectar.php";
	include_once 'head.php';
        	$num=$_GET["num"];
	?>
     <script>
        function MostrarRanking(num) {
            if (num == "") {
                document.getElementById("retrasmisiones").innerHTML = "";
                return;
            } else { 
                if (window.XMLHttpRequest) {   
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("retrasmisiones").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","streamajax.php?num=" + num,true);
                xmlhttp.send();
            }
            
        }
</script>
            
<?php
if($num == 1){  
?>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Stream League of legends en directo</h3>
                                </div>
                                <div class="panel-body" id="Informacion">
                                    <iframe src="http://player.twitch.tv/?channel=joven15" frameborder="0" scrolling="no" height="420" allowfullscreen="true" width="100%">
                                    </iframe>       	
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Interactua en directo con nosotros </h3>
                                </div>
                                <div class="panel-body" id="Informacion">
                                     <!-- chat-->  
        <iframe frameborder="0" 
        scrolling="no" 
        id="chat_embed" 
        src="https://www.twitch.tv/embed/joven15/chat" 
        height="620" 
        width="100%">
        </iframe>      	
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
<?php 
}elseif($num == 2){  
?>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Stream CounterStrike en directo</h3>
                                </div>
                                <div class="panel-body" id="Informacion">
                                     <iframe src="http://player.twitch.tv/?channel=joven15" frameborder="0" scrolling="no" height="420" allowfullscreen="true" width="100%">
                                    </iframe>     	
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Interactua en directo con nosotros </h3>
                                </div>
                                <div class="panel-body" id="Informacion">
                                     <!-- chat-->  
        <iframe frameborder="0" 
        scrolling="no" 
        id="chat_embed" 
        src="https://www.twitch.tv/embed/joven15/chat" 
        height="620" 
        width="100%">
        </iframe>      	
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
<?php 
}elseif($num == 3){  
?>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Stream Fornite en directo</h3>
                                </div>
                                <div class="panel-body" id="Informacion">
                                      <iframe src="http://player.twitch.tv/?channel=joven15" frameborder="0" scrolling="no" height="420" allowfullscreen="true" width="100%">
                                    </iframe>       	
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Interactua en directo con nosotros </h3>
                                </div>
                                <div class="panel-body" id="Informacion">
                                     <!-- chat-->  
        <iframe frameborder="0" 
        scrolling="no" 
        id="chat_embed" 
        src="https://www.twitch.tv/embed/joven15/chat" 
        height="620" 
        width="100%">
        </iframe>      	
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
<?php 
}elseif($num == 4){  
?>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Stream PlayerUnknow en directo</h3>
                                </div>
                                <div class="panel-body" id="Informacion">
                                      <iframe src="http://player.twitch.tv/?channel=joven15" frameborder="0" scrolling="no" height="420" allowfullscreen="true" width="100%">
                                    </iframe>        	
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Interactua en directo con nosotros </h3>
                                </div>
                                <div class="panel-body" id="Informacion">
                                     <!-- chat-->  
        <iframe frameborder="0" 
        scrolling="no" 
        id="chat_embed" 
        src="https://www.twitch.tv/embed/joven15/chat" 
        height="620" 
        width="100%">
        </iframe>      	
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
<?php 
}
?>

    <script src='js/jquery.min.js'></script>    
    <script src='js/bootstrap.min.js'></script>
    </body>

</html>




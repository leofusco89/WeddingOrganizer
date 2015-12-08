<?php
session_start();

if (isset($_SESSION["usuarioActual"])) 
{
  if ($_SESSION["usuarioActual"] == "admin") {
    header("Location: Administrador.php");
  }
  else
  {
    header("Location: Menu.php");  
  }
}
?>

<html>
  <head>
    <meta charset="UTF-8">
    <link href="img/favicon.ico" rel="icon"/>
    <title>Wedding Organizer</title>
	<link href="css/style.css" rel="stylesheet" type="text/css"/>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript">
        function login()
        {

        	var funcionAjax =$.ajax({url:"ValidarUsuario.php", type:"post",
        		data:{
        			usuario:$("#user").val(),
        			clave:$("#password").val()
        			}});


        	funcionAjax.done(function(resultado){
                switch(resultado) {
                  case "correcto":
                      window.location.href="Menu.php";
                      break;
                  case "administrador":
                      window.location.href="Administrador.php";
                      break;
                  default:
                    abrirPopup("Error", "Usuario o password incorrecto");
                }
		});

        }

        function abrirPopup(titulo, texto){
          var funcionAjax =$.ajax({
              url:"Popup.php", type:"post",
              data:{
                titulo:titulo,
                texto:texto
              }});


          funcionAjax.done(function(resultado){
            $("#popup").html(resultado);
        });
      }

        function cerrarPopup(){
            $("#popup").html("");
      }
    </script>
  </head>

  <body style="background-image: url(../img/bg.jpg);">
    <div class="Indexbody"></div>
		<div class="Indexgrad"></div>
		<div class="Indexheader">
			<div>Wedding<span>Organizer</span></div>
		</div>
		<br>

    <div id="popup">
    </div>

		<div class="Indexlogin">
				<input type="text" 	   id="user" placeholder="usuario" 	name="user" onkeydown="if (event.keyCode == 13) document.getElementById('login').click()"
          value="<?php 
            if (isset($_COOKIE["usuarioWedding"])) {
              echo $_COOKIE["usuarioWedding"];
            }?>"><br>
				<input type="password" id="password" placeholder="contraseña" name="password" onkeydown="if (event.keyCode == 13) document.getElementById('login').click()"><br>
				<input id="login" type="button"   value="Login" onclick="login()">
			<form action="Register.php">
				<input type="submit"   value="Register">
			</form>
		</div>
  </body>
</html>

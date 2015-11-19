<?php
session_start();
if (isset($_SESSION["usuarioActual"])) 
{
  $_SESSION=null; 
  session_destroy();
}
?>

<html >
  <head>
    <meta charset="UTF-8">
    <link href="img/favicon.ico" rel="icon"/>
    <title>Wedding Organizer - Register</title>
	   <link href="css/style.css" rel="stylesheet" type="text/css"/>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript">
    function register()
    { 
      if ($("#sexo").is(":checked"))
       {
        sexo = "Hombre";
       }
      else
       {
        sexo = "Mujer";
       }

      var funcionAjax = $.ajax
        (
           { url: "insertUsuario.php",
             type:"post",

             data:{ 
                    usuario:$("#usuario").val(),
                    nombre:$("#nombre").val(),
                    apellido:$("#apellido").val(),
                    sexo:sexo,
                    email:$("#email").val(),
                    pass:$("#pass").val(),
                    confPass:$("#confPass").val()
                  }      
           }
        );


      funcionAjax.done(function(resultado)
      {
        alert(resultado);
        if (resultado == "El usuario ha sido registrado") {
          window.location.href="index.php";
        };
      });
    }

  </script>    
  </head>

  <body background="img/bgpattern.jpg">  
      <div class="encabezado">
        <a href="logout.php" display="inline">
          <img src="img/logout.jpg"/>
        </a>
      </div>
      <br>
      <br>
      <div id="menuRegister">
        <form onsubmit="register();return false;">
          <h1>Complete los datos</h1>
          <br>
          <br>
          <p>Usuario   </p><input id="usuario"   type="text"     maxlength="12" required>
          <p>Nombre    </p><input id="nombre"   type="text"     maxlength="100" required  pattern="[A-Za-z\s]{1,}">
          <p>Apellido  </p><input id="apellido" type="text"     maxlength="100" required  pattern="[A-Za-z\s]{1,}">
          <p>Sexo      </p>
          <br>
          <label>
            <input type="radio" id="sexo" name="sexo" value="hombre" checked="checked">
            <img src="img/hombre.png">
          </label>
          <label>
            <input type="radio" name="sexo" value="mujer">
            <img src="img/mujer.png">
          </label><br><br>
          <p>E-mail    </p><input id="email"    type="text"     maxlength="100" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
          <p>Contraseña</p><input id="pass"     type="password" maxlength="16" required>
          <p>Confirmar Contraseña</p><input id="confPass" type="password" maxlength="16" required>
          <input type="submit" name="sumit" value="Registrar" /><input type="reset"/>
        </form>
      </div>
  </body>
</html>

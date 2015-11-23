<?php
session_start();
  
  include_once("class/Usuarios.php");
  include_once("class/Configuraciones.php");
  include_once("class/AccesoDatos.php");

if (!isset($_SESSION["usuarioActual"])
  OR $_SESSION["usuarioActual"] != "admin") 
{
  header("Location: index.php");
}
else{
  $usuario = Usuarios::TraerUnUsuario($_SESSION["usuarioActual"]);
};

  $configuracion = Configuraciones::TraerConfiguracion();

  //Traigo clima
  /*$datos = simplexml_load_file('http://weather.service.msn.com/data.aspx?src=vista&weadegreetype=C&culture=es-ES&wealocations=wc:ARBA0107');
  $fecha = $datos->weather->current['date'];
  $temperatura = $datos->weather->current['temperature']."°C";
  $clima = $datos->weather->current['skytext'];
*/
?>

<html >
  <head>
    <meta charset="UTF-8">
    <link href="img/favicon.ico" rel="icon"/>
    <title>Wedding Organizer - Administración</title>
	   <link href="css/style.css" rel="stylesheet" type="text/css"/>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript">
    </script>

<script type="text/javascript">
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>
  <script type="text/javascript">
    function actualizarConfiguracion()
    { 
      var funcionAjax = $.ajax
        (
           { url: "UpdateConfiguracion.php",
             type:"post",

             data:{ 
                    maxMesas:$("#maxMesas").val()
                  }      
           }
        );


      funcionAjax.done(function(resultado)
      {
         switch(resultado) {
           case "1":
               alert("Cantidad de mesas máximas no puede ser 0 o menos de 0");
               break;
           default:
             alert(resultado);
         }

      }
      );
    }

    function EliminarUsuario(usuario)
    { 
      var funcionAjax = $.ajax
        (
           { url: "EliminarUsuario.php",
             type:"post",

             data:{ 
                    usuario: usuario
                  }      
           }
        );


      funcionAjax.done(function(resultado)
      {
        alert("El usuario y sus dependencias fueron eliminadas");
        $("#menuUsuarios").html(resultado);

      }
      );
    }

  </script>    
  </head>

  <body background="img/bgpattern.jpg">  
      <div class="encabezado">
        <a href="Logout.php" display="inline">
          <img src="img/logout.jpg"/>
        </a>
        <h1 id="usuario">Usuario Administrador</h1>
<!--
        <h1 style="float: right;line-height: 20px;"><?php //echo $clima; ?></h1>
        <h1 style="float: right;line-height: 20px;"><?php //echo $temperatura; ?></h1>
        <h1 style="float: right;line-height: 20px;"><?php //echo $fecha; ?></h1>
-->
      </div>

      <br>
      <br>
      <div id="menuAdmin" style="width: 350px;">
        <form onsubmit="actualizarConfiguracion();return false;">
          <h1>Configuración:</h1>
          <br>
          <br>
          <p>Cantidad de mesas máximas por usuario:</p>
      <br>
      <br><input id="maxMesas" type="text" maxlength="2" required value="<?php echo $configuracion->cantMaxMesas;?>" onkeypress='validate(event)' style="text-align: center;">
          <input type="submit" value="Guardar" />
        </form>
      </div>


      <div id="menuUsuarios" style="width: 800px;">
      <h1>Administración de usuarios:</h1>
      <br>
      <br>
      <table id="tablaUsuarios">
        <tr>
          <td>Usuario</td>
          <td>Nombre</td>
          <td>Apellido</td>
          <td>Sexo</td>
          <td>Email</td>
          <td></td>
        </tr>
  
        <?php


  $usuarios = Usuarios::TraerTodosLosUsuarios();

          foreach ($usuarios as $unUsuario) {

            if ($unUsuario->usuario != "admin") {
              echo 
              "<tr>
                <td>".$unUsuario->usuario."</td>
                <td>".$unUsuario->nombre."</td>
                <td>".$unUsuario->apellido."</td>
                <td>".$unUsuario->sexo."</td>
                <td>".$unUsuario->email."</td>
                <td>
        <a onclick='EliminarUsuario(\"$unUsuario->usuario\")' display='inline'>
          <img src='img/eliminar.ico'/ style='cursor: pointer;'>
        </a></td>
               </tr>";
            }
          }
        ?>
      </table>
      </div>
  </body>
</html>

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
            abrirPopup("Error", "Cantidad de mesas máximas no puede ser 0 o menos que 0");
               break;
           default:
            abrirPopup("Operación existosa", resultado);
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
        window.location.href="Administrador.php";

      }
      );
    }
  </script>    
  
<script type="text/javascript">
         //si le pongo llaves es un objeto, es lo mismo que poner new object
      var datos = {};

      //aca se define una función igualada a datos. O sea que datos a partir de ahora empieza a ser la función. Y la funcion cuando se termina abajo se autoinvoca
      //Al crearse se invoca (con el cierre de llaves la estoy invocando)
      //Lo unico que se ve de datos es var url donde tiene urLocal y urlEsterna

      datos = (function(){

        var local = "http://weddingorganizer.tuars.com/ws/usuarios/";
        var externa = "http://weddingorganizer.tuars.com/ws/usuarios";

        //var local = "http://localhost:8080/WeddingOrganizer/ws/usuarios/";
        //var externa = "http://localhost:8080/WeddingOrganizer/ws/usuarios/";
        
        var url = {
          urlLocal: local,
          urlExterna: externa
        };

        return url;
      })();
  </script>
    <script type="text/javascript">

    function renderLista(data) {
      
      var lista = data == null ? [] : (data instanceof Array ? data : [data]);
      
      $('#tablaUsuarios tr:not(:first)').remove();
      
      $.each(lista, function(index, usuario) {
            if (usuario.usuario != "admin") {
              $('#tablaUsuarios').append("<tr><td>"+ usuario.usuario +
                             "</td><td>"+ usuario.nombre + 
                             "</td><td>"+ usuario.apellido +
                             "</td><td>"+ usuario.sexo+
                             "</td><td>"+ usuario.email +
                             "</td><td><a onclick='EliminarUsuario(\""+ usuario.usuario +"\")' display='inline'><img src='img/eliminar.ico'/ style='cursor: pointer;'> </a></td></tr>");              
            };

      });
    }
    function cargar(){
        $.ajax({
              type: "GET",
              url: datos.urlLocal,
              success: function(data, textStatus, jqXHR){
                  // console.log(data);
                  renderLista(data);
              },
              error: function(jqXHR, textStatus, errorThrown){
                  // console.log(errorThrown);
                abrirPopup("Error", "No se pudo modificar " + errorThrown);
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

<div id="popup">
</div>
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
        <tbody>   
        <?php
          echo "<script>";
          echo "cargar()";
          echo "</script>";  
        ?>
      </tbody> 
      </table>
      </div>
  </body>
</html>

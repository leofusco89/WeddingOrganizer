<?php
session_start();
include_once("class/AccesoDatos.php");
include_once("class/Usuarios.php");
include_once("class/Fiestas.php");
if (!isset($_SESSION["usuarioActual"])
  OR $_SESSION["usuarioActual"] == "admin") 
{
	header("Location: index.php");
}
else{
  $usuario = Usuarios::TraerUnUsuario($_SESSION["usuarioActual"]);
};


  //Traigo clima
/*
  $datos = simplexml_load_file('http://weather.service.msn.com/data.aspx?src=vista&weadegreetype=C&culture=es-ES&wealocations=wc:ARBA0107');
  $fecha = $datos->weather->current['date'];
  $temperatura = $datos->weather->current['temperature']."°C";
  $clima = $datos->weather->current['skytext'];
*/
?>


<html>
  <head>
    <meta charset="UTF-8">
    <link href="img/favicon.ico" rel="icon"/>
    <title>Wedding Organizer - Menú</title>
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script src="js/funcionesMapa.js"></script>
    <script src="js/geolocalizacionCommon.js"></script>
    <script src="js/moduloGeolocalizacion.js"></script>
<!--<script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
--> 
    <script src="js/exporting.js"></script>
    <script src="js/highcharts.js"></script>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
    
    <script type="text/javascript">


  var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()

      function LoadFiesta()
      { 
        var funcionAjax = $.ajax
          (
             { url: "CargarFiesta.php",
               type:"post",
             }
          );
  
        funcionAjax.done(function(resultado)
        {
          $("#menuMisFiestas").load(resultado);
        });
      }

      function registerFiesta(){
        var funcionAjax = $.ajax
          (

             { url: "InsertFiesta.php",
               type:"post",
               data:{
                fecha: $("#fecha").val(),
                provincia: $("#provincia").val(),
                localidad: $("#localidad").val(),
                calle: $("#calle").val(),
                numero: $("#numero").val(),
                invitacion: $("#invitacion").val()
               }
             }
          );
          
        funcionAjax.done(function(resultado)
        {
          $("#menuMisFiestas").load(resultado);
        });
      }
      function editarFiesta(){
        var funcionAjax = $.ajax
          (
             { url: "FormularioEditarFiesta.php",
               type:"post",
               data:{
                fecha: $("#fecha").val(),
                provincia: $("#provincia").val(),
                localidad: $("#localidad").val(),
                calle: $("#calle").val(),
                numero: $("#numero").val(),
                invitacion: $("#invitacion").val()
               }
             }
          );
          
        funcionAjax.done(function(resultado)
        {
          $("#menuMisFiestas").html(resultado);
        });
      }

      function UpdateFiesta(){
        var funcionAjax = $.ajax
          (
             { url: "UpdateFiesta.php",
               type:"post",
               data:{
                fecha: $("#fecha").val(),
                provincia: $("#provincia").val(),
                localidad: $("#localidad").val(),
                calle: $("#calle").val(),
                numero: $("#numero").val(),
                invitacion: $("#invitacion").val()
               }
             }
          );
          
        funcionAjax.done(function(resultado)
        {
          $("#menuMisFiestas").load(resultado);
        });
      }

      function AdministrarInvitados(){
        var funcionAjax = $.ajax
          (
             { url: "AdministrarInvitados.php",
               type:"post"
             }
             
          );
          
        funcionAjax.done(function(resultado)
        {
          $("#menuCasamiento").html(resultado);
          $("#menuMisFiestas").load("FormularioMesa.php");
        });
      }

      function BrindarDatosVerEnMapa(){
        var provincia = document.getElementById('provincia').value;
        var localidad = document.getElementById('localidad').value;
        var calle     = document.getElementById('calle').value;
        var numero    = document.getElementById('numero').value;
        var nombre    = document.getElementById('nombre').value;
        var apellido  = document.getElementById('apellido').value;

        if (provincia != "" && 
            localidad != "" && 
            calle     != "" && 
            numero    != "" && 
            nombre    != "" && 
            apellido  != ""){
        VerEnMapa(provincia, calle + " " + numero, localidad, "Fiesta de " + nombre + " " + apellido);
        }
        else
        {
          alert("Por favor, completar Provincia, Localidad, Calle y Número");
        };
      }

      function AgregarMesa(maxMesas){
        var funcionAjax = $.ajax
          (
             { url: "AgregarMesa.php",
               type:"post",
               data:{
                  maxMesas: maxMesas
               }
             }
             
          );
          
        funcionAjax.done(function(resultado)
        {
          switch(resultado) {
            case "1":
                alert("No se pueden añadir más de " + maxMesas + " mesas");
                break;
            case "2":
                alert("Debe guardar al menos una mesa para poder añadir una nueva");
                break;
            default:
                alert("Mesa añadida");
                $("#opcionesMesa").html(resultado);
          }
        });
      }

      function GuardarMesa(mesa){
        var As1 = document.getElementById('1As').checked;
        var As2 = document.getElementById('2As').checked;
        var As3 = document.getElementById('3As').checked;
        var As4 = document.getElementById('4As').checked;
        var As5 = document.getElementById('5As').checked;
        var As6 = document.getElementById('6As').checked;
        var As7 = document.getElementById('7As').checked;
        var As8 = document.getElementById('8As').checked;
        var As9 = document.getElementById('9As').checked;
        var As10 = document.getElementById('10As').checked;

        var funcionAjax = $.ajax
          (
             { url: "GuardarMesa.php",
               type:"post",
               data:{
                  mesa: mesa,
                  invitado1NA: $("#1NA").val(),
                  invitado2NA: $("#2NA").val(),
                  invitado3NA: $("#3NA").val(),
                  invitado4NA: $("#4NA").val(),
                  invitado5NA: $("#5NA").val(),
                  invitado6NA: $("#6NA").val(),
                  invitado7NA: $("#7NA").val(),
                  invitado8NA: $("#8NA").val(),
                  invitado9NA: $("#9NA").val(),
                  invitado10NA: $("#10NA").val(),
                  invitado1As: As1,
                  invitado2As: As2,
                  invitado3As: As3,
                  invitado4As: As4,
                  invitado5As: As5,
                  invitado6As: As6,
                  invitado7As: As7,
                  invitado8As: As8,
                  invitado9As: As9,
                  invitado10As: As10
               }
             }
             
          );
          
        funcionAjax.done(function(resultado)
        {
          switch(resultado) {
            case $("#1NA").val():
                alert("Invitado repetido: " + $("#1NA").val());
                break;
            case $("#2NA").val():
                alert("Invitado repetido: " + $("#2NA").val());
                break;
            case $("#3NA").val():
                alert("Invitado repetido: " + $("#3NA").val());
                break;
            case $("#4NA").val():
                alert("Invitado repetido: " + $("#4NA").val());
                break;
            case $("#5NA").val():
                alert("Invitado repetido: " + $("#5NA").val());
                break;
            case $("#6NA").val():
                alert("Invitado repetido: " + $("#6NA").val());
                break;
            case $("#7NA").val():
                alert("Invitado repetido: " + $("#7NA").val());
                break;
            case $("#8NA").val():
                alert("Invitado repetido: " + $("#8NA").val());
                break;
            case $("#9NA").val():
                alert("Invitado repetido: " + $("#9NA").val());
                break;
            case $("#10NA").val():
                alert("Invitado repetido: " + $("#10NA").val());
                break;
            default:
                alert(resultado);
          }
        });
      }

      function EliminarMesa(){
        var e = document.getElementById('mesa');
        var mesa = e.options[e.selectedIndex].value;
        var funcionAjax = $.ajax
          (
             { url: "EliminarMesa.php",
               type:"post",
               data:{
                mesa: mesa
               }
             }
          );
          
        funcionAjax.done(function(resultado)
        { 
          alert(resultado);
          if (resultado == "La mesa fue eliminada y el orden de mesas fue reestablecido") {
            $("#menuMisFiestas").load("FormularioMesa.php");
          };
        });
      }

      function TraerInvitadosMesa(){
        var e = document.getElementById('mesa');
        var mesa = e.options[e.selectedIndex].value;
        var funcionAjax = $.ajax
          (
             { url: "TraerInvitadosMesa.php",
               type:"post",
               data:{
                mesa: mesa
               }
             }
          );
          
        funcionAjax.done(function(resultado)
        {
          $("#tablaInvitados").html(resultado);
        });
      }
      

      function DescargarMesas(){
        var funcionAjax = $.ajax
          (
             { url: "TodosLosInvitados.php",
               type:"post"
             }
          );
          
        funcionAjax.done(function(resultado)
        {
          if (resultado == "1") {
            alert("Guardar al menos una mesa para poder descargar");
          } 
          else
          {
            $("#divInvisible").html(resultado);
            tableToExcel('tablaDescarga', 'Descarga');
          };
        });
      }

      function Grafico(){
        var funcionAjax = $.ajax
          (
             { url: "Grafico.php",
               type:"post"
             }
          );
          
        funcionAjax.done(function(resultado)
        {
          if (resultado == "1") {
            alert("Guardar al menos una mesa para poder mostrar estadísticas");
          } 
          else
          {
            $("#grafico").html(resultado);
          };
        });
      }
    </script>
    
  </head>

  <body onload="LoadFiesta()"> 
  	  <div class="encabezado">
        <a href="Menu.php" display="inline">
          <img src="img/menu.png"/>
        <a href="EditarUsuario.php" display="inline">
          <img src="img/configuration.jpg"/>
        </a>
        <a href="Logout.php" display="inline">
          <img src="img/logout.jpg"/>
        </a>
  	  	<h1 id="usuario"><?php 
        echo $_SESSION["usuarioActual"];?></h1>

        <img src="Fotos/<?php echo $usuario->foto;?>" style="margin-top: 5px; width: 50px; height: 50px; border: 2px solid #010; border-radius: 5px;"/>
<!--
        <h1 style="float: right;line-height: 20px;"><?php //echo $clima; ?></h1>
        <h1 style="float: right;line-height: 20px;"><?php //echo $temperatura; ?></h1>
        <h1 style="float: right;line-height: 20px;"><?php //echo $fecha; ?></h1>
-->
  	  </div>
      <div class="menuMenu">
        <form>
          <br>
          <p>Usuario   <input id="usuario" type="text" readonly maxlength="12"  
            value="<?php echo $usuario->usuario;?>" style="background-color: #FFE2EA;"></p>
          <p>Nombre    <input id="nombre"   type="text" readonly maxlength="100" 
            value="<?php echo $usuario->nombre;?>" style="background-color: #FFE2EA;"></p>
          <p>Apellido  <input id="apellido" type="text" readonly maxlength="100" 
            value="<?php echo $usuario->apellido;?>" style="background-color: #FFE2EA;"></p>
          <p>Sexo      <input id="sexo"     type="text" readonly maxlength="6" 
            value="<?php echo $usuario->sexo;?>" style="background-color: #FFE2EA;"></p>
          <p>E-mail    <input id="email"    type="text" readonly maxlength="100" 
            value="<?php echo $usuario->email;?>" style="background-color: #FFE2EA;"></p>
        </form>
      </div>

      <div id="menuCasamiento">
      </div>
      <div id="menuMisFiestas">
      </div>
      <div id="divInvisible" style="width: 310px; height: 400px; margin: 0 auto">
      </div>
  </body>
</html>

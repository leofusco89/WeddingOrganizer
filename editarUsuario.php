<?php
session_start();
  
  include_once("class/Usuarios.php");
  include_once("class/AccesoDatos.php");

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

<html >
  <head>
    <meta charset="UTF-8">
    <link href="img/favicon.ico" rel="icon"/>
    <title>Wedding Organizer - Perfil</title>
	   <link href="css/style.css" rel="stylesheet" type="text/css"/>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/funcionesAjax.js"></script>

  <script type="text/javascript">
    function actualizarUsuario()
    { 
      if ($("#sexo").is(":checked"))
       {
        sexo = "Hombre";
       }
      else
       {
        sexo = "Mujer";
       }

      var foto=$("#imagen").attr('src');  
      
      var files = $("#fichero").get(0).files;
      if (files[0] != null)
        {
          foto = files[0].name;
          var accionFoto = 'nueva';
          }
      else
          {
            foto = foto.replace("Fotos/", "");
            if (foto == "")
             {
              var accionFoto = 'noesta';    
             }
            else
             {
              var accionFoto = 'existe';
             }  
          }     
          

      var funcionAjax = $.ajax
        (
           { url: "UpdateUsuario.php",
             type:"post",

             data:{ 
                    nombre:$("#nombre").val(),
                    apellido:$("#apellido").val(),
                    sexo:sexo,
                    email:$("#email").val(),
                    foto:foto,
                    queHacerConLaFoto:accionFoto,
                    pass:$("#pass").val(),
                    nPass:$("#nPass").val(),
                    confNPass:$("#confNPass").val()
                  }      
           }
        );


      funcionAjax.done(function(resultado)
      {
          switch(resultado) {
            case "1":
              abrirPopup("Error", "Nueva Contraseña y Confirmar Nueva Contraseña no son iguales");
                break;
            case "2":
              abrirPopup("Error", "Contraseña actual no coincide con la contraseña del usuario");
                break;
            case "3":
                alert("Sus datos fueron actualizados");
                window.location.href="Menu.php";
                break;
            default:
              abrirPopup("", resultado);

        }
      }
      );
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
        <h1 style="float: right;line-height: 20px;"><?php //'echo $clima; ?></h1>
        <h1 style="float: right;line-height: 20px;"><?php //echo $temperatura; ?></h1>
        <h1 style="float: right;line-height: 20px;"><?php //echo $fecha; ?></h1>
-->
      </div>

      <br>
      <br>
<div id="popup">
</div>
      <div id="menuRegister" width="1100px">
        <form onsubmit="actualizarUsuario();return false;">
          <h1>Actualice sus datos:</h1>
          <br>
          <br>
          <table >
    <tbody>
      <tr>
       <td width="25%" style="vertical-align: baseline; padding-right: 10px;">
        <input type="submit" value="Guardar" /><input type="reset"/>
        </td>
       <td>
          <p>Nombre    </p><input id="nombre"   type="text"     maxlength="100" required  pattern="[A-Za-z\s]{1,}" value="<?php echo $usuario->nombre;?>" >
          <p>Apellido  </p><input id="apellido" type="text"     maxlength="100" required  pattern="[A-Za-z\s]{1,}" value="<?php echo $usuario->apellido;?>">
          <p>Sexo      </p>
          <br>
          <label>
            <input type="radio" id="sexo" name="sexo" value="hombre"<?php 
            if ($usuario->sexo == "Hombre") {
              echo 'checked';
            }?>>
            <img src="img/hombre.png">
          </label>
          <label>
            <input type="radio" name="sexo" value="mujer" <?php 
            if ($usuario->sexo == "Mujer") {
              echo 'checked';
            }?>>
            <img src="img/mujer.png">
          </label><br><br>
          <p>E-mail    </p><input id="email"    type="text"     maxlength="100" required value="<?php echo $usuario->email;?>"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
          <p>Foto de perfil</p><input type="file" name="foto"  id="fichero" onchange="cargarFoto()" autofocus="" />
          <img  src="Fotos/<?php echo $usuario->foto;?>" id="imagen" autofocus="" style="width: 250px; height: 250px; display: block;"/>
          <br>
          <p>Contraseña actual</p><input id="pass"     type="password" maxlength="16" required>
          <p>Nueva Contraseña</p><input id="nPass" type="password" maxlength="16">
          <p>Confirmar Nueva Contraseña</p><input id="confNPass" type="password" maxlength="16"></td>
      </tr>
    </tbody> 
  </table>
        </form>
      </div>
  </body>
</html>

<?php
  session_start();
  
  include_once("class/Usuarios.php");
  include_once("class/Mesas.php");
  include_once("class/Configuraciones.php");
  include_once("class/AccesoDatos.php");
  
  $mesas = new Mesas();
  $mesas = Mesas::TraerTodasMesasPorUsuario($_SESSION["usuarioActual"]);
  $num = count($mesas);
  $cantMaxMesas = $_POST["maxMesas"];

  if ($num >= $_POST["maxMesas"]) {
  	echo "1";
  	return;
  }
  elseif ($num == 0) 
  { 
  	echo "2";
  	return;
  }
  else
  {
  	echo "<p style='display: inline;padding: 11px;font-size: 20px;'>Mesa   
  	<select id='mesa' onChange='TraerInvitadosMesa()'>";
   	foreach ($mesas as $mesa) {
     echo "<option>".$mesa->mesa;
     $ultimaMesa = $mesa->mesa;
     }
    $ultimaMesa = $ultimaMesa + 1;
  	echo "<option>".$ultimaMesa;
  
  	echo "</select></p>
  
  <input type='button' value='Añadir' onclick='AgregarMesa(".$cantMaxMesas.")' style='margin-bottom: 5.5%;width: 30%;height: 50;line-height: 0px;'/><input type='button' value='Eliminar' onclick='EliminarMesa()' style='margin-bottom: 5.5%;width: 30%;height: 50;line-height: 0px;'/>";
  }

?>
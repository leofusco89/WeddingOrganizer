<?php
session_start();
  
  include_once("class/Configuraciones.php");
  include_once("class/AccesoDatos.php");

if ($_POST["maxMesas"] <= 0) {
	echo "1";
	return;
}

  Configuraciones::UpdateConfiguracion($_POST["maxMesas"]);
  echo "Configuración guardada";
 ?>
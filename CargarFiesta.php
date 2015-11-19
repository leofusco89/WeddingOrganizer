<?php 
session_start();

include_once("class/Fiestas.php");
include_once("class/AccesoDatos.php");

$fiesta = new Fiestas();
$fiesta = Fiestas::TraerUnaFiesta($_SESSION["usuarioActual"]);

if (isset($fiesta->fecha)) {
  echo "FiestaCargada.php";
}
else{
  echo "FormularioFiesta.php";
}

 ?>

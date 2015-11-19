<?php
session_start();
  
  include_once("class/Usuarios.php");
  include_once("class/AccesoDatos.php");

if ($_POST["nPass"] != $_POST["confNPass"]) {
	echo "1";
	return;
}
  
  $unUsuario = Usuarios::TraerUnUsuario($_SESSION["usuarioActual"]);

  if ($unUsuario->contrasenia != $_POST["pass"]) {
    echo "2";
    return;
  }

  $usuario = new Usuarios();
  $usuario->usuario  = $_SESSION["usuarioActual"];
  $usuario->nombre   = $_POST["nombre"];
  $usuario->apellido = $_POST["apellido"];
  $usuario->sexo     = $_POST["sexo"];
  $usuario->email    = $_POST["email"];

  if ($_POST["nPass"] != "") {
  	$usuario->contrasenia = $_POST["nPass"];
  }
  else{
  	$usuario->contrasenia = $_POST["pass"];	
  }

  $usuario->ModificarUsuarioParametros();
  echo "Sus datos fueron actualizados";
  return;
?>
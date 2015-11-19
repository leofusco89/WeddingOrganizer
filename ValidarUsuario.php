<?php 
session_start();
include_once("class/Usuarios.php");
include_once("class/AccesoDatos.php");

$usuario = Usuarios::ValidarUsuario($_POST['usuario'], $_POST['clave']);

if(isset($usuario->usuario))
{	
	setcookie("usuarioWedding", $usuario->usuario);
	$_SESSION['usuarioActual'] = $_POST['usuario'];
	if ($_SESSION['usuarioActual'] == "admin") {
		echo "administrador";
	}
	else{
		echo "correcto";
	}
	return;
}

?>
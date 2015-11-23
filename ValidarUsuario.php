<?php 
session_start();
include_once("class/Usuarios.php");
include_once("class/AccesoDatos.php");

$contrasenia = sha1($_POST['clave']);
$usuario = Usuarios::ValidarUsuario($_POST['usuario'], $contrasenia);

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
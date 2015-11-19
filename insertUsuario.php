<?php
	include_once("class/Usuarios.php");
	include_once("class/AccesoDatos.php");
	if ($_POST["pass"] != $_POST["confPass"]) {
		echo "Contraseña y Confirmar contraseña tienen valores diferentes";
		return;
	}
	else
	{	
		$usuario = new Usuarios();
		$usuario = Usuarios::TraerUnUsuario($_POST["usuario"]);
		if (isset($usuario->nombre)) 
		{
			echo "El nombre de usuario ya existe. Elija otro y vuelva a intentar";
			return;
		}

	}

	$insertUsuario = new Usuarios();
	$insertUsuario->usuario	   = $_POST["usuario"];
	$insertUsuario->nombre 	   = $_POST["nombre"];
	$insertUsuario->apellido   = $_POST["apellido"];
	$insertUsuario->sexo 	   = $_POST["sexo"];
	$insertUsuario->email 	   = $_POST["email"];
	$insertUsuario->contrasenia = $_POST["pass"];
	$insertUsuario = $insertUsuario->InsertarUsuario();
	echo "El usuario ha sido registrado";
	return;
?>
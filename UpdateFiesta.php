<?php
	session_start();
	include_once("class/Fiestas.php");
	include_once("class/AccesoDatos.php");

	$insertFiesta = new Fiestas();
	$insertFiesta->usuario	      = $_SESSION["usuarioActual"];
	$insertFiesta->fecha 	      = $_POST["fecha"];
	$insertFiesta->provincia 	  = $_POST["provincia"];
	$insertFiesta->localidad 	  = $_POST["localidad"];
	$insertFiesta->calle          = $_POST["calle"];
	$insertFiesta->numero 	  	  = $_POST["numero"];
	$insertFiesta->invitacion 	  = $_POST["invitacion"];
	$insertFiesta = $insertFiesta->ModificarFiestaParametros();
	echo "FiestaCargada.php";
	return;
?>
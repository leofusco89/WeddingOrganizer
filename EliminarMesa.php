<?php
  session_start();
  
  include_once("class/Usuarios.php");
  include_once("class/Mesas.php");
  include_once("class/AccesoDatos.php");


  $invitadosMesaElegida = Mesas::TraerInvitadosUnaMesa($_SESSION["usuarioActual"], $_POST["mesa"]);
  $cant = count($invitadosMesaElegida);
  if ($cant == 0) {
  	echo "Error: No puede eliminar una mesa que no fue guardada previamente";
  	return;
  }


  $mesasUsuario = Mesas::TraerTodasMesasPorUsuario($_SESSION["usuarioActual"]);
  $cant = count($mesasUsuario);
  if ($cant == 1 ) {
  	echo "Error: Usted solo tiene una sola mesa. No puede ser eliminada";
  	return;
  }

  $mesaElegida = new Mesas();
  $mesaElegida->usuario = $invitadosMesaElegida[0]->usuario;
  $mesaElegida->mesa    = $invitadosMesaElegida[0]->mesa;
  $mesaElegida->BorrarMesa();

  $invitadosUsuario = Mesas::TraerTodosInvitadosPorUsuario($_SESSION["usuarioActual"]);
  $mesasUsuario = Mesas::TraerTodasMesasPorUsuario($_SESSION["usuarioActual"]);

  //Borro todas las mesas
  foreach ($mesasUsuario as $mesaUsuario) {
    $mesaUsuario->usuario = $_SESSION["usuarioActual"];
  	$mesaUsuario->BorrarMesa();
  }

  //Vuelvo a subir todas las mesas (invitados) con ID Mesa ordenado
  $num = 0;
  foreach ($mesasUsuario as $mesaUsuario) {
  	$num = $num + 1;
  	foreach ($invitadosUsuario as $invitadoUsuario) {
  		if ($mesaUsuario->mesa == $invitadoUsuario->mesa) {
  			$invitadoUsuario->mesa = $num;
  			$invitadoUsuario->InsertarInvitado();
  		}
  	}
  }


   echo "La mesa fue eliminada y el orden de mesas fue reestablecido";
   return;

?>
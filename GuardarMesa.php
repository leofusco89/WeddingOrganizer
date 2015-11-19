<?php
  session_start();
  
  include_once("class/Usuarios.php");
  include_once("class/Mesas.php");
  include_once("class/Configuraciones.php");
  include_once("class/AccesoDatos.php");
  
  $mesa = new Mesas();
  $mesa->usuario = $_SESSION["usuarioActual"];
  $mesa->mesa    = $_POST["mesa"];
  $mesaBorrada = Mesas::TraerInvitadosUnaMesa($_SESSION["usuarioActual"], $_POST["mesa"]);
  $mesa->BorrarMesa();

  $invitado = new Mesas();
  if ($_POST["invitado1NA"] != "") {
    $invitado = Mesas::TraerInvitadoPorNombre($_SESSION["usuarioActual"], $_POST["invitado1NA"]);
    $cant = count($invitado);
    if ($cant > 0) {
      echo $_POST["invitado1NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
    elseif ( ($_POST["invitado1NA"] == $_POST["invitado2NA"]) 
          OR ($_POST["invitado1NA"] == $_POST["invitado3NA"]) 
          OR ($_POST["invitado1NA"] == $_POST["invitado4NA"]) 
          OR ($_POST["invitado1NA"] == $_POST["invitado5NA"]) 
          OR ($_POST["invitado1NA"] == $_POST["invitado6NA"]) 
          OR ($_POST["invitado1NA"] == $_POST["invitado7NA"]) 
          OR ($_POST["invitado1NA"] == $_POST["invitado8NA"]) 
          OR ($_POST["invitado1NA"] == $_POST["invitado9NA"])
          OR ($_POST["invitado1NA"] == $_POST["invitado10NA"]) )
    {
      echo $_POST["invitado1NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
  }

  if ($_POST["invitado2NA"] != "") {
    $invitado = Mesas::TraerInvitadoPorNombre($_SESSION["usuarioActual"], $_POST["invitado2NA"]);
    $cant = count($invitado);
    if ($cant > 0) {
      echo $_POST["invitado2NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
    elseif ( ($_POST["invitado2NA"] == $_POST["invitado3NA"]) 
          OR ($_POST["invitado2NA"] == $_POST["invitado4NA"]) 
          OR ($_POST["invitado2NA"] == $_POST["invitado5NA"]) 
          OR ($_POST["invitado2NA"] == $_POST["invitado6NA"]) 
          OR ($_POST["invitado2NA"] == $_POST["invitado7NA"]) 
          OR ($_POST["invitado2NA"] == $_POST["invitado8NA"]) 
          OR ($_POST["invitado2NA"] == $_POST["invitado9NA"])
          OR ($_POST["invitado2NA"] == $_POST["invitado10NA"]) )
    {
      echo $_POST["invitado2NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
  }

  if ($_POST["invitado3NA"] != "") {
    $invitado = Mesas::TraerInvitadoPorNombre($_SESSION["usuarioActual"], $_POST["invitado3NA"]);
    $cant = count($invitado);
    if ($cant > 0) {
      echo $_POST["invitado3NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
    elseif ( ($_POST["invitado3NA"] == $_POST["invitado4NA"]) 
          OR ($_POST["invitado3NA"] == $_POST["invitado5NA"]) 
          OR ($_POST["invitado3NA"] == $_POST["invitado6NA"]) 
          OR ($_POST["invitado3NA"] == $_POST["invitado7NA"]) 
          OR ($_POST["invitado3NA"] == $_POST["invitado8NA"]) 
          OR ($_POST["invitado3NA"] == $_POST["invitado9NA"])
          OR ($_POST["invitado3NA"] == $_POST["invitado10NA"]) )
    {
      echo $_POST["invitado3NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
  }

  if ($_POST["invitado4NA"] != "") {
    $invitado = Mesas::TraerInvitadoPorNombre($_SESSION["usuarioActual"], $_POST["invitado4NA"]);
    $cant = count($invitado);
    if ($cant > 0) {
      echo $_POST["invitado4NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
    elseif ( ($_POST["invitado4NA"] == $_POST["invitado5NA"]) 
          OR ($_POST["invitado4NA"] == $_POST["invitado6NA"]) 
          OR ($_POST["invitado4NA"] == $_POST["invitado7NA"]) 
          OR ($_POST["invitado4NA"] == $_POST["invitado8NA"]) 
          OR ($_POST["invitado4NA"] == $_POST["invitado9NA"])
          OR ($_POST["invitado4NA"] == $_POST["invitado10NA"]) )
    {
      echo $_POST["invitado4NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
  }

  if ($_POST["invitado5NA"] != "") {
    $invitado = Mesas::TraerInvitadoPorNombre($_SESSION["usuarioActual"], $_POST["invitado5NA"]);
    $cant = count($invitado);
    if ($cant > 0) {
      echo $_POST["invitado5NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
    elseif ( ($_POST["invitado5NA"] == $_POST["invitado6NA"]) 
          OR ($_POST["invitado5NA"] == $_POST["invitado7NA"]) 
          OR ($_POST["invitado5NA"] == $_POST["invitado8NA"]) 
          OR ($_POST["invitado5NA"] == $_POST["invitado9NA"])
          OR ($_POST["invitado5NA"] == $_POST["invitado10NA"]) )
    {
      echo $_POST["invitado5NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
  }

  if ($_POST["invitado6NA"] != "") {
    $invitado = Mesas::TraerInvitadoPorNombre($_SESSION["usuarioActual"], $_POST["invitado6NA"]);
    $cant = count($invitado);
    if ($cant > 0) {
      echo $_POST["invitado6NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
    elseif ( ($_POST["invitado6NA"] == $_POST["invitado7NA"]) 
          OR ($_POST["invitado6NA"] == $_POST["invitado8NA"]) 
          OR ($_POST["invitado6NA"] == $_POST["invitado9NA"])
          OR ($_POST["invitado6NA"] == $_POST["invitado10NA"]) )
    {
      echo $_POST["invitado6NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
  }

  if ($_POST["invitado7NA"] != "") {
    $invitado = Mesas::TraerInvitadoPorNombre($_SESSION["usuarioActual"], $_POST["invitado7NA"]);
    $cant = count($invitado);
    if ($cant > 0) {
      echo $_POST["invitado7NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
    elseif ( ($_POST["invitado7NA"] == $_POST["invitado8NA"]) 
          OR ($_POST["invitado7NA"] == $_POST["invitado9NA"])
          OR ($_POST["invitado7NA"] == $_POST["invitado10NA"]) )
    {
      echo $_POST["invitado7NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
  }

  if ($_POST["invitado8NA"] != "") {
    $invitado = Mesas::TraerInvitadoPorNombre($_SESSION["usuarioActual"], $_POST["invitado8NA"]);
    $cant = count($invitado);
    if ($cant > 0) {
      echo $_POST["invitado8NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return ;
    }
    elseif ( ($_POST["invitado8NA"] == $_POST["invitado9NA"])
          OR ($_POST["invitado8NA"] == $_POST["invitado10NA"]) )
    {
      echo $_POST["invitado8NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
  }

  if ($_POST["invitado9NA"] != "") {
    $invitado = Mesas::TraerInvitadoPorNombre($_SESSION["usuarioActual"], $_POST["invitado9NA"]);
    $cant = count($invitado);
    if ($cant > 0) {
      echo $_POST["invitado9NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
    elseif ( ($_POST["invitado9NA"] == $_POST["invitado10NA"]) )
    {
      echo $_POST["invitado9NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
  }

  if ($_POST["invitado10NA"] != "") {
    $invitado = Mesas::TraerInvitadoPorNombre($_SESSION["usuarioActual"], $_POST["invitado10NA"]);
    $cant = count($invitado);
    if ($cant > 0) {
      echo $_POST["invitado10NA"];
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
    }
  }





  //Que no haya checked sin nombre de invitado:
  
  if (   ( $_POST["invitado1As"] == "true"  && $_POST["invitado1NA"] == "") 
      OR ( $_POST["invitado2As"] == "true"  && $_POST["invitado2NA"] == "")
      OR ( $_POST["invitado3As"] == "true"  && $_POST["invitado3NA"] == "")
      OR ( $_POST["invitado4As"] == "true"  && $_POST["invitado4NA"] == "")
      OR ( $_POST["invitado5As"] == "true"  && $_POST["invitado5NA"] == "")
      OR ( $_POST["invitado6As"] == "true"  && $_POST["invitado6NA"] == "")
      OR ( $_POST["invitado7As"] == "true"  && $_POST["invitado7NA"] == "")
      OR ( $_POST["invitado8As"] == "true"  && $_POST["invitado8NA"] == "")
      OR ( $_POST["invitado9As"] == "true"  && $_POST["invitado9NA"] == "")
      OR ( $_POST["invitado10As"] == "true" && $_POST["invitado10NA"] == "") ){
      echo "Error: Se confirmó asistencia para invitado sin nombre";
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
  }


//No guardar mesas vacías
  
  if (   $_POST["invitado1NA"] == "" 
     AND $_POST["invitado2NA"] == ""
     AND $_POST["invitado3NA"] == ""
     AND $_POST["invitado4NA"] == ""
     AND $_POST["invitado5NA"] == ""
     AND $_POST["invitado6NA"] == ""
     AND $_POST["invitado7NA"] == ""
     AND $_POST["invitado8NA"] == ""
     AND $_POST["invitado9NA"] == ""
     AND $_POST["invitado10NA"] == "" ){
      echo "Error: Indicar al menos un invitado para guardar mesa";
      foreach ($mesaBorrada as $unaMesa) {
        $unaMesa->InsertarInvitado();
      }
      return;
  }






  $invitado = new Mesas();
  $invitado->usuario = $_SESSION["usuarioActual"];
  $invitado->mesa    = $_POST["mesa"];

  $invitado->invitado       = 1;  
  $invitado->nombreApellido = $_POST["invitado1NA"];
  if ($_POST["invitado1As"] == "true") {
    $invitado->asistencia = "Si";
  }
  else
  {
    $invitado->asistencia = "No";
  }
  $invitado->InsertarInvitado();

  $invitado->invitado       = 2;  
  $invitado->nombreApellido = $_POST["invitado2NA"];
  if ($_POST["invitado2As"] == "true") {
    $invitado->asistencia = "Si";
  }
  else
  {
    $invitado->asistencia = "No";
  }
  $invitado->InsertarInvitado();

  $invitado->invitado       = 3;  
  $invitado->nombreApellido = $_POST["invitado3NA"];
  if ($_POST["invitado3As"] == "true") {
    $invitado->asistencia = "Si";
  }
  else
  {
    $invitado->asistencia = "No";
  }
  $invitado->InsertarInvitado();

  $invitado->invitado       = 4;  
  $invitado->nombreApellido = $_POST["invitado4NA"];
  if ($_POST["invitado4As"] == "true") {
    $invitado->asistencia = "Si";
  }
  else
  {
    $invitado->asistencia = "No";
  }
  $invitado->InsertarInvitado();

  $invitado->invitado       = 5;  
  $invitado->nombreApellido = $_POST["invitado5NA"];
  if ($_POST["invitado5As"] == "true") {
    $invitado->asistencia = "Si";
  }
  else
  {
    $invitado->asistencia = "No";
  }
  $invitado->InsertarInvitado();

  $invitado->invitado       = 6;  
  $invitado->nombreApellido = $_POST["invitado6NA"];
  if ($_POST["invitado6As"] == "true") {
    $invitado->asistencia = "Si";
  }
  else
  {
    $invitado->asistencia = "No";
  }
  $invitado->InsertarInvitado();

  $invitado->invitado       = 7;  
  $invitado->nombreApellido = $_POST["invitado7NA"];
  if ($_POST["invitado7As"] == "true") {
    $invitado->asistencia = "Si";
  }
  else
  {
    $invitado->asistencia = "No";
  }
  $invitado->InsertarInvitado();

  $invitado->invitado       = 8;  
  $invitado->nombreApellido = $_POST["invitado8NA"];
  if ($_POST["invitado8As"] == "true") {
    $invitado->asistencia = "Si";
  }
  else
  {
    $invitado->asistencia = "No";
  }
  $invitado->InsertarInvitado();

  $invitado->invitado       = 9;  
  $invitado->nombreApellido = $_POST["invitado9NA"];
  if ($_POST["invitado9As"] == "true") {
    $invitado->asistencia = "Si";
  }
  else
  {
    $invitado->asistencia = "No";
  }
  $invitado->InsertarInvitado();

  $invitado->invitado       = 10;  
  $invitado->nombreApellido = $_POST["invitado10NA"];
  if ($_POST["invitado10As"] == "true") {
    $invitado->asistencia = "Si";
  }
  else
  {
    $invitado->asistencia = "No";
  }
  $invitado->InsertarInvitado();

  echo "La mesa fue guardada";
  return;

?>
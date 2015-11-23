<?php
session_start();
  
  include_once("class/Usuarios.php");
  include_once("class/AccesoDatos.php");

if ($_POST["nPass"] != $_POST["confNPass"]) {
	echo "1";
	return;
}
  
  $unUsuario = Usuarios::TraerUnUsuario($_SESSION["usuarioActual"]);
  //Encripto contraseña
  $contrasenia = sha1($_POST["pass"]);

  if ($unUsuario->contrasenia != $contrasenia) {
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
    $contrasenia = sha1($_POST["nPass"]);
  	$usuario->contrasenia = $contrasenia;
  }
  else{
  	$usuario->contrasenia = $contrasenia;	
  }



  $foto = $_POST['foto'];
  $queHagoConLaFoto = $_POST['queHacerConLaFoto']; 
  
  if ($queHagoConLaFoto == 'nueva')
    {        
    $ruta=getcwd();  //ruta directorio actual
      $rutaDestino=$ruta."/Fotos/";
    //$NOMEXT=explode(".", $_FILES['fichero0']['name']);
    $NOMEXT=explode(".", $foto);
      $EXT=end($NOMEXT);
      $nomarch=$NOMEXT[0].".".$EXT;  // no olvidar el "." separador de nombre/ext
      $rutaActual = $ruta."/FotosTemp/".$nomarch;

      $nuevoNombreDeFoto = str_replace(' ', '', $usuario->usuario);
      $nuevoNombreDeFoto = $nuevoNombreDeFoto.".".$EXT;
      $nuevoNombreDeFoto = str_replace(' ', '', $nuevoNombreDeFoto); 

      rename ($ruta."/FotosTemp/".$nomarch,$ruta."/FotosTemp/".$nuevoNombreDeFoto);
      $rutaActual = $ruta."/FotosTemp/".$nuevoNombreDeFoto;
      
      //Muevo a carpeta Fotos
    rename($rutaActual,$rutaDestino.$nuevoNombreDeFoto);
      $usuario->foto =$nuevoNombreDeFoto; 
    } 
   
  if  ($queHagoConLaFoto == 'existe')
    {
      $usuario->foto = $foto;
    }         
   
    
  if  ($queHagoConLaFoto == 'noesta')
    {
      $usuario->foto = $unUsuario->foto;
    }

  $usuario->ModificarUsuarioParametros();
  echo "3";
  return;
?>
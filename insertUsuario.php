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
	//Encripto contraseña
	$contrasenia = sha1($_POST["pass"]);

	$insertUsuario->usuario	    = $_POST["usuario"];
	$insertUsuario->nombre 	    = $_POST["nombre"];
	$insertUsuario->apellido    = $_POST["apellido"];
	$insertUsuario->sexo 	    = $_POST["sexo"];
	$insertUsuario->email 	    = $_POST["email"];
	$insertUsuario->contrasenia = $contrasenia;

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

        $nuevoNombreDeFoto = str_replace(' ', '', $insertUsuario->usuario);
        $nuevoNombreDeFoto = $nuevoNombreDeFoto.".".$EXT;
        $nuevoNombreDeFoto = str_replace(' ', '', $nuevoNombreDeFoto); 

        rename ($ruta."/FotosTemp/".$nomarch,$ruta."/FotosTemp/".$nuevoNombreDeFoto);
        $rutaActual = $ruta."/FotosTemp/".$nuevoNombreDeFoto;
        
        //Muevo a carpeta Fotos
    	rename($rutaActual,$rutaDestino.$nuevoNombreDeFoto);
      	$insertUsuario->foto =$nuevoNombreDeFoto;	
      }	
     
    if 	($queHagoConLaFoto == 'existe')
      {
      	$insertUsuario->foto = $foto;
      }					
     
      
    if 	($queHagoConLaFoto == 'noesta')
      {
      	$insertUsuario->foto = 'profile_default.jpg';
      }

	$insertUsuario = $insertUsuario->InsertarUsuario();
	echo "El usuario ha sido registrado";
	return;
?>
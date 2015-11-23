<?php
session_start();

include_once("class/Fiestas.php");
include_once("class/Usuarios.php");
include_once("class/AccesoDatos.php");

$fiesta = new Fiestas();
$fiesta = Fiestas::TraerUnaFiesta($_SESSION["usuarioActual"]);
$usuario = Usuarios::TraerUnUsuario($_SESSION["usuarioActual"]);
?>

  <h1>Mi fiesta</h1>
  <form onsubmit="editarFiesta();return false;">
  <br>
  <br>
  <p>Fecha     </p><input id="fecha"  type="date" readonly style="background-color: #FFE2EA;"
      value="<?php echo $fiesta->fecha;?>">
  <p>Invitación    </p><textarea id="invitacion" readonly style="background-color: #FFE2EA;"><?php echo $fiesta->invitacion;?></textarea>
  <p>Provincia</p><input id="provincia"   type="text" readonly maxlength="20" style="background-color: #FFE2EA;"
      value="<?php echo $fiesta->provincia;?>">
  <p>Localidad</p><input id="localidad"   type="text" readonly maxlength="20" style="background-color: #FFE2EA;"
      value="<?php echo $fiesta->localidad;?>">
  <p>Lugar:</p><br><br> 
  <p>Calle    </p><input id="calle"   type="text"     maxlength="25" readonly style="background-color: #FFE2EA;"
      value="<?php echo $fiesta->calle;?>">
  <p>Numero  </p><input id="numero" type="text"     maxlength="11" readonly style="background-color: #FFE2EA;"
      value="<?php echo $fiesta->numero;?>">
  <input id="mapa"   type="button" value="Ver en mapa" onclick="VerEnMapa('<?php echo $fiesta->provincia;?>', '<?php echo $fiesta->calle;?>' + ' '  + '<?php echo $fiesta->numero;?>', '<?php echo $fiesta->localidad;?>', 'Fiesta de <?php echo $usuario->nombre;?> <?php echo $usuario->apellido;?>')">
  <div id="principal"></div>
  <input type="submit" value="Editar" /><input type="button" value="Administrar invitados" onclick="AdministrarInvitados()"/>
  </form>
<?php
  session_start();
  require_once("class/Usuarios.php");
  require_once("class/AccesoDatos.php");
  $usuario = Usuarios::TraerUnUsuario($_SESSION["usuarioActual"]);

?>
<script type="text/javascript">
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>
  <h1>Mi fiesta</h1>
  <form onsubmit="UpdateFiesta();return false;">
  <br>
  <br>
  <p>Fecha     </p><input id="fecha"  type="date" required
    value="<?php echo $_POST["fecha"];?>">
  <p>Invitación    </p><textarea id="invitacion" required><?php echo $_POST["invitacion"];?></textarea>
  <p>Provincia</p><input id="provincia"   type="text" required maxlength="20"
    value="<?php echo $_POST["provincia"];?>" pattern="[A-Za-z\s]{1,}">
  <p>Localidad</p><input id="localidad"   type="text" required maxlength="20"
    value="<?php echo $_POST["localidad"];?>" pattern="[A-Za-z\s]{1,}">
  <p>Lugar:</p><br><br> 
  <p>Calle    </p><input id="calle"   type="text"     maxlength="25" required
    value="<?php echo $_POST["calle"];?>" pattern="[A-Za-z\s]{1,}">
  <p>Numero  </p><input id="numero" type="text"     maxlength="11" required
    value="<?php echo $_POST["numero"];?>" onkeypress='validate(event)'>
  <input id="mapa"   type="button" value="Ver en mapa" onclick="BrindarDatosVerEnMapa()">
  <div id="principal"></div>
  <input type="submit" value="Actualizar" style="width: 100%;"/>
</form>
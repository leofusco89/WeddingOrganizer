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
  <table >
    <tbody>
      <tr>
       <td width="25%" style="vertical-align: baseline; padding-right: 10px;">
      
  <input id="mapa"   type="button" value="Ver en mapa" onclick="BrindarDatosVerEnMapa()">
  <input type="submit" value="Actualizar" style="width: 100%;"/>
  </td>
       <td>
  <p>Fecha     </p><input id="fecha"  type="date" required
    value="<?php echo $_POST["fecha"];?>" min="<?php $fecha = date("Y-m-d");
                                                    echo date('Y-m-d', strtotime($fecha. ' + 14 days')); ?>">
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
       </td>
      </tr>
    </tbody> 
  </table>
</form>
  <div id="principal"></div>
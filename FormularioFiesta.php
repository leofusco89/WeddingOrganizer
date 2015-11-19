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
  <form onsubmit="registerFiesta();return false;">
  <br>
  <br>
  <p>Fecha     </p><input id="fecha"  type="date" required>
  <p>Invitación    </p><textarea id="invitacion" required></textarea>
  <p>Provincia     </p><input id="provincia"   type="text" maxlength="20" required pattern="[A-Za-z\s]{1,}">
  <p>Localidad     </p><input id="localidad"   type="text" maxlength="20" required pattern="[A-Za-z\s]{1,}">
  <p>Lugar:</p><br><br> 
  <p>Calle    </p><input id="calle"   type="text"     maxlength="25" required pattern="[A-Za-z\s]{1,}">
  <p>Numero  </p><input id="numero" type="text"     maxlength="11" required onkeypress='validate(event)'>
  <input id="mapa"   type="button" value="Ver en mapa" onclick="BrindarDatosVerEnMapa()">
  <div id="principal"></div>
  <input type="submit" value="Registrar" /><input type="reset"/>
</form>
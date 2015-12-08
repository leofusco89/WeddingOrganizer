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
  <table >
    <tbody>
      <tr>
       <td width="25%" style="vertical-align: baseline; padding-right: 10px;">
  <input id="mapa"   type="button" value="Ver en mapa" onclick="BrindarDatosVerEnMapa()">
  <input type="submit" value="Registrar" /><input type="reset"/></td>
       <td>
  <p>Fecha     </p><input id="fecha"  type="date" required min="<?php $fecha = date("Y-m-d");
                                                    echo date('Y-m-d', strtotime($fecha. ' + 14 days')); ?>">
  <p>Invitación    </p><textarea id="invitacion" required></textarea>
  <p>Provincia     </p><input id="provincia"   type="text" maxlength="20" required pattern="[A-Za-z\s]{1,}">
  <p>Localidad     </p><input id="localidad"   type="text" maxlength="20" required pattern="[A-Za-z\s]{1,}">
  <p>Lugar:</p><br><br> 
  <p>Calle    </p><input id="calle"   type="text"     maxlength="25" required pattern="[A-Za-z\s]{1,}">
  <p>Numero  </p><input id="numero" type="text"     maxlength="11" required onkeypress='validate(event)'></td>
      </tr>
    </tbody> 
  </table>

</form>
  <div id="principal"></div>
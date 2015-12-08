<?php
  session_start();
  
  include_once("class/Usuarios.php");
  include_once("class/Mesas.php");
  include_once("class/Configuraciones.php");
  include_once("class/AccesoDatos.php");
  
  $mesas = new Mesas();
  $mesas = Mesas::TraerTodasMesasPorUsuario($_SESSION["usuarioActual"]);
  $invitados = new Mesas();
  $invitados = Mesas::TraerTodosInvitadosPorUsuario($_SESSION["usuarioActual"]);
  $num = count($mesas);
  $configuracion = Configuraciones::TraerConfiguracion();

?>

 <h1>Mis invitados</h1>
 <br>
 <div id="opcionesMesa">
  <p style="display: inline;padding: 11px;font-size: 20px;">Mesa   
  	<select id="mesa" onChange="TraerInvitadosMesa()">
  	<?php 
   if ($num == 0) {
     echo "<option> 1";
   }
   else
   {
     foreach ($mesas as $mesa) {
     echo "<option>".$mesa->mesa;
     }
  	}
  	?>
  </select></p>
  
  <input type="button" value="Añadir" onclick="AgregarMesa(<?php echo $configuracion->cantMaxMesas;?>)" style="margin-bottom: 5.5%;width: 30%;height: 50;line-height: 0px;"/><input type="button" value="Eliminar"  onclick='EliminarMesa()' style="margin-bottom: 5.5%;width: 30%;height: 50;line-height: 0px;"/>
</div>

<div id="tablaInvitados">
<table >
    <tbody>
      <tr>
       <td width="200px" style="vertical-align: baseline; padding-right: 10px;">
<input type="button" value="Guardar mesa" onclick="GuardarMesa(1)" style="margin-bottom: 5.5%;width: 90%;height: 50;line-height: 0px;"/>
<br>
<input type="button" value="Estadísticas" onclick="Grafico()" style="margin-bottom: 5.5%;width: 90%;height: 50;line-height: 0px;"/>
<br>
<input type="button" value="Descargar mesas" onclick="DescargarMesas()" style="margin-bottom: 5.5%;width: 90%;height: 50;line-height: 0px;"/>
</td>
       <td>
<table id="tablaMesa">
  <tbody>
  <thead>
        <tr>
      <th width=70% style="text-align: center;" >Invitado</th>
      <th  style="text-align: center;">Asistencia</th>
    </tr>
  </thead>
  <?php 
  $maxInvitadosPorMesa = 10;
    
  $invitadoNumero = 1;
  $cant = 0;
  $cant = count($invitados);
  if ($cant > 0) {
    foreach ($invitados as $invitado) 
    {
      if ($invitado->mesa == 1) {
        if ($invitado->asistencia == "Si") {
          $checked = "checked";
        }
        else
        {
          $checked = "";
        }
          echo 
          "<tr>
              <td width=70%><input id='".$invitadoNumero."NA' type='text' value='".$invitado->nombreApellido."'></td> 
              <td><input id='".$invitadoNumero."As' type='checkbox' name='".$invitadoNumero."As' ".$checked."></td>
            </tr>";
          $invitadoNumero = $invitadoNumero + 1;
      }
    }
  };

  if ($invitadoNumero < $maxInvitadosPorMesa) {
     do {
      echo  "<tr>
            <td width=70%><input id='".$invitadoNumero."NA' type='text'></td> 
            <td><input id='".$invitadoNumero."As' type='checkbox' name='".$invitadoNumero."As'></td>
          </tr>";
        $invitadoNumero = $invitadoNumero + 1;
     } while ($invitadoNumero <= $maxInvitadosPorMesa);
  }

  
  ?>

  </tbody>
</table></td>
      </tr>
    </tbody> 
  </table>
<br>


<div id="grafico" style="width: 100%;">
</div>
</div>
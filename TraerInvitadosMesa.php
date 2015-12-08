<?php
  session_start();
  
  include_once("class/Usuarios.php");
  include_once("class/Mesas.php");
  include_once("class/AccesoDatos.php");


  $mesa = Mesas::TraerInvitadosUnaMesa($_SESSION["usuarioActual"], $_POST["mesa"]);
  $idMesa = $_POST["mesa"];
?>
<table >
    <tbody>
      <tr>
       <td width="200px" style="vertical-align: baseline; padding-right: 10px;">
        <input type="button" value="Guardar mesa" onclick="GuardarMesa(<?php echo $idMesa;?>)" style="margin-bottom: 5.5%;width: 90%;height: 50;line-height: 0px;"/>
        <input type="button" value="Estadísticas" onclick="Grafico()" style="margin-bottom: 5.5%;width: 90%;height: 50;line-height: 0px;"/>
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
  $cant = count($mesa);

  if ($cant > 0) {
    foreach ($mesa as $invitado) 
    {
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
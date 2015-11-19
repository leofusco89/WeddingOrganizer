<?php
  session_start();
  
  include_once("class/Usuarios.php");
  include_once("class/Mesas.php");
  include_once("class/Configuraciones.php");
  include_once("class/AccesoDatos.php");
  
  $invitados = Mesas::TraerTodosInvitadosPorUsuario($_SESSION["usuarioActual"]);  
  $cant = count($invitados);
  if ($cant == 0) {
  	echo "1";
  	return;
  }

echo"
<table id='tablaDescarga'>
	<tbody>
	<thead>
        <tr>
			<th>Mesa</th>
			<th>Numero de asiento</th>
			<th>Invitado</th>
			<th>Asistencia</th>
		</tr>
	</thead>";

  foreach ($invitados as $invitado) 
    {
      echo "<tr>
           <td>".$invitado->mesa."</td> 
           <td>".$invitado->invitado."</td> 
           <td>".$invitado->nombreApellido."</td>
           <td>".$invitado->asistencia."</td>
      </tr>";
     }
	echo "</tbody>
</table>";

?>
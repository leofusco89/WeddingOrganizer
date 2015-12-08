<?php
session_start();

include_once("class/Fiestas.php");
include_once("class/AccesoDatos.php");

$fiesta = new Fiestas();
$fiesta = Fiestas::TraerUnaFiesta($_SESSION["usuarioActual"]);
?>
  <div class="menuMenu">
    <form>
      <h1>Casamiento:</h1>
      <br>
      <p style="margin: initial;">Fecha: Faltan <?php $fecha = date_create($fiesta->fecha);
                                                      $fecha2 = date_create(date("Y-m-d"));
                                                      $diff=date_diff($fecha2,$fecha);
                                                      echo $diff->format("%a"); ?> días para su casamiento   <input id="fecha" type="text" readonly maxlength="12"  
        value="<?php echo $fiesta->fecha;?>" style="margin: initial; background-color: #FFE2EA;"></p><br>
      <p style="margin: initial;">Invitación    </p>  <textarea id="invitacion" readonly style="margin: initial;background-color: #FFE2EA;"><?php echo $fiesta->invitacion;?></textarea>
      <p style="margin: initial;">Provincia    <input id="provincia"   type="text" readonly maxlength="20" value="<?php echo $fiesta->provincia;?>" style="margin: initial;background-color: #FFE2EA;" pattern="[A-Za-z\s]{1,}"></p>
      <p style="margin: initial;">Localidad    <input id="localidad"   type="text" readonly maxlength="20" value="<?php echo $fiesta->localidad;?>" style="margin: initial;background-color: #FFE2EA;" pattern="[A-Za-z\s]{1,}"></p>
      <p style="margin: initial;">Dirección    <input id="calle"   type="text" readonly maxlength="25" value="<?php echo $fiesta->calle;?>" style="margin: initial;background-color: #FFE2EA;" pattern="[A-Za-z\s]{1,}"></p>
      <p style="margin: initial;"><input id="numero" type="text" readonly maxlength="11" value="<?php echo $fiesta->numero;?>" style="margin: initial;background-color: #FFE2EA;"></p>
    </form>
  </div>

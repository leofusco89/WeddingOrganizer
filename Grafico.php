<?php
  session_start();
  
  include_once("class/Mesas.php");
  include_once("class/AccesoDatos.php");

  $invitados = Mesas::TraerTodosInvitadosPorUsuario($_SESSION["usuarioActual"]);
  $asisten = 0;
  $total   = 0;
  foreach ($invitados as $invitado) {
      if ($invitado->nombreApellido != "") {
        $total = $total + 1;

        if ($invitado->asistencia == "Si") {
            $asisten = $asisten + 1;
        }
      }
  }

  if ($total == 0) {
    echo "1";
    return;
  }else{

  $perAsisten   = ( $asisten * 100 ) / $total;
  $perNoAsisten = 100 - $perAsisten;

    echo"
<script type='text/javascript'>
$(function () {
    $('#grafico').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Estadísticas de asistencia'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Asistencia',
            colorByPoint: true,
            data: [{
                name: 'Asisten',
                y: ".$perAsisten.",
                sliced: true
            },{
                name: 'No asisten ',
                y: ".$perNoAsisten."
            } ]
        }]
    });
});
</script>";
  }
?>

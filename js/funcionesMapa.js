function VerEnMapa(prov, dire, loc, id)
{	
	if (prov != "" &&
		dire != "" &&
		loc  != "") {
    	var punto = dire +", " +  loc  +", " +  prov +", Argentina";
    	console.log(punto);
    	var funcionAjax=$.ajax({
			url:"FormMapa.php",
			type:"post",
		});

    	funcionAjax.done(function(retorno){
			$("#principal").html(retorno);
    	    $("#punto").val(punto);
    	    $("#id").val(id);
		Geolocalizacion.Marcador.iniciar();
		Geolocalizacion.Marcador.verMarcador();	
		});
	}
	else{
		alert("Por favor, completar Provincia, Localidad, Calle y Número");
	};
}

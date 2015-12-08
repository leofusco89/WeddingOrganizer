<?php
if(!defined("SPECIALCONSTANT")) die("Acceso denegado");
// var_dump($app);

// GET: Para consultar y leer recursos
// POST: Para crear recursos
// PUT: Para editar recursos
// DELETE: Para eliminar recursos

// GET: Para consultar y leer recursos

//Cada uno de estos métodos es una función que ya está predeterminado en slim. El slim hace el app->run que está en ws/index.php. Cuando entra en el index
// el objeto app va a verificar si recibe esto: "personas".
// Si le paso personas asi en limpio lo que hace es ir al método TraerTodasLasPersonas (store procedure) y lo que hace es cargar en $res la respuesta y 
// después responde con esa respuesta transformada en json. Recibe el parámetro //personas
//No se programó nada de esto , mirar el framework slim. Lo unico que voy a hacer es saber que si hago get le puedo pasar distintos parámetros y segun los 
// parámetros que le pase me va a devolver algo. Lo que devuelve es un json. Es lo mismo que lo que se hace con el traerclima.php. Nosotros al clima le pasabamos
// algo y nos devolvia el clima de esa ciudad
$app->get("/usuarios/", function() use($app)
{
	$cnn = Conexion::DameAcceso();
	$sentencia = $cnn->prepare('select * from usuarios');
	
	$sentencia->execute();
	$res = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		
	$app->response->headers->set("Content-type", "application/json");
	$app->response->status(200);
	$app->response->body(json_encode($res));
});

?>
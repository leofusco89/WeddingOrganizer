<?php
class configuraciones
{
	public $cantMaxMesas;

	
	 public static function UpdateConfiguracion($cantMaxMesas)
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM configuraciones");
			$consulta->execute();
			$consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO configuraciones(cantMaxMesas)values(:cantMaxMesas)");
			$consulta->bindValue(':cantMaxMesas', $cantMaxMesas, PDO::PARAM_INT);
			return $consulta->execute();
	 }

	public static function TraerConfiguracion() 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT *
															  FROM configuraciones");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('configuraciones');
			return $usuarioBuscado;	
	
	}
}

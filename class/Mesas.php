<?php
class mesas
{
	public $usuario;
 	public $mesa;
  	public $invitado;
  	public $nombreApellido;
  	public $asistencia;

  	public function BorrarMesa()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM mesas			
																  WHERE usuario =:usuario
																    AND mesa    =:mesa");	
				$consulta->bindValue(':usuario',$this->usuario, PDO::PARAM_STR);
				$consulta->bindValue(':mesa',$this->mesa, PDO::PARAM_INT);
				$consulta->execute();
				return $consulta->rowCount();
	 }

  	public static function BorrarTodasLasMesas($usuario)
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM mesas			
																  WHERE usuario =:usuario");	
				$consulta->bindValue(':usuario', $usuario, PDO::PARAM_STR);
				$consulta->execute();
				return $consulta->rowCount();
	 }
	
  	public static function TraerTodasMesasPorUsuario($usuario)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT DISTINCT mesa 
														      FROM mesas
														      WHERE usuario =:usuario");
			$consulta->bindValue(':usuario', $usuario, PDO::PARAM_STR);
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "mesas");		
	}

  	public static function TraerTodosInvitadosPorUsuario($usuario)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT *
													      	  FROM mesas
														      WHERE usuario =:usuario");
			$consulta->bindValue(':usuario', $usuario, PDO::PARAM_STR);
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "mesas");		
	}

	public static function TraerInvitadosUnaMesa($usuario, $mesa) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * 
															  FROM mesas 
															  WHERE usuario = :usuario
															    AND mesa    = :mesa");
            $consulta->bindValue(':usuario', $usuario, PDO::PARAM_STR);
            $consulta->bindValue(':mesa', $mesa, PDO::PARAM_INT);
			$consulta->execute();
			return $consulta->fetchAll(PDO::FETCH_CLASS, "mesas");	
	
	}

	public static function TraerInvitadoPorNombre($usuario, $nombreApellido) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * 
															  FROM mesas 
															  WHERE usuario = :usuario
															    AND nombreApellido = :nombreApellido");
            $consulta->bindValue(':usuario', $usuario, PDO::PARAM_STR);
            $consulta->bindValue(':nombreApellido', $nombreApellido, PDO::PARAM_STR);
			$consulta->execute();
			return $consulta->fetchAll(PDO::FETCH_CLASS, "mesas");	
	
	}

	 public function InsertarInvitado()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO mesas(usuario, mesa, invitado, nombreApellido, asistencia)values(:usuario, :mesa, :invitado, :nombreApellido, :asistencia)");
				$consulta->bindValue(':usuario', $this->usuario, PDO::PARAM_STR);
				$consulta->bindValue(':mesa', $this->mesa, PDO::PARAM_INT);
				$consulta->bindValue(':invitado', $this->invitado, PDO::PARAM_INT);
				$consulta->bindValue(':nombreApellido', $this->nombreApellido, PDO::PARAM_STR);
				$consulta->bindValue(':asistencia', $this->asistencia, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }

}

<?php
class fiestas
{
	public $usuario;
 	public $fecha;
 	public $provincia;
 	public $localidad;
  	public $calle;
  	public $numero;
 	public $invitacion;

	
	 public function ModificarFiestaParametros()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE fiestas SET fecha=:fecha, provincia=:provincia, localidad=:localidad, calle=:calle, numero=:numero, invitacion=:invitacion WHERE usuario=:usuario");
			$consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);
			$consulta->bindValue(':provincia', $this->provincia, PDO::PARAM_STR);
			$consulta->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
			$consulta->bindValue(':calle', $this->calle, PDO::PARAM_STR);
			$consulta->bindValue(':numero', $this->numero, PDO::PARAM_INT);
			$consulta->bindValue(':invitacion', $this->invitacion, PDO::PARAM_STR);
			$consulta->bindValue(':usuario', $this->usuario, PDO::PARAM_STR);
			return $consulta->execute();
	 }

	 public function InsertarFiesta()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO fiestas(usuario, fecha, provincia, localidad, calle, numero, invitacion) values(:usuario, :fecha, :calle, :provincia, :localidad, :numero, :invitacion)");
			$consulta->bindValue(':usuario', $this->usuario, PDO::PARAM_STR);
			$consulta->bindValue(':fecha', $this->fecha, PDO::PARAM_STR);
			$consulta->bindValue(':provincia', $this->provincia, PDO::PARAM_STR);
			$consulta->bindValue(':localidad', $this->localidad, PDO::PARAM_STR);
			$consulta->bindValue(':calle', $this->calle, PDO::PARAM_STR);
			$consulta->bindValue(':numero', $this->numero, PDO::PARAM_INT);
			$consulta->bindValue(':invitacion', $this->invitacion, PDO::PARAM_STR);
			$consulta->execute();		
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }

	public static function TraerUnaFiesta($usuario) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM fiestas WHERE usuario = :usuario");
            $consulta->bindValue(':usuario', $usuario, PDO::PARAM_STR);
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('fiestas');
			return $usuarioBuscado;	
	
	}

  	public static function BorrarFiesta($usuario)
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM fiestas
															  WHERE usuario=:usuario");	
				$consulta->bindValue(':usuario', $usuario, PDO::PARAM_STR);		
				$consulta->execute();
				return $consulta->rowCount();
	 }
}

<?php
class usuarios
{
	public $usuario;
 	public $nombre;
  	public $apellido;
  	public $sexo;
 	public $email;
 	public $foto;
  	public $contrasenia;

  	public static function BorrarUsuario($usuario)
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM usuarios			
															  WHERE usuario = :usuario");	
				$consulta->bindValue(':usuario', $usuario, PDO::PARAM_STR);		
				$consulta->execute();
				return $consulta->rowCount();
	 }
	
	 public function ModificarUsuarioParametros()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE usuarios 
															   SET nombre      = :nombre,
																   apellido    = :apellido,
																   sexo        = :sexo,
																   email 	   = :email,
																   foto 	   = :foto,
																   contrasenia = :contrasenia
															 WHERE usuario = :usuario");
			$consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
			$consulta->bindValue(':sexo', $this->sexo, PDO::PARAM_STR);
			$consulta->bindValue(':email', $this->email, PDO::PARAM_STR);
			$consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
			$consulta->bindValue(':contrasenia', $this->contrasenia, PDO::PARAM_STR);
			$consulta->bindValue(':usuario', $this->usuario, PDO::PARAM_STR);
			return $consulta->execute();
	 }

	 public function InsertarUsuario()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO usuarios(usuario, nombre, apellido, sexo, email, foto, contrasenia)values(:usuario, :nombre, :apellido, :sexo, :email, :foto, :contrasenia)");
				$consulta->bindValue(':usuario', $this->usuario, PDO::PARAM_STR);
				$consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
				$consulta->bindValue(':sexo', $this->sexo, PDO::PARAM_STR);
				$consulta->bindValue(':email', $this->email, PDO::PARAM_STR);
				$consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
				$consulta->bindValue(':contrasenia', $this->contrasenia, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }

  	public static function TraerTodosLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT *
														     FROM usuarios");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "usuarios");		
	}

	public static function TraerUnUsuario($usuario) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * 
															  FROM usuarios 
															  WHERE usuario = :usuario");
            $consulta->bindValue(':usuario', $usuario, PDO::PARAM_STR);
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuarios');
			return $usuarioBuscado;	
	
	}

	public static function ValidarUsuario($usuario, $contrasenia) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * 
															  FROM usuarios 
															  WHERE usuario     = :usuario 
															    AND contrasenia = :contrasenia");
			$consulta->bindValue(':usuario', $usuario, PDO::PARAM_STR);
			$consulta->bindValue(':contrasenia', $contrasenia, PDO::PARAM_STR);
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuarios');
			return $usuarioBuscado;	
	}

}

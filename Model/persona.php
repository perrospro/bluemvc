<?php 
/**
* 
*/
class persona
{
	private $idusuario;
	private $nombre;
	private $correo;
	private $usuario;
	private $clave;
	private $rol;
	private $estatus;
	private $telefono;
	private $reconpensa;

	
	function __construct($idusuario, $nombre, $correo, $usuario, $clave, $rol, $estatus, $telefono, $reconpensa)
	{
		$this->setIdusuario($idusuario);
		$this->setNombre($nombre);
		$this->setCorreo($correo);
		$this->setUsuario($usuario);		
		$this->setClave($clave);
		$this->setrol($rol);
		$this->setEstatus($estatus);		
		$this->setTelefono($telefono);
		$this->setReconpensa($reconpensa);
	}

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($idusuario){
		$this->idusuario = $idusuario;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getCorreo(){
		return $this->correo;
	}

	public function setCorreo($correo){
		$this->correo = $correo;
	}

	public function getUsuario(){
		return $this->usuario;
	}
	public function setUsuario($usuario){
		$this->usuario = $usuario;
		}
		public function getClave(){
			return $this->clave;
		}
	
		public function setClave($clave){
			$this->clave = $clave;
		}
		public function getRol(){
			return $this->rol;
		}
	
		public function setRol($rol){
			$this->rol = $rol;
		}
		public function getEstatus(){
			return $this->estatus;
		}
	
		public function setEstatus($estatus){
			$this->estatus = $estatus;
		}
		public function getTelefono(){
			return $this->telefono;
		}
	
		public function setTelefono($telefono){
			$this->telefono = $telefono;
		}
		public function getReconpensa(){
			return $this->reconpensa;
		}
	
		public function setReconpensa($reconpensa){
			$this->reconpensa = $reconpensa;
		}

	

	public static function save($persona){
		$db=Db::getConnect();
		$insert=$db->prepare('INSERT INTO usuario VALUES (null, :nombre,:correo,:usuario,:clave,:rol,:estatus,:telefono,:reconpensa)');
		$insert->bindValue('nombre',$persona->getNombre());
		$insert->bindValue('correo',$persona->getCorreo());
		$insert->bindValue('usuario',$persona->getUsuario());
		$insert->bindValue('clave',$persona->getClave());
		$insert->bindValue('rol',$persona->getRol());
		$insert->bindValue('estatus',$persona->getEstatus());
		$insert->bindValue('telefono',$persona->getTelefono());
		$insert->bindValue('reconpensa',$persona->getReconpensa());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaClientes=[];

		$select=$db->query('SELECT idusuario, nombre, correo, usuario, clave, rol, estatus, telefono, tipo AS reconpensa FROM usuario, reconpensa WHERE usuario.reconpensa = reconpensa.id AND rol=3 AND estatus=1');

		foreach($select->fetchAll() as $cliente){
			$listaClientes[]=new persona($cliente['idusuario'],$cliente['nombre'],$cliente['correo'],$cliente['usuario'],$cliente['clave'],$cliente['rol'] ,$cliente['estatus'],$cliente['telefono'],$cliente['reconpensa']);
		}
		return $listaClientes;
	}
	public static function alloperadores(){
		$db=Db::getConnect();
		$listasOperadores=[];

		$select=$db->query('SELECT idusuario, nombre, correo, usuario, clave, rol, estatus, telefono, reconpensa FROM usuario WHERE rol=2 AND estatus=1');

		foreach($select->fetchAll() as $operador){
			$listasOperadores[]=new persona($operador['idusuario'],$operador['nombre'],$operador['correo'],$operador['usuario'],$operador['clave'],$operador['rol'] ,$operador['estatus'],$operador['telefono'],$operador['reconpensa']);
		}
		return $listasOperadores;
	}

	public static function alloadministradores(){
		$db=Db::getConnect();
		$listasAdministradores=[];

		$select=$db->query('SELECT idusuario, nombre, correo, usuario, clave, rol, estatus, telefono, reconpensa FROM usuario WHERE rol=1 AND estatus=1');

		foreach($select->fetchAll() as $operador){
			$listasAdministradores[]=new persona($operador['idusuario'],$operador['nombre'],$operador['correo'],$operador['usuario'],$operador['clave'],$operador['rol'] ,$operador['estatus'],$operador['telefono'],$operador['reconpensa']);
		}
		return $listasAdministradores;
	}


	public static function searchById($idusuario){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM usuario WHERE idusuario =:idusuario');
		$select->bindValue('idusuario',$idusuario);
		$select->execute();

		$UsuarioDb=$select->fetch();
		$persona = new persona($UsuarioDb['idusuario'],$UsuarioDb['nombre'],$UsuarioDb['correo'],$UsuarioDb['usuario'],$UsuarioDb['clave'],$UsuarioDb['rol'] ,$UsuarioDb['estatus'],$UsuarioDb['telefono'],$UsuarioDb['reconpensa']);
		//var_dump($alumno);
		//die();
		return $persona;

	}
	
	public static function searchBynombre($nombre){
		
		$db=Db::getConnect();
		$listaClientes=[];
		$select=$db->prepare('SELECT idusuario, nombre, correo, usuario, clave, rol, estatus, telefono, tipo AS reconpensa FROM usuario, reconpensa WHERE usuario.reconpensa = reconpensa.id AND rol=3 AND estatus=1 AND nombre=:nombre');
		$select->bindValue('nombre',$nombre);
		$select->execute();
	

		foreach($select->fetchAll() as $cliente){
			$listaClientes[]=new persona($cliente['idusuario'],$cliente['nombre'],$cliente['correo'],$cliente['usuario'],$cliente['clave'],$cliente['rol'] ,$cliente['estatus'],$cliente['telefono'],$cliente['reconpensa']);
		}
		return $listaClientes;

	}
	public static function searchByoperador($nombre){
		
		$db=Db::getConnect();
		$listaClientes=[];
		$select=$db->prepare('SELECT idusuario, nombre, correo, usuario, clave, rol, estatus, telefono, tipo AS reconpensa FROM usuario, reconpensa WHERE usuario.reconpensa = reconpensa.id AND rol=2 AND estatus=1 AND nombre=:nombre');
		$select->bindValue('nombre',$nombre);
		$select->execute();
	

		foreach($select->fetchAll() as $cliente){
			$listaClientes[]=new persona($cliente['idusuario'],$cliente['nombre'],$cliente['correo'],$cliente['usuario'],$cliente['clave'],$cliente['rol'] ,$cliente['estatus'],$cliente['telefono'],$cliente['reconpensa']);
		}
		return $listaClientes;

	}

	public static function searchAdministrador($nombre){
		
		$db=Db::getConnect();
		$listaClientes=[];
		$select=$db->prepare('SELECT idusuario, nombre, correo, usuario, clave, rol, estatus, telefono, tipo AS reconpensa FROM usuario, reconpensa WHERE usuario.reconpensa = reconpensa.id AND rol=1 AND estatus=1 AND nombre=:nombre');
		$select->bindValue('nombre',$nombre);
		$select->execute();
	

		foreach($select->fetchAll() as $cliente){
			$listaClientes[]=new persona($cliente['idusuario'],$cliente['nombre'],$cliente['correo'],$cliente['usuario'],$cliente['clave'],$cliente['rol'] ,$cliente['estatus'],$cliente['telefono'],$cliente['reconpensa']);
		}
		return $listaClientes;

	}

	public static function update($persona){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE usuario SET  nombre=:nombre,correo=:correo,usuario=:usuario,clave=:clave,rol=:rol,estatus=:estatus,telefono=:telefono,reconpensa=:reconpensa WHERE idusuario=:idusuario');
		$update->bindValue('nombre',$persona->getNombre());
		$update->bindValue('correo',$persona->getCorreo());
		$update->bindValue('usuario',$persona->getUsuario());
		$update->bindValue('clave',$persona->getClave());
		$update->bindValue('rol',$persona->getRol());
		$update->bindValue('estatus',$persona->getEstatus());
		$update->bindValue('telefono',$persona->getTelefono());
		$update->bindValue('reconpensa',$persona->getReconpensa());
		$update->bindValue('idusuario',$persona->getIdusuario());
		$update->execute();
	}

	public static function delete($idusuario){
		$db=Db::getConnect();
		$delete=$db->prepare(' UPDATE usuario SET estatus = 0 WHERE idusuario=:idusuario');
		$delete->bindValue('idusuario',$idusuario);
		$delete->execute();		
	}

	public static function login(){
		$db=Db::getConnect();
		$listaClientes=[];

		$select=$db->query('SELECT idusuario, nombre, correo, usuario, clave, rol, estatus, telefono, tipo AS reconpensa FROM usuario, reconpensa WHERE usuario.reconpensa = reconpensa.id  AND estatus=1');

		foreach($select->fetchAll() as $cliente){
			$listaClientes[]=new persona($cliente['idusuario'],$cliente['nombre'],$cliente['correo'],$cliente['usuario'],$cliente['clave'],$cliente['rol'] ,$cliente['estatus'],$cliente['telefono'],$cliente['reconpensa']);
		}
		return $listaClientes;
	}
}


<?php
class login
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


	public function __construct($idusuario, $nombre, $correo, $usuario, $clave, $rol, $estatus, $telefono, $reconpensa)
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

	public function getIdusuario()
	{
		return $this->idusuario;
	}

	public function setIdusuario($idusuario)
	{
		$this->idusuario = $idusuario;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getCorreo()
	{
		return $this->correo;
	}

	public function setCorreo($correo)
	{
		$this->correo = $correo;
	}

	public function getUsuario()
	{
		return $this->usuario;
	}
	public function setUsuario($usuario)
	{
		$this->usuario = $usuario;
	}
	public function getClave()
	{
		return $this->clave;
	}

	public function setClave($clave)
	{
		$this->clave = $clave;
	}
	public function getRol()
	{
		return $this->rol;
	}

	public function setRol($rol)
	{
		$this->rol = $rol;
	}
	public function getEstatus()
	{
		return $this->estatus;
	}

	public function setEstatus($estatus)
	{
		$this->estatus = $estatus;
	}
	public function getTelefono()
	{
		return $this->telefono;
	}

	public function setTelefono($telefono)
	{
		$this->telefono = $telefono;
	}
	public function getReconpensa()
	{
		return $this->reconpensa;
	}

	public function setReconpensa($reconpensa)
	{
		$this->reconpensa = $reconpensa;
	}

	public static function login()
	{
		$db = Db::getConnect();
		$listaClientes = [];

		$select = $db->query('SELECT idusuario, nombre, correo, usuario, clave, rol, estatus, telefono, reconpensa FROM usuario, reconpensa WHERE  estatus = 1');

		foreach ($select->fetchAll() as $cliente) {
			$listaClientes[] = new login($cliente['idusuario'], $cliente['nombre'], $cliente['correo'], $cliente['usuario'], $cliente['clave'], $cliente['rol'], $cliente['estatus'], $cliente['telefono'], $cliente['reconpensa']);
		}
		
		return $listaClientes;
	}
}
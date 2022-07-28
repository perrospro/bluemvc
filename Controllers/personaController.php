<?php 
/**
* 
*/
class UsuarioController
{
	
	function __construct()
	{
		
	}

	function regresar(){
		require_once('Views/vista/bienvenido.php');
	}

	function index(){
		require_once('Views/vista/login.php');
	}

	function register(){
		require_once('Views/vista/agregarcliente.php');
	}
	function registeroperador(){
		require_once('Views/vista/agregaroperador.php');
	}
	function registeradministrador(){
		require_once('Views/vista/agregarAdministradores.php');
	}
	

	function save(){
		$rol = 3;
		$estatus=1;
		$reconpensa=1;
		$persona = new persona(null, $_POST['nombre'],$_POST['correo'],$_POST['usuario'],$_POST['clave'],$rol,$estatus,$_POST['telefono'],$reconpensa);

	persona::save($persona);
		$this->show();
	}
	function saveoperador(){
		$rol = 2;
		$estatus=1;
		$reconpensa=1;
		$persona = new persona(null, $_POST['nombre'],$_POST['correo'],$_POST['usuario'],$_POST['clave'],$rol,$estatus,$_POST['telefono'],$reconpensa);

	persona::save($persona);
		$this->showoperador();
	}

	function saveadministrador(){
		$rol = 1;
		$estatus=1;
		$reconpensa=1;
		$persona = new persona(null, $_POST['nombre'],$_POST['correo'],$_POST['usuario'],$_POST['clave'],$rol,$estatus,$_POST['telefono'],$reconpensa);

	persona::save($persona);
		$this->showoadministrador();
	}

	function show(){
	$listaClientes = persona::all();

		require_once('Views/vista/listaclientes.php');
	}

	function showoperador(){
		$listaOperadores = persona::alloperadores();
			require_once('Views/vista/listaroperadores.php');
		}
		function showoadministrador(){
			$listaAdministradores = persona::alloadministradores();
				require_once('Views/vista/listaAdministradores.php');
			}
	function updateshow(){
		$id=$_GET['id'];
		$persona=persona::searchById($id);
		require_once('Views/vista/actualizarcliente.php');
	}

	function updateshowoperador(){
		$id=$_GET['id'];
		$persona=persona::searchById($id);
		require_once('Views/vista/actualizaroperador.php');
	}
	function updateshowadministrador(){
		$id=$_GET['id'];
		$persona=persona::searchById($id);
		require_once('Views/vista/actualizaradministrador.php');
	}

	function update(){
		$persona = new persona($_POST['idusuario'], $_POST['nombre'],$_POST['correo'],$_POST['usuario'],$_POST['clave'],$_POST['rol'],$_POST['estatus'],$_POST['telefono'],$_POST['reconpensa']);

		persona::update($persona);
		$this->show();
	}
	function updateoperador(){
		$persona = new persona($_POST['idusuario'], $_POST['nombre'],$_POST['correo'],$_POST['usuario'],$_POST['clave'],$_POST['rol'],$_POST['estatus'],$_POST['telefono'],$_POST['reconpensa']);

		persona::update($persona);
		$this->showoperador();
	}

	function updateadministrador(){
		$persona = new persona($_POST['idusuario'], $_POST['nombre'],$_POST['correo'],$_POST['usuario'],$_POST['clave'],$_POST['rol'],$_POST['estatus'],$_POST['telefono'],$_POST['reconpensa']);

		persona::update($persona);
		$this->showoadministrador();
	}


	function delete(){
		$id=$_GET['id'];
		persona::delete($id);
		$this->show();
	}
	function deleteoperador(){
		$id=$_GET['id'];
		persona::delete($id);
		$this->showoperador();
	}
	function deletadministrador(){
		$id=$_GET['id'];
		persona::delete($id);
		$this->showoadministrador();
	}

	function search(){
		if (!empty($_POST['nombre'])) {
			$nombre=$_POST['nombre'];
			$listaClientes=persona::searchBynombre($nombre);
			//var_dump($id);
			//die();
			require_once('Views/vista/listaclientes.php');
		} else {
			$listaClientes=persona::all();

			require_once('Views/vista/listaclientes.php');
		}
		
		
	}
	function searchoperador(){
		if (!empty($_POST['nombre'])) {
			$nombre=$_POST['nombre'];
			$listaOperadores=persona::searchByoperador($nombre);
			//var_dump($id);
			//die();
			require_once('Views/vista/listaroperadores.php');
		} else {
			$listaOperadores=persona::alloperadores();

			require_once('Views/vista/listaroperadores.php');
		}
		
		
	}

	function searchAdministrador(){
		if (!empty($_POST['nombre'])) {
			$nombre=$_POST['nombre'];
			$listaAdministradores=persona::searchAdministrador($nombre);
			//var_dump($id);
			//die();
			require_once('Views/vista/listaAdministradores.php');
		} else {
			$listaAdministradores=persona::alloadministradores();

			require_once('Views/vista/listaAdministradores.php');
		}
		
		
	}

    }

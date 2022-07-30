<?php


$controllers = array(
	'persona' => [
		'index', 'register', 'save', 'show', 'updateshow', 'update', 'delete', 'search', 'error', 'showoperador', 'deleteoperador',
		'updateshowoperador', 'updateoperador', 'searchoperador', 'saveoperador', 'registeroperador', 'showoadministrador', 'deletadministrador',
		'updateshowadministrador', 'updateadministrador', 'searchAdministrador', 'saveadministrador', 'registeradministrador', 'regresar'
	],
	'login' => ['login', 'salir', 'bienvenido', 'showLogion'],
	'sucursal' => ['showSucursal', 'deleteSucursal', 'updateshowSucursal', 'updateSucursal', 'searchSucursal', 'registerSucursal', 'saveSucursal'],
	'evento' => ['registerEvento', 'saveEvento', 'showEvento', 'deleteEvento', 'searchEvento', 'updateshowSucursal', 'verEvento', 'searchverEvento', 'updateEvento'],
	'reservaEvento' => ['showReservaE', 'searchReserva', 'deleteReservaE', 'registerReserva', 'saveReservaE', 'confirmarEliminacion', 'verMisReservas'],
	'reservaNormal' => ['showReservaN','updateshowReservaN','updateReservaN','deleteReservaN','searchReservaN','verMisReservasN','updateReservaNremvio','registerReservaN',
	'saveReservaN']
);

if (array_key_exists($controller,  $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	} else {
		call('persona', 'error');
	}
} else {
	call('persona', 'error');
}

function call($controller, $action)
{
	require_once('Controllers/' . $controller . 'Controller.php');

	switch ($controller) {
		case 'persona':
			require_once('Model/persona.php');
			$controller = new UsuarioController();
			break;
		case 'login':
			require_once('Model/login.php');
			$controller = new loginController();
			break;
		case 'sucursal':
			require_once('Model/sucursal.php');
			$controller = new sucursalController();
			break;
		case 'evento':
			require_once('Model/evento.php');
			require_once('Model/sucursal.php');
			$controller = new eventoController();
			break;
		case 'reservaEvento':

			require_once('Model/evento.php');
			require_once('Model/reservaEvento.php');
			$controller = new reservaEventoController();
			break;
		case 'reservaNormal':
			require_once('Model/reservaNormal.php');
			require_once('Model/sucursal.php');
			require_once('Model/persona.php');
			$controller = new reservaNormalController();
			break;
		default:
			# code...
			break;
	}
	$controller->{$action}();
}

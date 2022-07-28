<?php
class reservaEventoController{

    function __construct()
	{
		
	}

    function showReservaE(){
        $listaReservaE = reservaEvento::allreservasE();
        $listaEventos = reservaEvento::allEventosR();
            require_once('Views/vista/listareservaE.php');
        }
	
        function deleteEvento(){
            $id=$_GET['id'];
            reservaEvento::deleteReservaE($id);
            $this->showReservaE();
        }
        function updateshowSucursal(){
            $id=$_GET['id'];
            $sucursal=sucursal::searchByIdSucursal($id);
            require_once('Views/vista/actualizarSucursal.php');
        }
        function updateSucursal(){
            $sucursal = new sucursal($_POST['id'], $_POST['nombre'],$_POST['ubicacion'],$_POST['extencionT'],$_POST['estado'],$_POST['capacidad']);
    
            sucursal::updateSucursal($sucursal);
            $this->showReservaE();

            
        }
        function searchReserva(){
            if (!empty($_POST['evento'])) {
                $evento=$_POST['evento'];
                $listaReservaE=reservaEvento::searchBynombreEvento($evento);
                $listaEventos = reservaEvento::allEventosR();
                //var_dump($id);
                //die();
                require_once('Views/vista/listareservaE.php');
            } else {
                $listaReservaE=reservaEvento::allreservasE();
                $listaEventos = reservaEvento::allEventosR();
    
                require_once('Views/vista/listareservaE.php');
            }
            
            
        }

        function registerSucursal(){
            require_once('Views/vista/agregarSucursal.php');
        }

        function saveSucursal(){
         
            $estado=1;

            $sucursal = new sucursal(null, $_POST['nombre'],$_POST['ubicacion'],$_POST['extencionT'],$estado,$_POST['capacidad']);
    
        sucursal::saveSucursal($sucursal);
            $this->showReservaE();
        }
}

?>
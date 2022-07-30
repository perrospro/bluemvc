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
	
        function deleteReservaE(){
            $idreserva = $_POST['idreserva'];
            $boletos = $_POST['boletos'];
          $idevento = $_POST['idevento'];
            
            $evento=evento::searchByIdEvento($idreserva);

            $capacidad_dis = $evento->getCapacidad_dis();
            $total = $capacidad_dis + $boletos;
            reservaEvento::deleteReservaE($idreserva);
           reservaEvento::updateboletos($total,$idevento);
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

        

        function verEvento(){
            $listaEventos = evento::allEventos();
                require_once('Views/vista/verEventos.php');
            }

        function registerReserva(){
            $id=$_GET['id'];
            $evento=evento::searchByIdEvento($id);
            require_once('Views/vista/agregarReservaE.php');
        }
        function confirmarEliminacion(){
            $id=$_GET['id'];
            $reserva=reservaEvento::searchByIdReservaE($id);
            require_once('Views/vista/confirmareliminacion.php');
        }

       
        function  verMisReservas(){
            $id=$_GET['id'];
            $listaReservaE=reservaEvento::searchByIdReservaUsuario($id);
            require_once('Views/vista/listarMisReservasE.php');
        }


        function saveReservaE(){
         $boletos = $_POST['boletos'];
         $idevento = $_POST['idevento'];
         $capacidad_dis = $_POST['capacidad_dis'];
         $total = $capacidad_dis - $boletos;
     $reserva = new reservaEvento(null, $_POST['cliente'],$idevento,$boletos);
        reservaEvento::saveReservaE($reserva);
        reservaEvento::updateboletos($total,$idevento);
            $this->verEvento();
        }
}

?>
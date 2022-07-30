<?php
class reservaNormalController{

    function __construct()
	{
		
	}

    function showReservaN(){
        $listaReservaN = reservaNormal::allReservasN();
        $listaClientes = reservaNormal::clientes();
            require_once('Views/vista/listaReservaN.php');
        }
        function showReservaNRemvio(){
            $listaReservaN = reservaNormal::allReservasN();
            $listaClientes = reservaNormal::clientes();
                require_once('Views/vista/misReservasN.php');
            }
	
        function deleteReservaN(){
            $id = $_GET['id'];
            reservaNormal::deleteReservaN($id);
            $this->showReservaN();
        }

        function updateshowReservaN(){
            $id=$_GET['id'];
            $reservaN=reservaNormal::searchByIdReservaN($id);
            $listaSucursales = reservaNormal::allSucursales();
            require_once('Views/vista/actualizarReservaN.php');
        }
        function updateReservaN(){
            $reservaN = new reservaNormal($_POST['id'], $_POST['fecha'],$_POST['hora'],'xd',$_POST['sucursal'],$_POST['totalhora'],$_POST['lugares']);
    
            reservaNormal::updateReservaN($reservaN);
            $this->showReservaN();
        }

        function updateReservaNremvio(){
            $reservaN = new reservaNormal($_POST['id'], $_POST['fecha'],$_POST['hora'],'xd',$_POST['sucursal'],$_POST['totalhora'],$_POST['lugares']);
    
            reservaNormal::updateReservaN($reservaN);
            $this->showReservaNRemvio();
        }
        function searchReservaN(){
            if (!empty($_POST['cliente'])) {
                $cliente=$_POST['cliente'];
                $listaReservaN=reservaNormal::searchByIdReservaUsuarioN($cliente);
                $listaClientes = reservaNormal::clientes();
                //var_dump($id);
                //die();
                require_once('Views/vista/listaReservaN.php');
            } else {
                $cliente=$_POST['cliente'];
                $listaReservaN=reservaNormal::allReservasN();
                $listaClientes= reservaNormal::clientes();
               
                require_once('Views/vista/listaReservaN.php');
            }
            
            
        }

        

        

        function registerReservaN(){
            $listaSucursales=reservaNormal::allSucursales();
            require_once('Views/vista/registroReservaN.php');
        }

       
        function  verMisReservasN(){
            $id=$_GET['id'];
            $listaReservaN=reservaNormal::searchByIdReservaUsuarioN($id);
            require_once('Views/vista/misReservasN.php');
        }


      


        function saveReservaN(){
      
      
     $reserva = new reservaNormal(null, $_POST['fecha'],$_POST['hora'],$_POST['cli'],$_POST['sucursal'],$_POST['totalhora'],$_POST['lugares']);
        reservaNormal::saveReservaN($reserva);
            $this->showReservaNRemvio();
        }
}

?>
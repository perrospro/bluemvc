<?php
class eventoController{

    function __construct()
	{
		
	}

    function showEvento(){
        $listaEventos = evento::allEventos();
            require_once('Views/vista/listaEvento.php');
        }
	
        function verEvento(){
            $listaEventos = evento::allEventos();
                require_once('Views/vista/verEventos.php');
            }

        function deleteEvento(){
            $id=$_GET['id'];
            evento::deleteEvento($id);
            $this->showEvento();
        }


        function updateshowSucursal(){
            $id=$_GET['id'];
            $evento=evento::searchByIdEvento($id);
            $listaSucursales = evento::allSucursales();
            require_once('Views/vista/actualizarEvento.php');
        }

        function updateEvento(){
            $evento = new evento($_POST['idevento'], $_POST['tema'],$_POST['fecha'],$_POST['ubi'],$_POST['capacidad_total'],$_POST['capacidad_dis'],$_POST['descripcion'],$_POST['estatus'],$_POST['horaini'],$_POST['img']);
    
            evento::updateEvento($evento);
            $this->showEvento();

            
        }
        function searchEvento(){
            if (!empty($_POST['fecha'])) {
                $fecha=$_POST['fecha'];
                $listaEventos=evento::searchByfechaEvento($fecha);
                //var_dump($id);
                //die();
                require_once('Views/vista/listaEvento.php');
            } else {
                $listaEventos=evento::allEventos();
    
                require_once('Views/vista/listaEvento.php');
            }
            
            
        }

        function searchverEvento(){
            if (!empty($_POST['fecha'])) {
                $fecha=$_POST['fecha'];
                $listaEventos=evento::searchByfechaEvento($fecha);
                //var_dump($id);
                //die();
                require_once('Views/vista/verEventos.php');
            } else {
                $listaEventos=evento::allEventos();
    
                require_once('Views/vista/verEventos.php');
            }
            
            
        }

        function registerEvento(){
            $listaSucursales = evento::allSucursales();
            require_once('Views/vista/agregarEvento.php');

        }

      

        function saveEvento(){
         $image = " ";
            $estatus=1;
         

            $evento = new evento(null, $_POST['tema'],$_POST['fecha'],$_POST['ubi'],$_POST['capacidad_total'],$_POST['capacidad_total'],$_POST['descripcion'] ,$estatus,$_POST['horaini'], $image);
    
        evento::saveEvento($evento);
            $this->registerEvento();
        }



}

?>
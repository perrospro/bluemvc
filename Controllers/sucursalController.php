<?php
class sucursalController{

    function __construct()
	{
		
	}

    function showSucursal(){
        $listaSucursales = sucursal::allSucursales();
            require_once('Views/vista/listaSucursal.php');
        }
	
        function deleteSucursal(){
            $id=$_GET['id'];
            sucursal::deleteSucursal($id);
            $this->showSucursal();
        }
        function updateshowSucursal(){
            $id=$_GET['id'];
            $sucursal=sucursal::searchByIdSucursal($id);
            require_once('Views/vista/actualizarSucursal.php');
        }
        function updateSucursal(){
            $sucursal = new sucursal($_POST['id'], $_POST['nombre'],$_POST['ubicacion'],$_POST['extencionT'],$_POST['estado'],$_POST['capacidad']);
    
            sucursal::updateSucursal($sucursal);
            $this->showSucursal();

            
        }
        function searchSucursal(){
            if (!empty($_POST['ubicacion'])) {
                $ubicacion=$_POST['ubicacion'];
                $listaSucursales=sucursal::searchByubicacionSucursal($ubicacion);
                //var_dump($id);
                //die();
                require_once('Views/vista/listaSucursal.php');
            } else {
                $listaSucursales=sucursal::allSucursales();
    
                require_once('Views/vista/listaSucursal.php');
            }
            
            
        }

        function registerSucursal(){
            require_once('Views/vista/agregarSucursal.php');
        }

        function saveSucursal(){
         
            $estado=1;

            $sucursal = new sucursal(null, $_POST['nombre'],$_POST['ubicacion'],$_POST['extencionT'],$estado,$_POST['capacidad']);
    
        sucursal::saveSucursal($sucursal);
            $this->showSucursal();
        }
}

?>
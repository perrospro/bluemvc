<?php
class eventoController
{

    function __construct()
    {
    }

    function showEvento()
    {
        $listaEventos = evento::allEventos();
        require_once('Views/vista/listaEvento.php');
    }

    function verEvento()
    {
        $listaEventos = evento::allEventos();
        require_once('Views/vista/verEventos.php');
    }

    function deleteEvento()
    {
        $id = $_GET['id'];
        evento::deleteEvento($id);
        $this->showEvento();
    }


    function updateshowSucursal()
    {
        $id = $_GET['id'];
        $evento = evento::searchByIdEvento($id);
        $listaSucursales = evento::allSucursales();
        require_once('Views/vista/actualizarEvento.php');
    }

    function updateEvento()
    {
        $evento = evento::searchByIdEvento($_POST['idevento']);
        $directorio = "img/";
        $actualUrl = explode('/', $evento->getImg());
        $uploadOk = 1;
        $fileName = empty(basename($_FILES["fileToUpload"]["name"])) ? $actualUrl[1] : basename($_FILES["fileToUpload"]["name"]);
        $target_file = $directorio . $fileName ;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $evento = new evento($_POST['idevento'], $_POST['tema'], $_POST['fecha'], $_POST['ubi'], $_POST['capacidad_total'], $_POST['capacidad_dis'], $_POST['descripcion'], $_POST['estatus'], $_POST['horaini'], $target_file);

        evento::updateEvento($evento);
        $this->showEvento();

        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                // echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        //COMPROBAR QUE SOLO SE PUEDA SUBIR IMAGEN
        if ($imageFileType != "jpg"  && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            // echo "Lo siento, solo se adminte imagenes en formatos JPG, JPEG, PNG y GIF's";
            $uploadOk = 0;
        }
        
        if ($uploadOk != 0) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "LA IMAGEN HA SIDO SUBIDA CON ÉXITO";
            }
        } else {
            echo "NO SE PUEDE REGISTRAR";
        }
    }

    function searchEvento()
    {
        if (!empty($_POST['fecha'])) {
            $fecha = $_POST['fecha'];
            $listaEventos = evento::searchByfechaEvento($fecha);
            //var_dump($id);
            //die();
            require_once('Views/vista/listaEvento.php');
        } else {
            $listaEventos = evento::allEventos();

            require_once('Views/vista/listaEvento.php');
        }
    }

    function searchverEvento()
    {
        if (!empty($_POST['fecha'])) {
            $fecha = $_POST['fecha'];
            $listaEventos = evento::searchByfechaEvento($fecha);
            //var_dump($id);
            //die();
            require_once('Views/vista/verEventos.php');
        } else {
            $listaEventos = evento::allEventos();

            require_once('Views/vista/verEventos.php');
        }
    }

    function registerEvento()
    {
        $listaSucursales = evento::allSucursales();
        require_once('Views/vista/agregarEvento.php');
    }


    function saveEvento()
    {
        $directorio = "img/";
        $estatus = 1;
        $uploadOk = 1;
        $target_file = $directorio . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $evento = new evento(null, $_POST['tema'], $_POST['fecha'], $_POST['ubi'], $_POST['capacidad_total'], $_POST['capacidad_total'], $_POST['descripcion'], $estatus, $_POST['horaini'], $target_file);

        evento::saveEvento($evento);
        $this->showEvento();
        
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                // echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        //COMPROBAR QUE SOLO SE PUEDA SUBIR IMAGEN
        if ($imageFileType != "jpg"  && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            // echo "Lo siento, solo se adminte imagenes en formatos JPG, JPEG, PNG y GIF's";
            $uploadOk = 0;
        }


        if ($uploadOk != 0) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "LA IMAGEN HA SIDO SUBIDA CON ÉXITO";
            }
        } else {
            echo "NO SE PUEDE REGISTRAR";
        }
       
    }
}

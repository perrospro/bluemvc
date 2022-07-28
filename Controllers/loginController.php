<?php
class loginController
{

    function bienvenido()
    {
        require_once('Views/vista/bienvenido.php');
    }

    function login()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['usuario']) && isset($_POST['clave'])) {
                $user = $_POST['usuario'];
                $pass = $_POST['clave'];

                // //se necesita encriptar pass

                // //login (bool) == TRUE
                // //rol, id_user, nombre


                $listaAdministradores = login::login();
                foreach ($listaAdministradores as $lista) {
                    if ($lista->getUsuario() == $user && $lista->getClave() == $pass) {
                        $rol =  $lista->getRol();
                        $id =  $lista->getIdusuario();
                        $user = $lista->getUsuario();

                        $_SESSION['active'] = true;
                        $_SESSION['idUser'] = $id;
                        $_SESSION['user'] = $user;
                        $_SESSION['rol'] = $rol;

                        $this->bienvenido();
                    } else {
                        require_once('Views/vista/login.php');
                    };
                }
            }
        }
    }

    function salir()
    {
        session_start();
        session_destroy();
        echo '<script>window.location="index.php"</script>';
    }
}

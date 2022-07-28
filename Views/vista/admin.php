<?php
echo 'admin';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="?controller=persona&action=regresar">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Personas
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a class="btn btn-primary" style="margin-top: 25px ;" href="?controller=persona&action=showoperador">listar operadores</a></a></li>
                        <li> <a class="btn btn-primary" style="margin-top: 25px ; margin-left: 10px;" href="?controller=persona&&action=show">Listar Clientes</a></li>
                        <li><a class="btn btn-primary" style="margin-top: 25px ; margin-left: 10px;" href="?controller=persona&&action=showoadministrador">Listar Administrador</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Evento
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a class="btn btn-primary" style="margin-top: 25px ;" href="?controller=evento&action=showEvento">gestion eventos</a></a></li>
                        <li> <a class="btn btn-primary" style="margin-top: 25px ; margin-left: 10px;" href="?controller=evento&&action=verEvento">ver eventos</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Reservas
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a class="btn btn-primary" style="margin-top: 25px ;" href="?controller=reservaEvento&action=showReservaE">ver las reservas de Eventos</a></a></li>
                        <li> <a class="btn btn-primary" style="margin-top: 25px ; margin-left: 10px;" href="?controller=evento&&action=verEvento">ver eventos</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?controller=sucursal&action=showSucursal">sucursal</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../../index.php?controller=login&action=salir">salir</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<?php  
      $val = $_SESSION['rol'];
      if($val == 1){
      $menu = 1;
     }else if($val == 2){
        $menu = 2;
       }else if($val == 3){
        $menu = 3;
       }
if($menu == 1){
?>


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
            <li>   <a class="btn btn-primary" style="margin-top: 25px ;" href="?controller=persona&action=showoperador">listar operadores</a></a></li>
            <li> <a class="btn btn-primary" style="margin-top: 25px ; margin-left: 10px;" href="?controller=persona&&action=show">Listar Clientes</a></li>
            <li><a class="btn btn-primary" style="margin-top: 25px ; margin-left: 10px;" href="?controller=persona&&action=showoadministrador">Listar Administrador</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
         
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Evento
          </a>
          <ul class="dropdown-menu">
            <li>   <a class="btn btn-primary" style="margin-top: 25px ;" href="?controller=evento&action=showEvento">gestion eventos</a></a></li>
            <li> <a class="btn btn-primary" style="margin-top: 25px ; margin-left: 10px;" href="?controller=evento&&action=verEvento">ver eventos</a></li>
          </ul>
        </li>
      
        <li class="nav-item dropdown">
         
         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Reservas
      
         </a>
         <ul class="dropdown-menu">
           <li>   <a class="btn btn-primary" style="margin-top: 25px ;" href="?controller=reservaEvento&action=showReservaE">ver las reservas de Eventos</a></a></li>
           <li> <a class="btn btn-primary" style="margin-top: 25px ; margin-left: 10px;" href="?controller=evento&&action=verEvento">ver eventos</a></li>
           <li> <a class="btn btn-primary" style="margin-top: 25px ; margin-left: 10px;" href="?controller=reservaNormal&&action=showReservaN">listar reservas Normales</a></li>
         </ul>
       </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="?controller=sucursal&action=showSucursal">sucursal</a>
        </li>
        
       
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>

        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="?controller=login&action=salir">salir</a>
        </li>
      </ul>
    
    </div>
  </div>
</nav>

<?php
}else if($menu == 2){ ?>

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
            <li>   <a class="btn btn-primary" style="margin-top: 25px ;" href="?controller=persona&action=showoperador">listar operadores</a></a></li>
            <li> <a class="btn btn-primary" style="margin-top: 25px ; margin-left: 10px;" href="?controller=persona&&action=show">Listar Clientes</a></li>
            <li><a class="btn btn-primary" style="margin-top: 25px ; margin-left: 10px;" href="?controller=persona&&action=showoadministrador">Listar Administrador</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
         
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Evento
          </a>
          <ul class="dropdown-menu">
            <li>   <a class="btn btn-primary" style="margin-top: 25px ;" href="?controller=evento&action=showEvento">gestion eventos</a></a></li>
            <li> <a class="btn btn-primary" style="margin-top: 25px ; margin-left: 10px;" href="?controller=evento&&action=verEvento">ver eventos</a></li>
          </ul>
        </li>
      
        <li class="nav-item dropdown">
         
         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Reservas
         </a>
         <ul class="dropdown-menu">
           <li>   <a class="btn btn-primary" style="margin-top: 25px ;" href="?controller=reservaEvento&action=showReservaE">ver las reservas de Eventos</a></a></li>
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
        <a class="nav-link active" aria-current="page" href="?controller=login&action=salir">salir</a>
        </li>
      </ul>
    
    </div>
  </div>
</nav>

<?php
}else if($menu == 3){ ?>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navba</a>
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
            <li>   <a class="btn btn-primary" style="margin-top: 25px ;" href="?controller=persona&action=showoperador">listar operadores</a></a></li>
            <li> <a class="btn btn-primary" style="margin-top: 25px ; margin-left: 10px;" href="?controller=persona&&action=show">Listar Clientes</a></li>
            <li><a class="btn btn-primary" style="margin-top: 25px ; margin-left: 10px;" href="?controller=persona&&action=show">Listar Clientes</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color:black ;">Link</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
    
    </div>
  </div>
</nav>
<?php
}
 ?>
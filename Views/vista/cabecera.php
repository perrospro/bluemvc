<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<?php
$val = $_SESSION['rol'];

//1 - admin
//2 - operario
//3 - cliente

// var_dump($val);

// echo $_SESSION['rol'];
if ($val == 1) {
  header('Location: ./Views/vista/admin.php');
}else if($val == 2){
  header('Location: ./Views/vista/operario.php');
}else if($val == 3){
  header('Location: ./Views/vista/cliente.php');
}
?>
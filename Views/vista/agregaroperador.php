
	<header>
<?php
    session_start();
  include('cabecera.php');
 ?>
</header>
<center>
<div class="container" style="width: 50%;">
  <h2>Registro de operadores</h2>
  <form action="?controller=persona&&action=saveoperador" method="POST">
    <div class="form-group">
      <label for="text"><strong>Nombre :</strong> </label>
      <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre" name="nombre"  required>

      <label for="text"><strong>correo:</strong> </label>
      <input type="text" class="form-control" id="correo" placeholder="Ingrese el correo" name="correo"  required>

      <label for="text"> <strong>Nickname:</strong> </label>
      <input type="text" class="form-control" id="usuario" name="usuario"  placeholder="agrgar nickname" required>

      <label for="text"> <strong>Clave:</strong></label>
      <input type="password" class="form-control" id="clave" placeholder="Ingrese la clave" name="clave"  required>

      <label for="text"><strong>telefono:</strong></label>
      <input type="number" class="form-control" id="telefono" placeholder="Ingrese eltelefono" name="telefono"  required>
      
    </div>

    <button type="submit" class="btn btn-outline-primary"">crear</button> <a style="padding:10px ;"  class="btn btn-outline-info" href="?controller=persona&&action=showoperador">Regresar</a>

  </form>
</div>
</center>
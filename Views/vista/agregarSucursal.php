
	<header>
<?php
  include('cabecera.php');
 ?>
</header>
<center>
<div class="container" style="width: 50%;">
  <h2>Registro de Sucursales</h2>
  <form action="?controller=sucursal&&action=saveSucursal" method="POST">
    <div class="form-group">
      <label for="text"><strong>Nombre :</strong> </label>
      <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre" name="nombre"  required>

      <label for="text"><strong>ubicacion:</strong> </label>
      <input type="text" class="form-control" id="ubicacion" placeholder="Ingrese la ubicacion" name="ubicacion"  required>

      <label for="text"> <strong>Extencion  De telefono:</strong> </label>
      <input type="text" class="form-control" id="extencionT" name="extencionT"  placeholder="extencion de telefono" required>

      <label for="text"> <strong>Capacidad:</strong></label>
      <input type="number" class="form-control" id="capacidad" placeholder="Ingrese la capacidad" name="capacidad"  required>

      
    </div>

    <button type="submit" class="btn btn-outline-primary"">crear</button> <a style="padding:10px ;"  class="btn btn-outline-info" href="?controller=persona&&action=show">Regresar</a>

  </form>
</div>
</center>
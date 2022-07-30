
	<header>
<?php
  include('cabecera.php');
 ?>
</header>
<center>

<div class="container" style="width: 50%;">
	<h2>Actualizar Informacion Sucursales </h2>
	<form action="?controller=sucursal&&action=updateSucursal" method="POST">
	<input type="hidden" name="id" value="<?php echo $sucursal->getId() ?>" >
		<label for="text"><strong>Nombre:</strong> </label>
      <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre" name="nombre" value="<?php echo $sucursal->getNombre() ?>" required>

      <label for="text"> <strong>ubicacion:</strong></label>
      <input type="text" class="form-control" id="ubicacion" placeholder="Ingrese la ubicacion" name="ubicacion" value="<?php echo $sucursal->getUbicacion() ?>"  required>

      <label for="text"><strong>Extencion telefono</strong></label>
      <input type="number" class="form-control"  id="extencionT" name="extencionT" value="<?php echo $sucursal->getExtencionT() ?>"  required>

      <input type="hidden" name="estado" value="<?php echo $sucursal->getEstado() ?>" >
      <label for="text"><strong>Capacidad de aforo</strong></label>
      <input class="form-control"  type="number" name="capacidad" value="<?php echo $sucursal->getCapacidad() ?>" >
    </div>
    <br>
		<button type="submit" class="btn btn-outline-primary">Actualizar</button>

	</form>
</div>
</center>
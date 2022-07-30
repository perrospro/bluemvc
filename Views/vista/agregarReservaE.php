
	<header>
<?php
  include('cabecera.php');
 ?>
</header>
<center>

<div class="container" style="width: 50%;">
	<h2>Realizar  reserva </h2>
	<form action="?controller=reservaEvento&&action=saveReservaE" method="POST">
		<label for="text"><strong>Evento: </strong> </label>
      <input type="text" class="form-control" id="evento" placeholder="Ingrese el nombre" name="evento" value="<?php echo $evento->getTema() ?>" disabled>

      <label for="text"> <strong>ubicacion:</strong></label>
      <input type="text" class="form-control" id="ubicacion" placeholder="Ingrese la ubicacion" name="ubicacion" value="<?php echo $evento->getUbi() ?>"  disabled>

      <label for="text"><strong>fecha</strong></label>
      <input type="date" class="form-control"  id="fecha" name="fecha" value="<?php echo $evento->getFecha() ?>"  disabled>

      <label for="text"><strong>boletos</strong></label>
      <input type="number" class="form-control"  id="boletos" name="boletos"   required>
  

      <input type="hidden" class="form-control"  id="cliente" name="cliente" value="<?php echo $_SESSION['idUser'] ?>"  required>
      <input type="hidden" class="form-control"  id="idevento" name="idevento" value="<?php echo  $evento->getIdevento() ?>"  required>
      <input type="hidden" class="form-control"  id="capacidad_dis" name="capacidad_dis" value="<?php echo  $evento->getCapacidad_dis() ?>"  required>

    </div>
    <br>
		<button type="submit" class="btn btn-outline-primary">Reservar</button>

	</form>
</div>
</center>
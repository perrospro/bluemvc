
	<header>
<?php
  include('cabecera.php');
 ?>
</header>
<center>

<div class="container" style="width: 50%;">
	<h2>Realizar  confirmarEliminacion </h2>
	<form action="?controller=reservaEvento&&action=deleteReservaE" method="POST">
		
      <input type="text" class="form-control" id="idevento"  name="idevento" value="<?php echo $reserva->getEvento() ?>">
      
      <input type="text" class="form-control" id="idreserva"  name="idreserva" value="<?php echo $reserva->getIdreserva() ?>" >

      <label for="text"><strong> Desea eliminar los siguientes boletos del evento</strong></label>
      <input type="text" class="form-control"  id="boletos" name="boletos" value="<?php echo $reserva->getBoletos() ?>">

    </div>
    <br>
		<button type="submit" class="btn btn-outline-primary">borrar</button>

	</form>
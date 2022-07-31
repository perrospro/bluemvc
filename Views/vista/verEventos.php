<header>
	<?php
	include('cabecera.php');
	?>
</header>




<center>
	<h2> ver Eventos</h2>

	<form class="form-inline" action="?controller=evento&action=searchverEvento" method="post">
		<div class="form-group row">
			<div class="col-xs-4">
				<input class="form-control" id="fecha" name="fecha" type="date">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"> </span> Buscar</button>
			</div>
		</div>
	</form>
	<thead>


	<tbody>
		<?php foreach ($listaEventos  as $evento) { ?>
			<div class="card" style="width: 18rem; display:inline-block; margin:10px">
				<h5 style="text-transform: uppercase;" class="card-title"><?php echo $evento->getTema() ?></h5>
				<img src="<?php echo $evento->getImg(); ?>" class="card-img-top" alt="..." width="100">
				<div class="card-body">

					<p class="card-text"><?php echo $evento->getDescripcion() ?></p>
				</div>
				<ul class="list-group list-group-flush">
					<li style="text-align:left ;" class="list-group-item">Ubicacion: <?php echo $evento->getUbi() ?>.</li>
					<li style="text-align:left ;" class="list-group-item">Fecha: <?php echo $evento->getFecha() ?>.</li>
					<li style="text-align:left ;" class="list-group-item">Hora de inicio: <?php echo $evento->getHoraini() ?>.</li>
					<li style="text-align:left ;" class="list-group-item">Cupos disponibles: <?php echo $evento->getCapacidad_dis() ?> / <?php echo $evento->getCapacidad_total() ?> </li>
				</ul>

				<div class="card-body">
					<?php if ($evento->getCapacidad_dis() != 0) { ?>
						<a class="btn btn-primary" style="margin-top: 25px ;" href="?controller=reservaEvento&action=registerReserva&id=<?php echo $evento->getIdevento(); ?>">registrarse</a>
					<?php } else { ?>
						<a class="btn btn-primary" style="margin-top: 25px ;" href="#">Evento lleno</a>
					<?php
					} ?>
				</div>
			</div>
		<?php } ?>

	</tbody>
</center>
</thead>
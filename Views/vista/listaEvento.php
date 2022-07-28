
	<header>
<?php
  session_start();
  include('cabecera.php');
 ?>
</header>

<center>

<div class="container">
	
	<h2>Lista De Eventos</h2>
	<a  class="btn btn-primary" style="margin-top: 25px ;" href="?controller=evento&action=registerEvento">Agregar Eventos</a>
	<form class="form-inline" action="?controller=evento&action=searchEvento" method="post">
		<div class="form-group row">
			<div class="col-xs-4">
				<input class="form-control" id="fecha" name="fecha" type="date">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-search"> </span> Buscar</button>
			</div>
		</div>
	</form>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
				<th>ID</th>
                 <th>tema</th>
                 <th>fecha</th>
                 <th>ubicacion</th>
                 <th>Aforo</th>
                 <th>descripcion</th>
                 <th>Hora</th>
			 <th colspan="2" style="text-align: center;">Acciones</th>
				</tr>
				<tbody>
					<?php foreach ( $listaEventos  as $evento) {?>

					
					<tr>
						<td><?php echo $evento->getIdevento() ;?></td>
						<td><?php echo $evento->getTema(); ?></td>
                        <td><?php echo $evento->getFecha(); ?></td>
						<td><?php echo $evento->getUbi(); ?></td>
                        <td><?php echo $evento->getCapacidad_total(); ?></td>
                        <td><?php echo $evento->getDescripcion(); ?></td>
                        <td><?php echo $evento->getHoraini(); ?></td>
                        
					<!-- <td><img src="data:image/jpg;base64, <?php // echo base64_encode($evento->getImg()); ?>" /></td>  -->
						
						<td><a  class="btn btn-outline-info" href="?controller=evento&&action=deleteEvento&&id=<?php echo $evento->getIdevento() ?>">Eliminar</a> </td>
						<td> <a class="btn btn-outline-danger" href="?controller=evento&&action=updateshowSucursal&&id=<?php  echo $evento->getIdevento()?>"> Actualizar</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>

					</center>

	<header>
<?php
  include('cabecera.php');

 ?>
</header>

<center>

<div class="container">
	<h2>Lista de reservas Normales</h2>
	<a  class="btn btn-outline-info" href="?controller=reservaNormal&&action=registerReservaN">Reservar</a>

	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
				<th>ID</th>
                <th>Fecha</th>
                <th>Hora de inicio</th>
                 <th>Cliente</th>
                <th>sucursal</th>
                <th>Horas Reservadas</th>
                <th>Lugares</th>
					<th colspan="2"  style="text-align: center;">Acciones</th>
				</tr>
				<tbody>
					
					<?php foreach ( $listaReservaN  as $reservas) {?>

					
					<tr>
						<td><?php echo $reservas->getId();?></td>
						<td><?php echo $reservas->getFecha(); ?></td>
                        <td><?php echo $reservas->getHora(); ?></td>
						<td><?php echo $reservas->getCliente(); ?></td>
						<td><?php echo $reservas->getSucursal(); ?></td>
                        <td><?php echo $reservas->getTotalHoras(); ?></td>
						<td><?php echo $reservas->getLugares(); ?></td>
						
						<td><a  class="btn btn-outline-info" href="?controller=reservaNormal&&action=updateshowReservaN&&id=<?php echo $reservas->getId()?>">Editar</a> </td>
						<td><a  class="btn btn-outline-info" href="?controller=reservaNormal&&action=deleteReservaN&&id=<?php echo $reservas->getId()?>">Eliminar</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>

					</center>
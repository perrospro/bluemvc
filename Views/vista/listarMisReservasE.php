	<header>
<?php
  include('cabecera.php');

 ?>
</header>

<center>

<div class="container">
	
	<h2>Lista de reservas de mis reservas</h2>
	<form class="form-inline" action="?controller=reservaEvento&action=searchReserva" method="post">
		<div class="form-group row">
		
		</div>
		<div class="form-group row">
			
		</div>
	</form>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
				<th>ID</th>
                 <th>Cliente</th>
                <th>evento</th>
                <th>boletos</th>
					<th colspan="2" style="text-align: center;">Acciones</th>
				</tr>
				<tbody>
					<?php foreach ( $listaReservaE  as $reservas) {?>

					
					<tr>
						<td><?php echo $reservas->getIdreserva();?></td>
						<td><?php echo $reservas->getCliente(); ?></td>
						<td><?php echo $reservas->getEvento(); ?></td>
						<td><?php echo $reservas->getBoletos(); ?></td>
						
						<td><a  class="btn btn-outline-info" href="?controller=reservaEvento&&action=confirmarEliminacion&&id=<?php echo $reservas->getIdreserva()?>">Eliminar</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>

					</center>
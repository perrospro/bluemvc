
	<header>
<?php
     session_start(); 
  include('cabecera.php');

 ?>
</header>

<center>

<div class="container">
	
	<h2>Lista de reservas de Eventos</h2>
	<form class="form-inline" action="?controller=reservaEvento&action=searchReserva" method="post">
		<div class="form-group row">
			<div class="col-xs-4">
                
            <select class="form-control"  name="evento" id="evento">
            <option value="">Buscar por evento</option>
                                <?php foreach (  $listaEventos  as $evento) {?>
                                    <option value="<?php echo $evento->getIdevento() ;?>"><?php echo $evento->getTema();?></option>
                               <?php
                                   }
                               ?>

                           </select>
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
                 <th>Cliente</th>
                <th>evento</th>
                <th>boletos</th>
					<th  style="text-align: center;">Acciones</th>
				</tr>
				<tbody>
					<?php foreach ( $listaReservaE  as $reservas) {?>

					
					<tr>
						<td><?php echo $reservas->getIdreserva();?></td>
						<td><?php echo $reservas->getCliente(); ?></td>
						<td><?php echo $reservas->getEvento(); ?></td>
						<td><?php echo $reservas->getBoletos(); ?></td>
						
						<td><a  class="btn btn-outline-info" href="?controller=reservaEvento&&action=deleteEvento&&id=<?php echo $reservas->getIdreserva() ?>">Eliminar</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>

					</center>
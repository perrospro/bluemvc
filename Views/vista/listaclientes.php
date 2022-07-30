
	<header>
<?php
  include('cabecera.php');
 ?>
</header>

<center>

<div class="container">
	
	<h2>Lista De clientes</h2>
	<a  class="btn btn-primary" style="margin-top: 25px ;" href="?controller=persona&action=register">Agregar cliente</a>
	<a  class="btn btn-primary" style="margin-top: 25px ;" href="?controller=persona&action=regresar">Agregar cliente</a>
	<form class="form-inline" action="?controller=persona&action=search" method="post">
		<div class="form-group row">
			<div class="col-xs-4">
				<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Busqueda por nombre">
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
                 <th>Nombre</th>
                <th>Nickname</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Recompensa</th>
					<th colspan="2" style="text-align: center;">Acciones</th>
				</tr>
				<tbody>
					<?php foreach ($listaClientes as $clientes) {?>

					
					<tr>
						<td><?php echo $clientes->getIdusuario();?></td>
						<td><?php echo $clientes->getNombre(); ?></td>
						<td><?php echo $clientes->getUsuario(); ?></td>
						<td><?php echo $clientes->getTelefono(); ?></td>
						<td><?php echo $clientes->getCorreo(); ?></td>
						<td><?php echo $clientes->getReconpensa(); ?></td>
						
						<td><a  class="btn btn-outline-info" href="?controller=persona&&action=delete&&id=<?php echo $clientes->getIdusuario() ?>">Eliminar</a> </td>
						<td> <a class="btn btn-outline-danger" href="?controller=persona&&action=updateshow&&id=<?php  echo $clientes->getIdusuario()?>"> Actualizar</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>

					</center>
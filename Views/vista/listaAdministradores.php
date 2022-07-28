
	<header>
<?php
    session_start();
  include('cabecera.php');
 ?>
</header>


<center>
<div class="container">
	
	<h2>Lista De administradores</h2>
	<a  class="btn btn-primary" style="margin-top: 25px ;" href="?controller=persona&action=registeradministrador">Agregar Administradores</a>
	<form class="form-inline" action="?controller=persona&action=searchAdministrador" method="post">
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
				<th colspan="2" style="text-align: center;">Acciones</th>
				</tr>
				<tbody>
					<?php foreach ($listaAdministradores as $administrador) {?>

					
					<tr>
						<td><?php echo $administrador->getIdusuario();?></td>
						<td><?php echo $administrador->getNombre(); ?></td>
						<td><?php echo $administrador->getUsuario(); ?></td>
						<td><?php echo $administrador->getTelefono(); ?></td>
						<td><?php echo $administrador->getCorreo(); ?></td>
						
						<td><a  class="btn btn-outline-info" href="?controller=persona&&action=deletadministrador&&id=<?php echo $administrador->getIdusuario() ?>">Eliminar</a> </td>
						<td> <a class="btn btn-outline-danger" href="?controller=persona&&action=updateshowadministrador&&id=<?php  echo $administrador->getIdusuario()?>"> Actualizar</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>

					</center>


	<header>
<?php
  include('cabecera.php');
 ?>
</header>

<center>
<div class="container">
	
	<h2>Lista De operadoresç</h2>
	<a  class="btn btn-primary" style="margin-top: 25px ;" href="?controller=persona&action=registeroperador">Agregar Operadores</a>
	<form class="form-inline" action="?controller=persona&action=searchoperador" method="post">
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
					<?php foreach ($listaOperadores as $operador) {?>

					
					<tr>
						<td><?php echo $operador->getIdusuario();?></td>
						<td><?php echo $operador->getNombre(); ?></td>
						<td><?php echo $operador->getUsuario(); ?></td>
						<td><?php echo $operador->getTelefono(); ?></td>
						<td><?php echo $operador->getCorreo(); ?></td>
						
						<td><a  class="btn btn-outline-info" href="?controller=persona&&action=deleteoperador&&id=<?php echo $operador->getIdusuario() ?>">Eliminar</a> </td>
						<td> <a class="btn btn-outline-danger" href="?controller=persona&&action=updateshowoperador&&id=<?php  echo $operador->getIdusuario()?>"> Actualizar</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>

					</center>
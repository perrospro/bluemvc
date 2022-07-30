
	<header>
<?php
  include('cabecera.php');

 ?>
</header>

<center>

<div class="container">
	
	<h2>Lista De Sucursales</h2>
	<a  class="btn btn-primary" style="margin-top: 25px ;" href="?controller=sucursal&action=registerSucursal">Agregar Sucursales</a>
	<form class="form-inline" action="?controller=sucursal&action=searchSucursal" method="post">
		<div class="form-group row">
			<div class="col-xs-4">
				<input class="form-control" id="ubicacion" name="ubicacion" type="text" placeholder="Busqueda por nombre">
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
                <th>ubicacion</th>
                <th>Teléfono Extencion</th>
                <th>capacidad</th>
					<th colspan="2" style="text-align: center;">Acciones</th>
				</tr>
				<tbody>
					<?php foreach ( $listaSucursales  as $sucursales) {?>

					
					<tr>
						<td><?php echo $sucursales->getId();?></td>
						<td><?php echo $sucursales->getNombre(); ?></td>
						<td><?php echo $sucursales->getUbicacion(); ?></td>
						<td><?php echo $sucursales->getExtencionT(); ?></td>
						<td><?php echo $sucursales->getCapacidad(); ?></td>
						
						<td><a  class="btn btn-outline-info" href="?controller=sucursal&&action=deleteSucursal&&id=<?php echo $sucursales->getId() ?>">Eliminar</a> </td>
						<td> <a class="btn btn-outline-danger" href="?controller=sucursal&&action=updateshowSucursal&&id=<?php  echo $sucursales->getId()?>"> Actualizar</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>

					</center>
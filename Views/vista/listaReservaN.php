
	<header>
<?php
  include('cabecera.php');

 ?>
</header>

<center>

<div class="container">
	<h2>Lista de reservas Normales</h2>
	<a  class="btn btn-outline-info" href="?controller=reservaNormal&&action=verMisReservasN&&id=<?php echo $_SESSION['idUser'] ?>">Ver mis reservas</a>

	<form class="form-inline" action="?controller=reservaNormal&action=searchReservaN" method="POST">
		<div class="form-group row">
			<div class="col-xs-4">
                
             <select class="form-control"  name="cliente" id="cliente"> 
            <option value="">Buscar por cliente</option>
                                <?php  foreach (  $listaClientes  as $clientes) {?>
                                    <option value="<?php echo $clientes->getIdusuario() ;?>"><?php  echo $clientes->getUsuario();?></option>
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
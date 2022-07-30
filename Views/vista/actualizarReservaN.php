
	<header>
<?php
  include('cabecera.php');
 ?>
</header>
<center>

<div class="container" style="width: 50%;">
	<h2>Actualizar Reserva Normales </h2>
	<form  action=" ?controller=reservaNormal&&action=updateReservaN" method="POST">
	<input type="hidden" name="id" value="<?php echo $reservaN->getId() ?>" >

  <label for="text"><strong>Cliente</strong></label>
      <input type="text" class="form-control"  id="cliente" name="cliente" value="<?php echo $reservaN->getCliente() ?>"  disabled>

		<label for="text"><strong>Fecha:</strong> </label>
      <input type="date" class="form-control" id="fecha" placeholder="Ingrese la fecha" name="fecha" value="<?php echo $reservaN->getFecha() ?>" required>

      <label for="text"> <strong>Hora de inicio:</strong></label>
      <input type="time" class="form-control" id="hora" placeholder="Ingrese la hora" name="hora" value="<?php echo $reservaN->getHora() ?>"  required>

    

      <label for="text"><strong>Sucursal</strong></label>
      <select class="form-control"  name="sucursal" id="sucursal">
                                <?php foreach ( $listaSucursales  as $sucursal) {
                                    if($reservaN->getSucursal() == $sucursal->getNombre()){
                                        ?>
                         <option value="<?php echo $sucursal->getId(); ?>" selected >  <?php echo $sucursal->getNombre();?> </option>
                                        <?php 
                                        
                                    }else{
                                        ?>
            <option value="<?php echo $sucursal->getId(); ?>" >  <?php echo $sucursal->getNombre();?> </option>
                               <?php
                                }
                                   }
                               ?>

                           </select>

      <label for="text"><strong>Horas Reservadas</strong></label>
      <input class="form-control"  type="number" name="totalhora" value="<?php echo $reservaN->getTotalHoras() ?>" >

      <label for="text"><strong>Lugares</strong></label>
      <input class="form-control"  type="number" name="lugares" value="<?php echo $reservaN->getLugares() ?>" >
    </div>
    <br>
		<button type="submit" class="btn btn-outline-primary">Actualizar</button>

	</form>
</div>
</center>

	<header>
<?php
  include('cabecera.php');
 ?>
</header>
<center>

<div class="container" style="width: 50%;">
	<h2>Crear Registro Normales </h2>
	<form  action=" ?controller=reservaNormal&&action=saveReservaN" method="POST">

    <label for="text"><strong>Fecha:</strong> </label>
      <input type="date" class="form-control" id="fecha" placeholder="Ingrese la fecha" name="fecha" required>

      <label for="text"> <strong>Hora de inicio:</strong></label>
      <input type="time" class="form-control" id="hora" placeholder="Ingrese la hora" name="hora"   required>
      <input type="number" class="form-control"  id="cli" name="cli" value="<?php echo $_SESSION['idUser'] ?>"  disabled>

      <label for="text"><strong>Sucursal</strong></label>
      <select class="form-control"  name="sucursal" id="sucursal">
                                <?php foreach ( $listaSucursales  as $sucursal) { 
                                        ?>
            <option value="<?php echo $sucursal->getId(); ?>" >  <?php echo $sucursal->getNombre();?> </option>
                               <?php
                                }
                               ?>

                           </select>
      <label for="text"><strong>Horas Reservadas</strong></label>
      <input class="form-control"  type="number" name="totalhora"  >

      <label for="text"><strong>Lugares</strong></label>
      <input class="form-control"  type="number" name="lugares"  >
    </div>
    <br>
		<button type="submit" class="btn btn-outline-primary">Registrar</button>

	</form>
</div>
</center>
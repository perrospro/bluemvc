<header>
  <?php
  include('cabecera.php');
  ?>
</header>
<center>

  <div class="container" style="width: 50%;">
    <h2>Actualizar Informacion de evento </h2>
    <form action="?controller=evento&&action=updateEvento" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="idevento" value="<?php echo $evento->getIdevento() ?>">
      <label for="text"><strong>tema:</strong> </label>
      <input type="text" class="form-control" id="tema" placeholder="Ingrese el tema" name="tema" value="<?php echo $evento->getTema() ?>" required>

      <label for="text"> <strong>fecha:</strong></label>
      <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $evento->getFecha() ?>" required>

      <label for="text"><strong>ubicacion</strong></label>

      <select class="form-control" name="ubi" id="ubi">
        <?php foreach ($listaSucursales  as $sucursal) {
          if ($sucursal->getNombre() == $evento->getUbi()) {
        ?>
            <option value="<?php echo $sucursal->getId(); ?>" selected> <?php echo $sucursal->getNombre(); ?> </option>
          <?php
          } else {
          ?>
            <option value="<?php echo $sucursal->getId(); ?>"> <?php echo $sucursal->getNombre(); ?> </option>
        <?php
          }
        }
        ?>

      </select>

      <label for="text"><strong>Aforo</strong></label>
      <input type="number" class="form-control" id="capacidad_total" name="capacidad_total" value="<?php echo $evento->getCapacidad_total() ?>" required>
      <input type="hidden" class="form-control" id="capacidad_dis" name="capacidad_dis" value="<?php echo $evento->getCapacidad_dis() ?>" required>

      <label for="text"><strong>descripcion</strong></label>
      <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $evento->getDescripcion() ?>" required>


      <input type="hidden" name="estatus" value="<?php echo $evento->getEstatus() ?>">

      <label for="text"><strong>hora de inicio</strong></label>
      <input type="number" class="form-control" id="horaini" name="horaini" value="<?php echo $evento->getHoraini() ?>" required>

      <label for="text"><strong>Imagen</strong></label>
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="hidden" value="<?php echo $evento->getImg()?>">
      <img src="<?php echo $evento->getImg()?>" alt="..." width="100">

  </div>
  <br>
  <button type="submit" class="btn btn-outline-primary">Actualizar</button>

  </form>
  </div>
</center>
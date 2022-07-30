
	<header>
<?php
  include('cabecera.php');
 ?>
</header>
<center>
<div class="container" style="width: 50%;">
  <h2>Registro de Eventos</h2>
  <form action="?controller=evento&&action=saveEvento" method="POST">
    <div class="form-group">
      <label for="text"><strong>tema :</strong> </label>
      <input type="text" class="form-control" id="tema" placeholder="Ingrese el tema" name="tema"  required>

      <label for="text"><strong>fecha:</strong> </label>
      <input type="date" class="form-control" id="fecha"  name="fecha"  required>

      <label for="text"> <strong>ubi:</strong> </label>
                                <select class="form-control"  name="ubi" id="ubi">
                                
                                 	<?php foreach ( $listaSucursales  as $sucursal) {?>
                                            <option value="<?php echo $sucursal->getId(); ?>"><?php echo $sucursal->getNombre();?> </option>
                                    <?php
                                        }
                                    ?>

                                </select>

      <label for="text"> <strong>Capacidad total:</strong></label>
      <input type="number" class="form-control" id="capacidad_total" placeholder="Ingrese la capacidad" name="capacidad_total"  required>

      <input type="hidden" class="form-control" id="capacidad_dis" placeholder="Ingrese la capacidad" name="capacidad_dis"  required>

  <label for="text"> <strong>descripcion:</strong></label>
      <input type="text" class="form-control" id="descripcion" placeholder="Ingrese la descripcion" name="descripcion"  required>
     
      <label for="text"> <strong>hora de inicio:</strong></label>
      <input type="text" class="form-control" id="horaini" placeholder="Ingrese la hora" name="horaini"  required>
      
      <label for="text"> <strong>Imagen:</strong></label>
      <input type="text" class="form-control" id="img" name="img" >
    </div>

    <button type="submit" class="btn btn-outline-primary"">crear</button> <a style="padding:10px ;"  class="btn btn-outline-info" href="?controller=evento&&action=showEvento">Regresar</a>

  </form>
</div>
</center>
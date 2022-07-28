
	<header>
<?php
    session_start();
  include('cabecera.php');
 ?>
</header>
<center>

<div class="container" style="width: 50%;">
	<h2>Actualizar Informacion </h2>
	<form action="?controller=persona&&action=update" method="POST">
	<input type="hidden" name="idusuario" value="<?php echo $persona->getIdusuario() ?>" >
		<label for="text"><strong>Nombre:</strong> </label>
      <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre" name="nombre" value="<?php echo $persona->getNombre() ?>" required>

      <label for="text"> <strong>correo:</strong></label>
      <input type="email" class="form-control" id="correo" placeholder="Ingrese el correo" name="correo" value="<?php echo $persona->getCorreo() ?>"  required>

      <label for="text"><strong>NickName</strong></label>
      <input type="text" class="form-control"  id="usuario" name="usuario" value="<?php echo $persona->getUsuario() ?>"  required>

      <input type="hidden" name="clave" value="<?php echo $persona->getClave() ?>" >
      
      <input type="hidden" name="rol" value="<?php echo $persona->getRol() ?>" >
      <input type="hidden" name="estatus" value="<?php echo $persona->getEstatus() ?>" >

      <label for="text"><strong>telefono:</strong> </label>
      <input type="text" class="form-control" id="telefono" placeholder="Ingrese el procesador" name="telefono" value="<?php echo $persona->getTelefono() ?>"  required>

      <label for="text"><strong>reconpensa:</strong> </label>
      <input type="text" class="form-control" id="reconpensa" placeholder="Ingrese la descripcion" name="reconpensa" value="<?php echo $persona->getReconpensa() ?>"  required>
    </div>
    <br>
		<button type="submit" class="btn btn-outline-primary">Actualizar</button>

	</form>
</div>
</center>
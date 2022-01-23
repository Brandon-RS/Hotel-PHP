<main class="cuerpo_td">
  <div class="landspace_emp">
    <img src="assets/img/Banner_habitacion.png" alt="Lobby">
  </div>
  <div class="titulo_emp">
    <h1><?=$titulo?> Habitaciones</h1>
    <p>Complete todos los espacios en blanco</p> <br> <br>
  </div>
  <div>
    <form class="form_all" method="post" action="?c=habitacion&a=Guardar">
      <div class="conten_form_hb">
        <div>
          <input name="ID" type="hidden" value="<?=$p->getIdHabitacion()?>">
        </div>

        <div class="der">
          <label for="Numerotxt">Numero</label>
          <input required name="Numerotxt" type="text" placeholder="Numero Habitacion" value="<?=$p->getNumero()?>">
        </div>
        <div class="izq">
          <label for="Pisotxt">Piso</label>
          <input required name="Pisotxt" type="text" placeholder="Numero Piso" value="<?=$p->getPiso()?>">
        </div>
        <div class="der">
          <label for="Caractxt">Caracteristicas</label>
          <input required name="Caractxt" type="text" placeholder="Caracteristicas" value="<?=$p->getCaracteristicas()?>">
        </div>
        <div class="izq">
          <label for="Descriptxt">Descripcion</label>
          <input required name="Descriptxt" type="text" placeholder="Descripcion" value="<?=$p->getDescripcion()?>">
        </div>
        <div class="der">
          <label for="tipoHabtxt">Tipo Habitacion</label>
          <select name="tipoHabtxt">
            <option value="INDIVIDUAL" <?php echo $p->getTipoHabitacion() == "INDIVIDUAL" ? 'selected' : ''; ?>>INDIVIDUAL</option>
            <option value="DOBLE" <?php echo $p->getTipoHabitacion() == "DOBLE" ? 'selected' : ''; ?>>DOBLE</option>
            <option value="MATRIMONIAL" <?php echo $p->getTipoHabitacion() == "MATRIMONIAL" ? 'selected' : ''; ?>>MATRIMONIAL</option>
          </select>
        </div>
        <div class="izq">
          <label for="Preciotxt">Precio</label>
          <input required name="Preciotxt" type="float" placeholder="Precio" value="<?=$p->getPrecio()?>">
        </div>
        <div class="der">
          <label for="Estadotxt">Estado</label>
          <select name="Estadotxt">
            <option value="DISPONIBLE" <?php echo $p->getEstado() == "DISPONIBLE" ? 'selected' : ''; ?>>DISPONIBLE</option>
            <option value="OCUPADA" <?php echo $p->getEstado() == "OCUPADA" ? 'selected' : ''; ?>>OCUPADA</option>
            <option value="MANTENIMIENTO" <?php echo $p->getEstado() == "MANTENIMIENTO" ? 'selected' : ''; ?>>MANTENIMIENTO</option>
          </select>
        </div>
        <!--<div>
          <label for="NEstadotxt">NEstado</label>
          <input required name="NEstadotxt" type="number" placeholder="NEstado" value="<?=$p->getNEstado()?>">
        </div>
        <div>-->
      </div>
      <button class="boton" type="submit"><?=$titulo?></button>
    </form>
  </div>
</main>

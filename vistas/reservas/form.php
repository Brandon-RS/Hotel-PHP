<main class="cuerpo_td">
  <div class="landspace_emp">
    <img src="assets/img/Banner_habitacion.png" alt="Lobby">
  </div>
  <div class="titulo_emp">
    <h1><i></i><?=$titulo?> Reserva</h1>
    <p>Complete todos los espacios en blanco</p> <br> <br>
  </div>
  <div>
    <form class="form_all" method="post" action="?c=reservaus&a=Actualizar">
      <div class="conten_form_hb">
        <div>
          <input name="ID" type="hidden" value="<?=$p->getIdReserva()?>">
        </div>

        <div class="der">
          <label for="Habitaciontxt">Habitacion</label>
          <input required name="Habitaciontxt" type="text" value="<?=$p->getIdHabitacion()?>">
        </div>
        <div class="der">
          <label for="Huespedtxt">Huesped</label>
          <input required name="Huespedtxt" type="text" value="<?=$p->getIdHuesped()?>">
        </div>

        <div class="der">
          <label for="fch_ingresotxt">Fecha de Ingreso</label>
          <input required name="fch_ingresotxt" type="date" value="<?=$p->getFechaIngreso()?>">
        </div>
        <div class="der">
          <label for="fch_salidatxt">Fecha de Salida</label>
          <input required name="fch_salidatxt" type="date" value="<?=$p->getFechaSalida()?>">
        </div>

        <div class="der">
          <label for="Usuariotxt">Usuario</label>
          <input required name="Usuariotxt" type="text" value="<?=$p->getIdUsuario()?>">
        </div>

        <div class="der">
          <label for="Totaltxt">Total S/</label>
          <input required name="Totaltxt" type="text" value="<?=$p->getCostoAlojamiento()?>">
        </div>
        <div class="der">
          <label for="Observacionestxt">Observaciones</label>
          <input required name="Observacionestxt" type="text" placeholder="Observaciones" value="<?=$p->getObservaciones()?>">
        </div>
        <div class="der">
          <label for="Estadotxt">Estado</label>
          <select name="Estadotxt">
            <option value="POR PAGAR" <?php echo $p->getEstado() == "POR PAGAR" ? 'selected' : ''; ?>>POR PAGAR</option>
            <option value="PAGADA" <?php echo $p->getEstado() == "PAGADA" ? 'selected' : ''; ?>>PAGADA</option>
            <option value="CANCELADA" <?php echo $p->getEstado() == "CANCELADA" ? 'selected' : ''; ?>>CANCELADA</option>
          </select>
        </div>
      </div>
      <button class="boton" type="submit"><?=$titulo?></button>
    </form>
  </div>
</main>

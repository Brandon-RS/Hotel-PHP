<main class="cuerpo_td">
  <div class="landspace_emp">
    <img src="assets/img/Banner_emp.png" alt="Lobby">
  </div>
  <div class="titulo_emp">
    <h1>Reserva una habitacion <?=$tipo_hbt?></h1> <br>
    <p>Se realizará una reserva para <?=$usuario_mail?></p>
    <p>Complete todos los espacios en blanco</p> <br>
  </div>
  <div>
    <form class="form_all" method="post" action="?c=reserva&a=Confirmar_reserva&t=<?=$tipo_hbt?>">

      <div class="mail_input" >
        <label for="mailtxt">Reserva para</label>
        <input required name="mailtxt" type="email" value="<?=$usuario_mail?>" disabled>
      </div>

      <div class="conten_form_res">
        <div class="der">
          <label for="fch_reservatxt">Fecha de Reserva</label>
          <input required name="fch_reservatxt" type="date" value="<?=$fch_actual?>" disabled>
        </div>
        <div class="izq">
          <label for="fch_ingresotxt">Fecha de Ingreso</label>
          <input required name="fch_ingresotxt" type="date">
        </div>
        <div class="izq">
          <label for="fch_salidatxt">Fecha de Salida</label>
          <input required name="fch_salidatxt" type="date">
        </div>
        <div class="der">
          <label for="Observacionestxt">Observaciones</label>
          <input required name="Observacionestxt" type="text" placeholder="Observaciones">
        </div>

      </div>

      <button class="boton" type="submit">Reservar</button>
    </form>
  </div>
</main>

<main class="cuerpo_td">
  <div class="landspace_emp">
    <img src="assets/img/Banner_emp.png" alt="Lobby">
  </div>
  <div class="titulo_emp">
    <h1>Confirma tu reserva</h1> <br>
    <p>Se realizará una reserva para <?=$mail?></p>
  </div>
  <div>
    <form class="form_confirm" method="post" action="?c=reserva&a=Guardar&t=<?=$tipo_hbt?>">
      <div class="conten_form_confirm">

        <table>
          <tr>
            <td >Tipo de Habitacion</td>
            <td class="flecha_td"> → </td>
            <td><?=$tipo_hbt?></td>
          </tr>
          <tr>
            <td>Para</td>
            <td class="flecha_td"> → </td>
            <td><?=$mail?></td>
          </tr>
          <tr>
            <td>Fecha de reserva</td>
            <td class="flecha_td"> → </td>
            <td><?=$fch_reserva_conf?></td>
          </tr>
          <tr>
            <td>Inicio de reserva</td>
            <td class="flecha_td"> → </td>
            <td><?=$fch_ingreso_conf?></td>
          </tr>
          <tr>
            <td>Fin de la reserva</td>
            <td class="flecha_td"> → </td>
            <td><?=$fch_salida_conf?></td>
          </tr>
          <tr>
            <td>Sus observaciones</td>
            <td class="flecha_td"> → </td>
            <td><?=$observ_conf?></td>
          </tr>
          <tr>
            <td>Numero de días</td>
            <td class="flecha_td"> → </td>
            <td><?=$dias?></td>
          </tr>
          <tr>
            <td>Total a pagar</td>
            <td class="flecha_td"> → </td>
            <td><?=$costo?></td>
          </tr>
        </table>

        <input required name="mailtxt" type="hidden" value="">
        <input required name="fch_reservatxt" type="hidden" value="<?=$fch_reserva_conf?>">
        <input required name="fch_ingresotxt" type="hidden" value="<?=$fch_ingreso_conf?>">
        <input required name="fch_salidatxt" type="hidden" value="<?=$fch_salida_conf?>">
        <input required name="Observacionestxt" type="hidden" placeholder="Observaciones" value="<?=$observ_conf?>">
        <input required name="costotxt" type="hidden" value="<?=$costo?>">

      </div>

      <button class="boton" type="submit">Confirmar Reserva</button>
    </form>
  </div>
</main>

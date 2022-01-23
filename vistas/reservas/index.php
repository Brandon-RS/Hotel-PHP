<main class="cuerpo_td">
  <div class="landspace_emp">
    <img src="assets/img/Banner_habitacion.png" alt="Lobby">
  </div>
  <div class="titulo_emp">
    <div>
      <h1>Todos las Reservas</h1>
      <p>Lista de las reservas con las que cuenta el Hotel Naranjo</p>
    </div> <br> <br> <br>
    <a class="insertar" href="?c=acces&a=habitaciones">REALIZAR UNA NUEVA RESERVA</a>
  </div>
  <div >
    <table class="tabla">
      <thead>
        <tr>
          <th>Numero</th>
          <th>Tipo</th>
          <th>Huesped</th>
          <th>Usuario</th>
          <th>Reserva</th>
          <th>Ingreso</th>
          <th>Salida</th>
          <th>Total S/</th>
          <th>Observaciones</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->modelo->Listar() as $r): ?>
        <tr>
          <td><?=$r->Num_hbt?></td>
          <td><?=$r->Tipo_Hbt?></td>
          <td><?=$r->Email_hu?></td>
          <td><?=$r->Usuario_r?></td>
          <td><?=$r->fechaReserva?></td>
          <td><?=$r->fechaIngreso?></td>
          <td><?=$r->fechaSalida?></td>
          <td><?=$r->CostoAlojamiento?></td>
          <td><?=$r->Observaciones?></td>
          <td><?=$r->Estado?></td>

          <td class="td_center">
            <a class="accion_css" href="?c=reservaus&a=FormCrear&id=<?=$r->idReserva?>"> <img class="accion_img" src="assets/img/icons/editar.png" alt=""> </a>
            <img class="accion_img" src="assets/img/icons/flecha.png">
            <a class="accion_css" href="?c=reservaus&a=Borrar&id=<?=$r->idReserva?>"> <img class="accion_img" src="assets/img/icons/eliminar.png" alt=""> </a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>

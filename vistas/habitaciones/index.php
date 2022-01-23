<main class="cuerpo_td">
  <div class="landspace_emp">
    <img src="assets/img/Banner_habitacion.png" alt="Lobby">
  </div>
  <div class="titulo_emp">
    <div>
      <h1><i></i>Todas las Habitaciones</h1>
      <p>Lista de las habitaciones con las que cuenta el Hotel Naranjo</p>
    </div> <br> <br> <br>
    <a class="insertar" href="?c=habitacion&a=FormCrear">AGREGAR UNA NUEVA HABITACION</a>
  </div>
  <div>
    <table class="tabla">
      <thead>
        <tr>
          <!--<th>ID</th>-->
          <th>Numero</th>
          <th>Piso</th>
          <th>Caracteristicas</th>
          <th>Descripcion</th>
          <th>TipoHabitacion</th>
          <th>Precio</th>
          <th>Estado</th>
          <!--<th>nEstado</th>-->
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->modelo->Listar() as $r) : ?>
          <tr>
            <!--<td><?= $r->idHabitacion ?></td>-->
            <td class="td_center"><?= $r->Numero ?></td>
            <td class="td_center"><?= $r->Piso ?></td>
            <td><?= $r->Caracteristicas ?></td>
            <td><?= $r->Descripcion ?></td>
            <td><?= $r->TipoHabitacion ?></td>
            <td class="td_center"><?= $r->Precio ?></td>
            <td><?= $r->Estado ?></td>
            <!--<td><?= $r->NEstado ?></td>-->

            <td class="td_center">
              <a class="accion_css" href="?c=habitacion&a=FormCrear&id=<?= $r->idHabitacion ?>"> <img class="accion_img" src="assets/img/icons/editar.png" alt=""> </a>
              <img class="accion_img" src="assets/img/icons/flecha.png">
              <a class="accion_css" href="?c=habitacion&a=Borrar&id=<?= $r->idHabitacion ?>"> <img class="accion_img" src="assets/img/icons/eliminar.png" alt=""> </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>
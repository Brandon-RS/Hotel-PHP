<main class="cuerpo_td">
  <div class="banner_perfil">
    <h1>INFORMACIÓN DEL PERFIL</h1>
  </div>
  <nav class="navegacion_perfil">
    <ul>
      <li> <a href="?c=perfil">PERFIL</a> </li>
      <li> <a href="?c=perfil&a=misreservas">RESERVAS</a> </li>
      <li> <a href="?c=perfil&a=Cerrar_sesion">CERRAR SESIÓN</a> </li>
    </ul>
  </nav>
  <div class="cuerpo_mis_reservas">
    <table class="tabla">
      <thead>
        <tr>
          <!--<th>ID</th>-->
          <th>Habitacion</th>
          <th>Tipo</th>
          <th>Reserva</th>
          <th>Ingreso</th>
          <th>Salida</th>
          <th>Total S/</th>
          <th>Observaciones</th>
          <th>Estado</th>
          <!--<th>nEstado</th>-->
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->modelo2->Listar_mis_reservas($_SESSION["huesped"]) as $r): ?>
        <tr>
          <td  class="td_center"><?=$r->Num_hbt?></td>
          <td><?=$r->Tipo_Hbt?></td>
          <td><?=$r->fechaReserva?></td>
          <td><?=$r->fechaIngreso?></td>
          <td><?=$r->fechaSalida?></td>
          <td><?=$r->CostoAlojamiento?></td>
          <td><?=$r->Observaciones?></td>
          <td><?=$r->Estado?></td>
          <!--<td><?=$r->NEstado?></td>-->

          <td class="td_center">
            <!--<a class="accion_css" href="?c=huespedu&a=FormCrear&id=<?=$r->idHuesped?>"> <img class="accion_img" src="assets/img/icons/editar.png" alt=""> </a>
            <img class="accion_img" src="assets/img/icons/flecha.png">-->
            <a class="accion_css" href="?c=reserva&a=Borrar&id=<?=$r->idReserva?>"> <img class="accion_img" src="assets/img/icons/eliminar.png" alt=""> </a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>

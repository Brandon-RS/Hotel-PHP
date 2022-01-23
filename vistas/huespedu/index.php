<main class="cuerpo_td">
  <div class="landspace_emp">
    <img src="assets/img/Banner_habitacion.png" alt="Lobby">
  </div>
  <div class="titulo_emp">
    <div>
      <h1>Todos los Huespedes</h1>
      <p>Lista de los huespedes con los que cuenta el Hotel Naranjo</p>
    </div> <br> <br> <br>
    <a class="insertar" href="?c=huespedu&a=FormCrear">AGREGAR UN NUEVO HUESPED</a>
  </div>
  <div >
    <table class="tabla">
      <thead>
        <tr>
          <!--<th>ID</th>-->
          <th>Numero</th>
          <th>Apellidos</th>
          <th>Email</th>
          <th>Contraseña</th>
          <th>Tipo Documento</th>
          <th>Num Documento</th>
          <th>Procedencia</th>
          <th>Telefono</th>
          <th>Estado</th>
          <!--<th>nEstado</th>-->
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->modelo->Listar() as $r): ?>
        <tr>
          <!--<td><?=$r->idHuesped?></td>-->
          <td><?=$r->Nombre?></td>
          <td><?=$r->Apellidos?></td>
          <td><?=$r->Email?></td>
          <td><?=$r->Password?></td>
          <td><?=$r->TipoDocumento?></td>
          <td><?=$r->NumDocumento?></td>
          <td><?=$r->Procedencia?></td>
          <td><?=$r->Telefono?></td>
          <td><?=$r->Estado?></td>
          <!--<td><?=$r->NEstado?></td>-->

          <td class="td_center">
            <a class="accion_css" href="?c=huespedu&a=FormCrear&id=<?=$r->idHuesped?>"> <img class="accion_img" src="assets/img/icons/editar.png" alt=""> </a>
            <img class="accion_img" src="assets/img/icons/flecha.png">
            <a class="accion_css" href="?c=huespedu&a=Borrar&id=<?=$r->idHuesped?>"> <img class="accion_img" src="assets/img/icons/eliminar.png" alt=""> </a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>

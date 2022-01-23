<main class="cuerpo_td">
  <div class="landspace_emp">
    <img src="assets/img/Banner_habitacion.png" alt="Lobby">
  </div>
  <div class="titulo_emp">
    <div>
      <h1>Todos los Usuarios</h1>
      <p>Lista de los usuarios que trabajan en el Hotel Naranjo</p>
    </div> <br> <br> <br>
    <a class="insertar" href="?c=usuario&a=FormCrear">AGREGAR UN NUEVO USUARIO</a>
  </div>
  <div >
    <table class="tabla">
      <thead>
        <tr>
          <!--<th>IDtr</th>
          <th>IDus</th>-->
          <th>ID-TRB</th>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Tipo Doc</th>
          <th>Num Doc</th>
          <th>Sueldo</th>
          <th>Direccion</th>
          <th>Telefono</th>
          <th>Email</th>
          <th>Acceso</th>
          <th>Password</th>
          <th>Estado</th>
          <!--<th>nEstado</th>-->
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->modelo->Listar() as $r): ?>
        <tr>
          <!--<td><?=$r->idTrabajador?></td>
          <td><?=$r->idUsuario?></td>-->
          <td><?=$r->idPuestoTrabajo?></td>
          <td><?=$r->Nombre?></td>
          <td><?=$r->Apellidos?></td>
          <td><?=$r->TipoDocumento?></td>
          <td><?=$r->NumDocumento?></td>
          <td><?=$r->Sueldo?></td>
          <td><?=$r->Direccion?></td>
          <td><?=$r->Telefono?></td>
          <td><?=$r->Email?></td>
          <td><?=$r->Acceso?></td>
          <td><?=$r->Password?></td>
          <td><?=$r->Estado?></td>
          <!--<td><?=$r->NEstado?></td>-->

          <td class="td_center">
            <a class="accion_css" href="?c=usuario&a=FormCrear&id=<?=$r->idUsuario?>"> <img class="accion_img" src="assets/img/icons/editar.png" alt=""> </a>
            <img class="accion_img" src="assets/img/icons/flecha.png">
            <a class="accion_css" href="?c=usuario&a=Borrar&id=<?=$r->idTrabajador?>"> <img class="accion_img" src="assets/img/icons/eliminar.png" alt=""> </a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>

<main class="cuerpo_td">
  <div class="landspace_emp">
    <img src="assets/img/Banner_emp.png" alt="Lobby">
  </div>
  <div class="titulo_emp">
    <div>
      <h1>Todos los empleados</h1>
      <p>Lista de los empleados que trabajan actualmente para el Hotel Naranjo</p>
    </div> <br> <br> <br>
    <a class="insertar" href="?c=empleado&a=FormCrear">AGREGAR UN NUEVO EMPLEADO</a>
  </div>
  <div >
    <table class="tabla">
      <thead>
        <tr>
          <!--<th>ID</th>-->
          <th>ID-TRB</th>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Tipo Doc</th>
          <th>Num Doc</th>
          <th>Sueldo</th>
          <th>Direccion</th>
          <th>Telefono</th>
          <th>Email</th>
          <th>Estado</th>
          <!--<th>nEstado</th>-->
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($this->modelo->Listar() as $r): ?>
        <tr>
          <!--<td><?=$r->idTrabajador?></td>-->
          <td><?=$r->idPuestoTrabajo?></td>
          <td><?=$r->Nombre?></td>
          <td><?=$r->Apellidos?></td>
          <td><?=$r->TipoDocumento?></td>
          <td><?=$r->NumDocumento?></td>
          <td><?=$r->Sueldo?></td>
          <td><?=$r->Direccion?></td>
          <td><?=$r->Telefono?></td>
          <td><?=$r->Email?></td>
          <td><?=$r->Estado?></td>
          <!--<td><?=$r->NEstado?></td>-->

          <td class="td_center">
            <a class="accion_css" href="?c=empleado&a=FormCrear&id=<?=$r->idTrabajador?>"> <img class="accion_img" src="assets/img/icons/editar.png" alt=""> </a>
            <img class="accion_img" src="assets/img/icons/flecha.png">
            <a class="accion_css" href="?c=empleado&a=Borrar&id=<?=$r->idTrabajador?>"> <img class="accion_img" src="assets/img/icons/eliminar.png" alt=""> </a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>

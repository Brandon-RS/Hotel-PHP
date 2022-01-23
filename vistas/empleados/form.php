<main class="cuerpo_td">
  <div class="landspace_emp">
    <img src="assets/img/Banner_emp.png" alt="Lobby">
  </div>
  <div class="titulo_emp">
    <h1><?=$titulo?> Empleado</h1>
    <p>Complete todos los espacios en blanco</p> <br>
  </div>
  <div>
    <form class="form_all" method="post" action="?c=empleado&a=Guardar">
      <div class="conten_form_em">
        <div>
          <input name="ID" type="hidden" value="<?=$p->getIdTrabajador()?>">
        </div>

        <div class="der">
          <label for="Nombretxt">Nombre</label>
          <input required name="Nombretxt" type="text" placeholder="Nombre Empleado" value="<?=$p->getNombre()?>">
        </div>
        <div class="izq">
          <label for="Apellidostxt">Apellidos</label>
          <input required name="Apellidostxt" type="text" placeholder="Apellidos Empleado" value="<?=$p->getApellidos()?>">
        </div>
        <div class="der">
          <label for="tipoDoctxt">Tipo Documento</label>
          <!--<input required name="tipoDoctxt" type="text" placeholder="Tipo Documento" value="<?=$p->getTipoDocumento()?>">-->
          <td>
            <select name="tipoDoctxt">
              <option value="DNI" <?php echo $p->getTipoDocumento() == "DNI" ? 'selected' : ''; ?>>DNI</option>
              <option value="PASAPORTE" <?php echo $p->getTipoDocumento() == "PASAPORTE" ? 'selected' : ''; ?>>PASAPORTE</option>
              <option value="CARNET EXT" <?php echo $p->getTipoDocumento() == "CARNET EXT" ? 'selected' : ''; ?>>CARNET EXT</option>
              <option value="OTROS" <?php echo $p->getTipoDocumento() == "OTROS" ? 'selected' : ''; ?>>OTROS</option>
            </select>
          </td>

        </div>
        <div class="izq">
          <label for="numDoctxt">Numero Documento</label>
          <input required name="numDoctxt" type="text" placeholder="Numero Documento" value="<?=$p->getNumDocumento()?>">
        </div>
        <div class="der">
          <label for="Sueldotxt">Sueldo</label>
          <input required name="Sueldotxt" type="float" placeholder="Sueldo" value="<?=$p->getSueldo()?>">
        </div>
        <div class="izq">
          <label for="Direcciontxt">Direccion</label>
          <input required name="Direcciontxt" type="text" placeholder="Direccion" value="<?=$p->getDireccion()?>">
        </div>
        <div class="der">
          <label for="Telefonotxt">Telefono</label>
          <input required name="Telefonotxt" type="text" placeholder="Telefono" value="<?=$p->getTelefono()?>">
        </div>
        <div class="izq">
          <label for="Emailtxt">Email</label>
          <input required name="Emailtxt" type="email" placeholder="Email" value="<?=$p->getEmail()?>">
        </div>

        <div class="der">
          <label for="Puestotxt">Puesto</label>
          <input required name="Puestotxt" type="text" placeholder="Puesto Trabajo" value="<?=$p->getIdPuestoTrabajo()?>">
        </div>
        <div class="izq">
          <label for="Estadotxt">Estado</label>
          <!--<input required name="Estadotxt" type="text" placeholder="Estado" value="<?=$p->getEstado()?>">-->
          <select name="Estadotxt">
            <option value="ACTIVO" <?php echo $p->getEstado() == "ACTIVO" ? 'selected' : ''; ?>>ACTIVO</option>
            <option value="INACTIVO" <?php echo $p->getEstado() == "INACTIVO" ? 'selected' : ''; ?>>INACTIVO</option>
          </select>
        </div>
      </div>
      <!--<div>
        <label for="NEstadotxt">NEstado</label>
        <input required name="NEstadotxt" type="number" placeholder="NEstado" value="<?=$p->getNEstado()?>">
      </div>
      <div>-->
      <button class="boton" type="submit"><?=$titulo?></button>
    </form>
  </div>
</main>

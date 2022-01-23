<main class="cuerpo_td">
  <div class="landspace_emp">
    <img src="assets/img/Banner_habitacion.png" alt="Lobby">
  </div>
  <div class="titulo_emp">
    <h1><i></i><?=$titulo?> Huespedes</h1>
    <p>Complete todos los espacios en blanco</p> <br> <br>
  </div>
  <div>
    <form class="form_all" method="post" action="?c=huespedu&a=Guardar">
      <div class="conten_form_hp">
        <div>
          <input name="ID" type="hidden" value="<?=$p->getIdHuesped()?>">
        </div>

        <div class="der">
          <label for="Nombretxt">Nombre</label>
          <input required name="Nombretxt" type="text" placeholder="Nombre" value="<?=$p->getNombre()?>">
        </div>
        <div class="izq">
          <label for="Apellidostxt">Apellidos</label>
          <input required name="Apellidostxt" type="text" placeholder="Apellidos" value="<?=$p->getApellidos()?>">
        </div>
        <div class="der">
          <label for="Emailtxt">Email</label>
          <input required name="Emailtxt" type="email" placeholder="Email" value="<?=$p->getEmail()?>">
        </div>
        <div class="izq">
          <label for="Passwordtxt">Password</label>
          <input required name="Passwordtxt" type="password" placeholder="Password" value="<?=$p->getPassword()?>">
        </div>
        <div class="der">
          <label for="tipoDoctxt">Tipo Documento</label>
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
          <label for="NumDoctxt">Numero Documento</label>
          <input required name="NumDoctxt" type="text" placeholder="Numero Documento" value="<?=$p->getNumDocumento()?>">
        </div>
        <div class="der">
          <label for="Procedenciatxt">Procedencia</label>
          <input required name="Procedenciatxt" type="text" placeholder="Procedencia" value="<?=$p->getProcedencia()?>">
        </div>
        <div class="izq">
          <label for="Telefonotxt">Telefono</label>
          <input required name="Telefonotxt" type="text" placeholder="Telefono" value="<?=$p->getTelefono()?>">
        </div>
        <div class="der">
          <label for="Estadotxt">Estado</label>
          <select name="Estadotxt">
            <option value="HOSPEDADO" <?php echo $p->getEstado() == "HOSPEDADO" ? 'selected' : ''; ?>>HOSPEDADO</option>
            <option value="INACTIVO" <?php echo $p->getEstado() == "INACTIVO" ? 'selected' : ''; ?>>INACTIVO</option>
          </select>
        </div>
        <!--<div>
          <label for="NEstadotxt">NEstado</label>
          <input required name="NEstadotxt" type="number" placeholder="NEstado" value="<?=$p->getNEstado()?>">
        </div>
        <div>-->
      </div>
      <button class="boton" type="submit"><?=$titulo?></button>
    </form>
  </div>
</main>

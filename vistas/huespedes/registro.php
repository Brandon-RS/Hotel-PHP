<main class="cuerpo_td">
  <div class="banner">
    <h1>CREA TU CUENTA</h1>
  </div>
  <div  class="cuerpo_lg">
    <form class="form_lg" method="post" action="?c=huesped&a=Guardar">
      <div class="registro_hu">

        <div class="lg_inter">
          <label for="Emailtxt">Email</label>
          <input required name="Emailtxt" type="email" placeholder="Email" value="">
        </div>
        <div class="reg_input">
          <div class="">
            <label for="Nombretxt">Nombre</label>
            <input required name="Nombretxt" type="text" placeholder="Nombre" value="">
          </div>
          <div class="der_hu">
            <label for="Apellidostxt">Apellidos</label>
            <input required name="Apellidostxt" type="text" placeholder="Apellidos" value="">
          </div>

          <div class="">
            <label for="Passwordtxt">Contraseña</label>
            <input required name="Passwordtxt" type="password" placeholder="Contraseña" value="">
            <div class="error_contra">
              <p><?=$res?></p>
            </div>
          </div>
          <div class="der_hu">
            <label for="Passwordtxt2">Conf Contraseña</label>
            <input required name="Passwordtxt2" type="password" placeholder="Contraseña" value="">
            <div class="error_contra">
              <p><?=$res?></p>
            </div>
          </div>
        </div>



      </div>
      <button class="boton_hu" type="submit"><?=$titulo?></button>
    </form>
  </div>
  <div class="registrar">
    <p>¿Ya tienes una cuenta? <a href="?c=login">¡Inicia sesión aquí!</a> </p>
  </div>
</main>

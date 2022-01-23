<main class="cuerpo_td">
  <div class="banner">
    <h1>INICIO DE SESIÓN</h1>
  </div>
  <div class="cuerpo_lg">
    <form class="form_lg" action="?c=login&a=Validar" method="post">
        <div class="lg_inter">
          <div class="">
            <label for="logintxt">Login </label>
            <input required type="email" name="logintxt" placeholder="Email">
          </div>

          <div class="">
            <label for="passwordtxt">Password </label>
            <input required type="password" name="passwordtxt" placeholder="Contraseña">
          </div>
        </div>
        <input class="boton_lg" type="submit" name="enviar" value="INGRESAR">
    </form>
  </div>
  <div class="registrar">
    <p>¿Aún no tienes una cuenta? <a href="?c=huesped&a=registrar">¡Regístrate ahora!</a> </p>
  </div>
</main>

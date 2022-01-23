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
  <div class="cuerpo_perfil">
    <table class="tbl_perfil">
      <thead>
        <tr>
          <th colspan="3">INFORMACION DE SU PERFIL</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="h1_td">Nombre</td>
          <td class="flecha_td"> → </td>
          <td><?=$p->getNombre()?> <?=$p->getApellidos()?></td>
        </tr>
        <tr>
          <td class="h1_td">Email</td>
          <td class="flecha_td"> → </td>
          <td><?=$p->getEmail()?></td>
        </tr>
        <tr>
          <td class="h1_td">Documento</td>
          <td class="flecha_td"> → </td>
          <td><?=$p->getNumDocumento()?></td>
        </tr>
        <tr>
          <td class="h1_td">Telefono</td>
          <td class="flecha_td"> → </td>
          <td><?=$p->getTelefono()?></td>
        </tr>
      </tbody>

    </table>
  </div>
</main>

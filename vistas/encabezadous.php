<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Hotel Naranjo</title>
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/header_user.css">
  <link rel="stylesheet" href="assets/css/tablas.css">
  <link rel="stylesheet" href="assets/css/formularios.css">
  <link rel="stylesheet" href="assets/css/habitaciones.css">
  <link rel="stylesheet" href="assets/css/nosotros.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="assets/css/registro.css">
  <link rel="stylesheet" href="assets/css/perfil.css">
  <link rel="stylesheet" href="assets/css/reservas.css">
</head>

<body>

  <header>
    <nav class="logo">
      <p>HOTEL</p>
      <h1>EL NARANJO</h1>
    </nav>
    <nav class="navegacion">
      <ul class="menu">
        <li> <a href="?c=acces">HOME</a> </li>
        <li> <a href="?c=acces&a=habitaciones">HABITACIONES</a>
          <ul class="submenu">
            <li> <a href="?c=habitacion">HABITACIONES</a> </li>
            <li> <a href="?c=reservaus">RESERVAS</a> </li>
          </ul>
        </li>
        <li> <a href="#">OPCIONES</a>
          <ul class="submenu">
            <li> <a href="?c=empleado">EMPLEADOS</a> </li>
            <li> <a href="?c=usuario">USUARIOS</a> </li>
            <li> <a href="?c=huespedu">HUESPEDES</a> </li>
          </ul>
        </li>
        <li> <a href="?c=acces&a=nosotros">NOSOTROS</a> </li>
        <li> <a href="?c=login"><?= $login_perfil ?></a> </li>
      </ul>
    </nav>
  </header>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Hotel Naranjo</title>
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/habitaciones.css">
  <link rel="stylesheet" href="assets/css/nosotros.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="assets/css/formularios.css">
  <link rel="stylesheet" href="assets/css/tablas.css">
  <link rel="stylesheet" href="assets/css/registro.css">
  <link rel="stylesheet" href="assets/css/reservas.css">
  <link rel="stylesheet" href="assets/css/perfil.css">
</head>

<body>

  <header>
    <nav class="logo">
      <p>HOTEL</p>
      <h1>EL NARANJO</h1>
    </nav>
    <nav class="navegacion">
      <ul>
        <li> <a href="?c=inicio">HOME</a> </li>
        <li> <a href="?c=inicio&a=habitaciones">HABITACIONES</a> </li>
        <li> <a href="?c=inicio&a=nosotros">NOSOTROS</a> </li>
        <li> <a href="?c=login"><?= $login_perfil ?></a> </li>
      </ul>
    </nav>
  </header>
<?php

session_start();
if (!isset($_SESSION["huesped"])) {
  header("location:index.php");
  echo "string";
}

?>

<h1>Bienvenidos</h1>
<hr> <br>

<?php

echo "Hola: " . $_SESSION["huesped"] . "<br>";
?>
<p>Informacion reservada</p> <br>
<a href="cierre.php">Cerrar sesion</a>
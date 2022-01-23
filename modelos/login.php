<?php

class Login
{

  private $base;

  private $Acceso;
  private $Password;

  public function __CONSTRUCT()
  {
    $this->base = BasedeDatos::Conectar();
  }

  public function getAcceso(): ?string
  {
    return $this->Acceso;
  }
  public function setAcceso(string $acces)
  {
    $this->Acceso = $acces;
  }

  public function getPassword(): ?string
  {
    return $this->Password;
  }
  public function setPassword(string $pass)
  {
    $this->Password = $pass;
  }

  public function Comprobar($p)
  {

    try {

      $sql = "SELECT t.Email, u.Password FROM usuario u INNER JOIN trabajador t
          ON u.idTrabajador=t.idTrabajador WHERE t.Email=:login AND u.Password=:password";

      $sql2 = "SELECT h.Email, h.Password FROM huesped h WHERE h.Email=:login2 AND h.Password=:password2";

      $resultado = $this->base->prepare($sql);
      $resultado2 = $this->base->prepare($sql2);

      $login = htmlentities(addslashes($p->getAcceso()));
      $password = htmlentities(addslashes($p->getPassword()));
      $login2 = htmlentities(addslashes($p->getAcceso()));
      $password2 = htmlentities(addslashes($p->getPassword()));

      $resultado->bindValue(":login", $login);
      $resultado->bindValue(":password", $password);
      $resultado2->bindValue(":login2", $login2);
      $resultado2->bindValue(":password2", $password2);

      $resultado->execute();
      $resultado2->execute();

      $numero_registro = $resultado->rowCount();
      $numero_registro2 = $resultado2->rowCount();


      if ($numero_registro != 0) {
        $numero_registro += 10;
        return $numero_registro;
      } else if ($numero_registro2 != 0) {
        return $numero_registro2;
      }

      /*if ($numero_registro != 0) {
            // code...
            session_start();

            $_SESSION["usuario"] = $_POST["login"];
            header("location:index.php");

          }else {
            header("location:example.php");
          }*/
    } catch (Exception $e) {
      die("Error: " . $e->getMessage());
    }
  }
}

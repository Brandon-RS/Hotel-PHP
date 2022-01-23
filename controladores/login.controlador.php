<?php
    require_once 'modelos/login.php';
    require_once 'modelos/huesped.php';
    require_once 'modelos/usuario.php';

    class LoginControlador{

      private $modelo, $modelo2, $modelo3;

      public function __CONSTRUCT(){
        $this->modelo=new Login();
        $this->modelo2=new Huesped();
        $this->modelo3=new Usuario();
      }

      public function Inicio(){

        session_start();
        $login_perfil="INICIAR SESIÓN";
        $p=new Huesped();
        $r=new Usuario();

        if (isset($_SESSION["huesped"])) {

          $login_perfil="VER PERFIL";
          $p=$this->modelo2->ObtenerDts($_SESSION["huesped"]);
          require_once 'vistas/encabezado.php';
          require_once 'vistas/perfiles/huesped.php';

        } else if (isset($_SESSION["usuario"])) {
          $login_perfil="ADM PERFIL";
          $r=$this->modelo3->ObtenerDts($_SESSION["usuario"]);
          require_once 'vistas/encabezadous.php';
          require_once 'vistas/perfiles/usuario.php';
        }else{
          require_once 'vistas/encabezado.php';
          require_once 'vistas/login/login.php';
        }
        require_once 'vistas/pie.php';
      }

      public function Validar(){

        $p=new Login();
        $p->setAcceso($_POST['logintxt']);
        $p->setPassword($_POST['passwordtxt']);

        $numero_registro=$this->modelo->Comprobar($p);

        if ($numero_registro >0 && $numero_registro<6) {
          // code...
          session_start();

          $_SESSION["huesped"] = $_POST["logintxt"];
          header("location:?c=inicio");

        }else if ($numero_registro>10) {

          session_start();

          $_SESSION["usuario"] = $_POST["logintxt"];
          header("location:?c=acces");

        }else{
          //echo $p->getAcceso()." ".$p->getPassword()." ".var_dump($numero_registro);
          header("location:?c=login");
        }

        /*session_start();
        if (!isset($_SESSION["usuario"])) {
          // code...
          header("location:?c=login");
        }else {
          header("location:example.php");
        }*/

      }

    }

?>

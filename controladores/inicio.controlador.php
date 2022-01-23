<?php
    //require_once 'modelos/empleado.php';

    class InicioControlador {

      private $modelo;

      /*public function __CONSTRUCT (){

        $this->modelo = new Empleado();

      }*/

      public function Inicio (){
        session_start();
        $login_perfil="INICIAR SESIÓN";
        if (isset($_SESSION["huesped"])) {
          $login_perfil="VER PERFIL";
        } else if (isset($_SESSION["usuario"])) {
          $login_perfil="ADM PERFIL";
        }

        require_once 'vistas/encabezado.php';
        require_once 'vistas/inicio/principal.php';
        require_once 'vistas/pie.php';

      }

      public function Habitaciones(){
        session_start();
        $login_perfil="INICIAR SESIÓN";
        if (isset($_SESSION["huesped"])) {
          $login_perfil="VER PERFIL";
        } else if (isset($_SESSION["usuario"])) {
          $login_perfil="ADM PERFIL";
        }

        require_once 'vistas/encabezado.php';
        if (isset($_GET['a'])) {
          $advertencia="";
          $ad_h2="";
          require_once 'vistas/inicio/habitaciones.php';
        }else{
          require_once 'vistas/inicio/principal.php';
        }
        require_once 'vistas/pie.php';

      }

      public function Nosotros(){
        session_start();
        $login_perfil="INICIAR SESIÓN";
        if (isset($_SESSION["huesped"])) {
          $login_perfil="VER PERFIL";
        } else if (isset($_SESSION["usuario"])) {
          $login_perfil="ADM PERFIL";
        }

        require_once 'vistas/encabezado.php';
        if (isset($_GET['a'])) {
          require_once 'vistas/inicio/nosotros.php';
        }else{
          require_once 'vistas/inicio/principal.php';
        }
        require_once 'vistas/pie.php';

      }

      public function Hb_Doble(){
        session_start();
        $login_perfil="INICIAR SESIÓN";
        if (isset($_SESSION["huesped"])) {
          $login_perfil="VER PERFIL";
        } else if (isset($_SESSION["usuario"])) {
          $login_perfil="ADM PERFIL";
        }

        require_once 'vistas/encabezado.php';
        if (isset($_GET['a'])) {
          require_once 'vistas/inicio/Hb_Doble.php';
        }else{
          require_once 'vistas/inicio/principal.php';
        }
        require_once 'vistas/pie.php';

      }

      public function Hb_Indiv(){
        session_start();
        $login_perfil="INICIAR SESIÓN";
        if (isset($_SESSION["huesped"])) {
          $login_perfil="VER PERFIL";
        } else if (isset($_SESSION["usuario"])) {
          $login_perfil="ADM PERFIL";
        }

        require_once 'vistas/encabezado.php';
        if (isset($_GET['a'])) {
          require_once 'vistas/inicio/Hb_Individual.php';
        }else{
          require_once 'vistas/inicio/principal.php';
        }
        require_once 'vistas/pie.php';

      }

      public function Hb_Matrim(){
        session_start();
        $login_perfil="INICIAR SESIÓN";
        if (isset($_SESSION["huesped"])) {
          $login_perfil="VER PERFIL";
        } else if (isset($_SESSION["usuario"])) {
          $login_perfil="ADM PERFIL";
        }

        require_once 'vistas/encabezado.php';
        if (isset($_GET['a'])) {
          require_once 'vistas/inicio/Hb_Matrimonial.php';
        }else{
          require_once 'vistas/inicio/principal.php';
        }
        require_once 'vistas/pie.php';

      }

    }

?>

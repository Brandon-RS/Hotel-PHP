<?php
  require_once 'modelos/huesped.php';
  require_once 'modelos/reserva.php';
  require_once 'modelos/usuario.php';

  class PerfilControlador{

    private $modelo, $modelo2, $modelo3;

    public function __CONSTRUCT(){
      $this->modelo=new Huesped();
      $this->modelo2=new Reserva();
      $this->modelo3=new Usuario();
    }

    public function Inicio(){
      session_start();
      $login_perfil="INICIAR SESIÓN";
      $p=new Huesped();
      $r=new Usuario();

      if (isset($_SESSION["huesped"])) {
        $login_perfil="VER PERFIL";
        $p=$this->modelo->ObtenerDts($_SESSION["huesped"]);
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

    public function Cerrar_sesion(){
      require_once 'vistas/perfiles/cerrar.php';
    }

    public function MisReservas(){
      session_start();
      $login_perfil="INICIAR SESIÓN";
      if (isset($_SESSION["huesped"])) {

        $login_perfil="VER PERFIL";
        require_once 'vistas/encabezado.php';
        require_once 'vistas/perfiles/mis_reservas.php';
      } else if (isset($_SESSION["usuario"])) {

        $login_perfil="ADM PERFIL";
        require_once 'vistas/encabezado.php';
        require_once 'vistas/perfiles/huesped.php';
      }else{
        require_once 'vistas/encabezado.php';
        require_once 'vistas/login/login.php';
      }

      require_once 'vistas/pie.php';
    }

  }

?>

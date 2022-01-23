<?php
  require_once 'modelos/reserva.php';

  class ReservausControlador{

    private $modelo;

    public function __CONSTRUCT(){
      $this->modelo=new Reserva();
    }

    public function Inicio(){
      session_start();
      $login_perfil="INICIAR SESIÓN";
      if (isset($_SESSION["huesped"])) {
        $login_perfil="VER PERFIL";
      } else if (isset($_SESSION["usuario"])) {
        $login_perfil="ADM PERFIL";
      }

      require_once 'vistas/encabezadous.php';

      if (!isset($_SESSION["usuario"])) {
        require_once 'vistas/login/login.php';
      }else{
        require_once 'vistas/reservas/index.php';
      }
      require_once 'vistas/pie.php';
    }

    public function FormCrear(){
      session_start();
      $login_perfil="INICIAR SESIÓN";
      if (isset($_SESSION["huesped"])) {
        $login_perfil="VER PERFIL";
      } else if (isset($_SESSION["usuario"])) {
        $login_perfil="ADM PERFIL";
        require_once 'vistas/encabezadous.php';
      }

      $titulo="Registrar";
      $p=new Reserva();
      if (isset($_GET['id'])) {
        $p=$this->modelo->Obtener($_GET['id']);
        $titulo="Actualizar";
      }

      require_once 'vistas/reservas/form.php';
      require_once 'vistas/pie.php';
    }

    public function Actualizar(){
      $p=new Reserva();
      $p->setIdReserva(intval($_POST['ID']));
      $p->setIdHabitacion(intval($_POST['Habitaciontxt']));
      $p->setIdHuesped(intval($_POST['Huespedtxt']));
      $p->setIdUsurio(intval($_POST['Usuariotxt']));
      $p->setFechaIngreso($_POST['fch_ingresotxt']);
      $p->setFechaSalida($_POST['fch_salidatxt']);
      $p->setCostoAlojamiento($_POST['Totaltxt']);
      $p->setObservaciones($_POST['Observacionestxt']);
      $p->setEstado($_POST['Estadotxt']);
      //$p->setNEstado($_POST['NEstadotxt']);

      $this->modelo->Actualizar_res($p);

      header('location:?c=reservaus');
    }

    public function Borrar(){
      $this->modelo->Eliminar($_GET['id']);
      header('location:?c=reservaus');
    }

    public function Reservar(){
      session_start();
      $login_perfil="INICIAR SESIÓN";
      if (isset($_SESSION["huesped"])) {
        $login_perfil="VER PERFIL";
      } else if (isset($_SESSION["usuario"])) {
        $login_perfil="ADM PERFIL";
        require_once 'vistas/encabezadous.php';

        $tipo_hbt = $_GET['t'];
        $id_hu = $_GET['id'];
        $mail = $_SESSION['usuario'];
        $fch_actual = $this->modelo->Fecha_actual();
        require_once 'vistas/reservas/reservarus.php';

      }
      require_once 'vistas/pie.php';

    }

    public function Confirmar_reserva(){
      session_start();
      $login_perfil="INICIAR SESIÓN";
      if (isset($_SESSION["huesped"])) {
        $login_perfil="VER PERFIL";
      } else if (isset($_SESSION["usuario"])) {
        $login_perfil="ADM PERFIL";
        require_once 'vistas/encabezadous.php';

        $dias = $this->modelo->Dias_Alojamiento($_POST['fch_ingresotxt'], $_POST['fch_salidatxt']);
        $tipo_hbt = $_GET['t'];
        $id_hu = $_GET['id'];
        $precio_hbt = $this->modelo->Obtener_precio($tipo_hbt);
        $mail_huesp = $this->modelo->Obtener_mail($id_hu);
        $costo = $dias * $precio_hbt;
        $mail = $_SESSION['usuario'];

        $fch_reserva_conf = $this->modelo->Fecha_actual();
        $fch_ingreso_conf = $_POST['fch_ingresotxt'];
        $fch_salida_conf = $_POST['fch_salidatxt'];
        $observ_conf = $_POST['Observacionestxt'];
        $estado_us = $_POST['Estadotxt'];
        require_once 'vistas/reservas/confirmarus.php';
      }else{
        require_once 'vistas/login/login.php';
      }

      require_once 'vistas/pie.php';

    }

    public function Guardar(){
      session_start();
      $p=new Reserva();

      $p->setFechaReserva($_POST['fch_reservatxt']);
      $p->setFechaIngreso($_POST['fch_ingresotxt']);
      $p->setFechaSalida($_POST['fch_salidatxt']);
      $p->setObservaciones($_POST['Observacionestxt']);
      $p->setCostoAlojamiento($_POST['costotxt']);
      $p->setEstado($_POST['Estadotxt']);

      $tipo_hbt = $_GET['t'];
      $mail = $_SESSION["usuario"];
      $id_hu = $_GET['id'];

      $this->modelo->Insertar_res($p, $tipo_hbt, $mail, $id_hu);

      header('location:?c=reservaus');
    }

  }

 ?>

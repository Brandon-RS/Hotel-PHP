<?php
    require_once 'modelos/reserva.php';

    class ReservaControlador{

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

        require_once 'vistas/encabezado.php';

        if (!isset($_SESSION["huesped"])) {
          require_once 'vistas/login/login.php';
        }else{

          $nume=$this->modelo->ValidarDatos($_SESSION["huesped"]);

          if ($nume==1) {
            require_once 'vistas/reservas/reservar.php';
          }else{
            header('location:?c=huesped&a=FormCrear');
          }
        }
        require_once 'vistas/pie.php';
      }

      public function Reservar(){
        session_start();
        $login_perfil="INICIAR SESIÓN";
        if (isset($_SESSION["huesped"])) {
          $login_perfil="VER PERFIL";
        } else if (isset($_SESSION["usuario"])) {
          $login_perfil="ADM PERFIL";
        }

        if (isset($_SESSION["huesped"])) {
          require_once 'vistas/encabezado.php';
          $nume=$this->modelo->ValidarDatos($_SESSION["huesped"]);

          if ($nume==1) {

            if (isset($_GET['t'])) {

              $tipo_hbt = $_GET['t'];
              $Cantidad=$this->modelo->Hbt_Disponibles($tipo_hbt);
              $fch_actual = $this->modelo->Fecha_actual();
              $usuario_mail = $_SESSION['huesped'];

              if ($Cantidad>0) {
                require_once 'vistas/reservas/reservar.php';
              } else {
                $advertencia="No tenemos una habitación <strong><i>$tipo_hbt</i></strong> disponible en este momento";
                $ad_h2="Por favor elija una opcion diferente, lamentamos los inconvenientes";
                require_once 'vistas/inicio/habitaciones.php';
              }

            }else{
              //Code...
            }

          }else{
            header('location:?c=huesped&a=FormCrear');
          }

        }else if (isset($_SESSION["usuario"])) {
          require_once 'vistas/encabezadous.php';

          if (isset($_GET['t'])) {

            $tipo_hbt = $_GET['t'];
            $Cantidad=$this->modelo->Hbt_Disponibles($tipo_hbt);
            //$fch_actual = $this->modelo->Fecha_actual();
            //$usuario_mail = $_SESSION['usuario'];

            if ($Cantidad>0) {
              header("location:?c=huespedu&a=Huespedes&t=$tipo_hbt");
            } else {
              $advertencia="No tenemos una habitación <strong><i>$tipo_hbt</i></strong> disponible en este momento";
              $ad_h2="Por favor elija una opcion diferente, lamentamos los inconvenientes";
              require_once 'vistas/inicio/habitaciones.php';
            }

          }else{
            //Code...
          }

        }else{

          require_once 'vistas/encabezado.php';
          require_once 'vistas/login/login.php';

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
        }

        require_once 'vistas/encabezado.php';

        if (!isset($_SESSION["huesped"])) {
          require_once 'vistas/login/login.php';
        }else{

          $nume=$this->modelo->ValidarDatos($_SESSION["huesped"]);

          if ($nume==1) {

            if (isset($_GET['t'])) {
              $dias = $this->modelo->Dias_Alojamiento($_POST['fch_ingresotxt'], $_POST['fch_salidatxt']);

              $tipo_hbt = $_GET['t'];

              $precio_hbt = $this->modelo->Obtener_precio($tipo_hbt);

              $costo = $dias * $precio_hbt;

              $mail = $_SESSION['huesped'];
              $fch_reserva_conf = $this->modelo->Fecha_actual();
              $fch_ingreso_conf = $_POST['fch_ingresotxt'];
              $fch_salida_conf = $_POST['fch_salidatxt'];
              $observ_conf = $_POST['Observacionestxt'];
              require_once 'vistas/reservas/confirmar.php';
            }else{
              //Code...
            }

          }else{
            header('location:?c=huesped&a=FormCrear');
          }
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

        $tipo_hbt = $_GET['t'];
        $mail = $_SESSION["huesped"];

        $this->modelo->Insertar($p, $tipo_hbt, $mail);

        header('location:?c=Perfil');
      }

      public function Borrar(){
        $this->modelo->Eliminar($_GET['id']);
        header('location:?c=perfil&a=MisReservas');
      }

    }

?>

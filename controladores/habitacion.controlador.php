<?php
    require_once 'modelos/habitacion.php';

    class HabitacionControlador{

      private $modelo;

      public function __CONSTRUCT(){
        $this->modelo=new Habitacion();
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
        require_once 'vistas/habitaciones/index.php';
        require_once 'vistas/pie.php';
      }

      public function FormCrear(){
        session_start();
        $login_perfil="INICIAR SESIÓN";
        if (isset($_SESSION["huesped"])) {
          $login_perfil="VER PERFIL";
        } else if (isset($_SESSION["usuario"])) {
          $login_perfil="ADM PERFIL";
        }

        $titulo="Registrar";
        $p=new Habitacion();
        if (isset($_GET['id'])) {
          $p=$this->modelo->Obtener($_GET['id']);
          $titulo="Actualizar";
        }

        require_once 'vistas/encabezadous.php';
        require_once 'vistas/habitaciones/form.php';
        require_once 'vistas/pie.php';
      }

      public function Guardar(){
        $p=new Habitacion();
        $p->setIdHabitacion(intval($_POST['ID']));
        $p->setNumero($_POST['Numerotxt']);
        $p->setPiso($_POST['Pisotxt']);
        $p->setCaracteristicas($_POST['Caractxt']);
        $p->setDescripcion($_POST['Descriptxt']);
        $p->setTipoHabitacion($_POST['tipoHabtxt']);
        $p->setPrecio($_POST['Preciotxt']);
        $p->setEstado($_POST['Estadotxt']);
        //$p->setNEstado($_POST['NEstadotxt']);

        $p->getIdHabitacion()>0 ? $this->modelo->Actualizar($p) : $this->modelo->Insertar($p);

        header('location:?c=habitacion');
      }

      public function Borrar(){
        $this->modelo->Eliminar($_GET['id']);
        header('location:?c=habitacion');
      }

    }

?>

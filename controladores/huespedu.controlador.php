<?php
    require_once 'modelos/huespedu.php';

    class HuespeduControlador{

      private $modelo;

      public function __CONSTRUCT(){
        $this->modelo=new Huespedu();
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
        require_once 'vistas/huespedu/index.php';
        require_once 'vistas/pie.php';
      }
      public function Huespedes(){
        session_start();
        $login_perfil="INICIAR SESIÓN";
        if (isset($_SESSION["huesped"])) {
          $login_perfil="VER PERFIL";
        } else if (isset($_SESSION["usuario"])) {
          $login_perfil="ADM PERFIL";
        }

        require_once 'vistas/encabezadous.php';
        require_once 'vistas/huespedu/huespedes.php';
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
        $p=new Huespedu();
        if (isset($_GET['id'])) {
          $p=$this->modelo->Obtener($_GET['id']);
          $titulo="Actualizar";
        }

        require_once 'vistas/encabezadous.php';
        require_once 'vistas/huespedu/form.php';
        require_once 'vistas/pie.php';
      }

      public function Guardar(){
        $p=new Huespedu();
        $p->setIdHuesped(intval($_POST['ID']));
        $p->setNombre($_POST['Nombretxt']);
        $p->setApellidos($_POST['Apellidostxt']);
        $p->setEmail($_POST['Emailtxt']);
        $p->setPassword($_POST['Passwordtxt']);
        $p->setTipoDocumento($_POST['tipoDoctxt']);
        $p->setNumDocumento($_POST['NumDoctxt']);
        $p->setProcedencia($_POST['Procedenciatxt']);
        $p->setTelefono($_POST['Telefonotxt']);
        $p->setEstado($_POST['Estadotxt']);
        //$p->setNEstado($_POST['NEstadotxt']);

        $p->getIdHuesped()>0 ? $this->modelo->Actualizar($p) : $this->modelo->Insertar($p);

        header('location:?c=huespedu');
      }

      public function Borrar(){
        $this->modelo->Eliminar($_GET['id']);
        header('location:?c=huespedu');
      }

    }

?>

<?php
    require_once 'modelos/huesped.php';

    class HuespedControlador{

      private $modelo;

      public function __CONSTRUCT(){
        $this->modelo=new Huesped();
      }

      public function Registrar(){
        session_start();
        $login_perfil="INICIAR SESIÓN";
        if (isset($_SESSION["huesped"])) {
          $login_perfil="VER PERFIL";
        } else if (isset($_SESSION["usuario"])) {
          $login_perfil="ADM PERFIL";
        }

        $titulo="Registrarse";
        $res="";

        require_once 'vistas/encabezado.php';
        require_once 'vistas/huespedes/registro.php';
        require_once 'vistas/pie.php';

      }

      public function Error(){
        session_start();
        $login_perfil="INICIAR SESIÓN";
        if (isset($_SESSION["huesped"])) {
          $login_perfil="VER PERFIL";
        } else if (isset($_SESSION["usuario"])) {
          $login_perfil="ADM PERFIL";
        }

        $titulo="Registrarse";
        $res="Las contraseñas no coinciden";

        require_once 'vistas/encabezado.php';
        require_once 'vistas/huespedes/registro.php';
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
        $p=new Huesped();
        if (isset($_SESSION["huesped"])) {
          $p=$this->modelo->ObtenerDts($_SESSION["huesped"]);
          $titulo="Actualizar";
        }

        require_once 'vistas/encabezado.php';
        require_once 'vistas/huespedes/actualizacion.php';
        require_once 'vistas/pie.php';
      }

      public function Guardar(){

        $valid=strcmp($_POST['Passwordtxt'],$_POST['Passwordtxt2']);
        if ($valid) {
          header('location:?c=huesped&a=error');
        }else{
          $p=new Huesped();

          $p->setIdHuesped(intval($_POST['ID']));
          $p->setNombre($_POST['Nombretxt']);
          $p->setApellidos($_POST['Apellidostxt']);
          $p->setEmail($_POST['Emailtxt']);
          $p->setPassword($_POST['Passwordtxt']);

          $this->modelo->Insertar($p);

          session_start();
          $_SESSION["huesped"] = $_POST["Emailtxt"];

          header('location:?c=inicio');
        }

      }

      public function Completar(){

        session_start();
        $p=new Huesped();

        $p->setIdHuesped(intval($_POST['ID']));
        $p->setEmail($_SESSION["huesped"]);
        $p->setTipoDocumento($_POST['tipoDoctxt']);
        $p->setNumDocumento($_POST['NumDoctxt']);
        $p->setProcedencia($_POST['Procedenciatxt']);
        $p->setTelefono($_POST['Telefonotxt']);

        $this->modelo->ActualizarDts($p);

        header('location:?c=inicio&a=habitaciones');
      }

      public function Borrar(){
        $this->modelo->Eliminar($_GET['id']);
        header('location:?c=huesped');
      }

    }

?>

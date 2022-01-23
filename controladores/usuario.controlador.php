<?php
    require_once 'modelos/usuario.php';

    class UsuarioControlador{

      private $modelo;

      public function __CONSTRUCT(){
        $this->modelo=new Usuario();
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
        require_once 'vistas/usuarios/index.php';
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
        $p=new Usuario();
        if (isset($_GET['id'])) {
          $p=$this->modelo->Obtener($_GET['id']);
          $titulo="Actualizar";
        }

        require_once 'vistas/encabezadous.php';
        require_once 'vistas/usuarios/form.php';
        require_once 'vistas/pie.php';
      }

      public function Guardar(){
        $p=new Usuario();
        $p->setIdTrabajador(intval($_POST['ID']));

        $p->setIdUsuario(intval($_POST['IDus']));

        $p->setIdPuestoTrabajo($_POST['Puestotxt']);
        $p->setNombre($_POST['Nombretxt']);
        $p->setApellidos($_POST['Apellidostxt']);
        $p->setTipoDocumento($_POST['tipoDoctxt']);
        $p->setNumDocumento($_POST['numDoctxt']);
        $p->setSueldo($_POST['Sueldotxt']);
        $p->setDireccion($_POST['Direcciontxt']);
        $p->setTelefono($_POST['Telefonotxt']);
        $p->setEmail($_POST['Emailtxt']);

        $p->setAcceso($_POST['Accesotxt']);
        $p->setPassword($_POST['Passwordtxt']);

        $p->setEstado($_POST['Estadotxt']);
        //$p->setNEstado($_POST['NEstadotxt']);

        $p->getIdUsuario()>0 ? $this->modelo->Actualizar($p) : $this->modelo->Insertar($p);

        header('location:?c=usuario');
      }

      public function Borrar(){
        $this->modelo->Eliminar($_GET['id']);
        header('location:?c=usuario');
      }

    }

?>

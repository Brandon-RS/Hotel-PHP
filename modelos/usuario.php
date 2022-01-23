<?php
    require_once 'empleado.php';

    class Usuario extends Empleado{

      private $pdo;

      private $idUsuario;
      private $Acceso;
      private $Password;

      public function __CONSTRUCT(){
        $this->pdo = BasedeDatos::Conectar();
      }

      public function getIdUsuario() : ?int{
        return $this->idUsuario;
      }
      public function setIdUsuario(int $id){
        $this->idUsuario=$id;
      }

      public function getAcceso() : ?string{
        return $this->Acceso;
      }
      public function setAcceso(string $acces){
        $this->Acceso=$acces;
      }

      public function getPassword() : ?string{
        return $this->Password;
      }
      public function setPassword(string $pass){
        $this->Password=$pass;
      }

      public function Listar(){
        try {

          $consulta=$this->pdo->prepare("SELECT t.idTrabajador, u.idUsuario, t.idPuestoTrabajo, t.Nombre, t.Apellidos, t.TipoDocumento, t.NumDocumento, t.Sueldo,
                                                t.Direccion, t.Telefono, t.Email, u.Acceso, u.Password, t.Estado, t.NEstado
                                         FROM trabajador t INNER JOIN usuario u ON t.idTrabajador=u.idTrabajador WHERE t.idTrabajador!=1 AND t.NEstado=1");
          $consulta->execute();
          return $consulta->fetchAll(PDO::FETCH_OBJ);

        } catch (Exception $e) {

          die($e->getMessage());

        }
      }

      public function Obtener(int $id){
        try {

          $consulta=$this->pdo->prepare("SELECT t.idTrabajador, u.idUsuario, t.idPuestoTrabajo, t.Nombre, t.Apellidos, t.TipoDocumento, t.NumDocumento,
                                                t.Sueldo, t.Direccion, t.Telefono, t.Email, u.Acceso, u.Password, t.Estado, t.NEstado
                                         FROM trabajador t INNER JOIN usuario u ON t.idTrabajador=u.idTrabajador WHERE u.idUsuario=? and t.NEstado=1");
          $consulta->execute(array($id));
          $r=$consulta->fetch(PDO::FETCH_OBJ);

          $p=new Usuario();
          $p->setIdTrabajador($r->idTrabajador);
          $p->setIdUsuario($r->idUsuario);
          $p->setIdPuestoTrabajo($r->idPuestoTrabajo);
          $p->setNombre($r->Nombre);
          $p->setApellidos($r->Apellidos);
          $p->setTipoDocumento($r->TipoDocumento);
          $p->setNumDocumento($r->NumDocumento);
          $p->setSueldo($r->Sueldo);
          $p->setDireccion($r->Direccion);
          $p->setTelefono($r->Telefono);
          $p->setEmail($r->Email);
          $p->setAcceso($r->Acceso);
          $p->setPassword($r->Password);
          $p->setEstado($r->Estado);
          $p->setNEstado($r->NEstado);

          return $p;

        } catch (Exception $e) {

          die($e->getMessage());

        }
      }

      public function ObtenerDts($mail){
        try {

          $consulta=$this->pdo->prepare("SELECT t.idTrabajador, u.idUsuario, t.idPuestoTrabajo, t.Nombre, t.Apellidos, t.TipoDocumento, t.NumDocumento,
                                                t.Sueldo, t.Direccion, t.Telefono, t.Email, u.Acceso, u.Password, t.Estado, t.NEstado
                                         FROM trabajador t INNER JOIN usuario u ON t.idTrabajador=u.idTrabajador WHERE t.email=? and t.NEstado=1");
          $consulta->execute(array($mail));
          $r=$consulta->fetch(PDO::FETCH_OBJ);

          return $r;

        } catch (Exception $e) {

          die($e->getMessage());

        }
      }

      public function Insertar($p){
        try {

          $consulta_1="INSERT INTO trabajador(idPuestoTrabajo,Nombre,Apellidos,TipoDocumento,NumDocumento,Sueldo,Direccion,Telefono,Email,Estado,NEstado)
                     VALUES (?,?,?,?,?,?,?,?,?,?,1)";
          $this->pdo->prepare($consulta_1)->execute(array(
                                                        $p->getIdPuestoTrabajo(),
                                                        $p->getNombre(),
                                                        $p->getApellidos(),
                                                        $p->getTipoDocumento(),
                                                        $p->getNumDocumento(),
                                                        $p->getSueldo(),
                                                        $p->getDireccion(),
                                                        $p->getTelefono(),
                                                        $p->getEmail(),
                                                        $p->getEstado(),
                                                      ));

            $consulta_2="INSERT INTO usuario(idTrabajador, Acceso, Password) VALUES ((SELECT idTrabajador FROM trabajador ORDER BY idTrabajador DESC LIMIT 1),?,?)";
            $this->pdo->prepare($consulta_2)->execute(array(
                                                          $p->getAcceso(),
                                                          $p->getPassword(),
                                                        ));

        } catch (Exception $e) {

          die($e->getMessage());

        }
      }

      public function Actualizar($p){
        try {

          $consulta_1="UPDATE trabajador SET idPuestoTrabajo=?,Nombre=?,Apellidos=?,TipoDocumento=?,NumDocumento=?,Sueldo=?,Direccion=?,Telefono=?,Email=?,Estado=? WHERE idTrabajador=?";
          $consulta_2="UPDATE usuario SET Acceso=?, Password=? where idTrabajador=?";
          $this->pdo->prepare($consulta_1)->execute(array(
                                                        $p->getIdPuestoTrabajo(),
                                                        $p->getNombre(),
                                                        $p->getApellidos(),
                                                        $p->getTipoDocumento(),
                                                        $p->getNumDocumento(),
                                                        $p->getSueldo(),
                                                        $p->getDireccion(),
                                                        $p->getTelefono(),
                                                        $p->getEmail(),
                                                        $p->getEstado(),
                                                        $p->getIdTrabajador(),
                                                      ));


          $this->pdo->prepare($consulta_2)->execute(array(
                                                        $p->getAcceso(),
                                                        $p->getPassword(),
                                                        $p->getIdTrabajador(),
                                                      ));
        } catch (Exception $e) {

          die($e->getMessage());

        }
      }

      public function Eliminar($id){
        try {

          $consulta="UPDATE trabajador SET NEstado=0 WHERE idTrabajador=?";
          $this->pdo->prepare($consulta)->execute(array($id));

        } catch (Exception $e) {

          die($e->getMessage());

        }
      }

    }

?>

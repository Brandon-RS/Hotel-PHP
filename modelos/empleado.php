<?php

class Empleado
{

  private $pdo;

  private $idTrabajador;
  private $idPuestoTrabajo;
  private $Nombre;
  private $Apellidos;
  private $TipoDocumento;
  private $NumDocumento;
  private $Sueldo;
  private $Direccion;
  private $Telefono;
  private $Email;
  private $Estado;
  private $NEstado;

  public function __CONSTRUCT()
  {
    $this->pdo = BasedeDatos::Conectar();
  }

  public function getIdTrabajador(): ?int
  {
    return $this->idTrabajador;
  }
  public function setIdTrabajador(int $id)
  {
    $this->idTrabajador = $id;
  }

  public function getIdPuestoTrabajo(): ?int
  {
    return $this->idPuestoTrabajo;
  }
  public function setIdPuestoTrabajo(int $idTrb)
  {
    $this->idPuestoTrabajo = $idTrb;
  }

  public function getNombre(): ?string
  {
    return $this->Nombre;
  }
  public function setNombre(string $nombre)
  {
    $this->Nombre = $nombre;
  }

  public function getApellidos(): ?string
  {
    return $this->Apellidos;
  }
  public function setApellidos(string $apellidos)
  {
    $this->Apellidos = $apellidos;
  }

  public function getTipoDocumento(): ?string
  {
    return $this->TipoDocumento;
  }
  public function setTipoDocumento(string $tipoDoc)
  {
    $this->TipoDocumento = $tipoDoc;
  }

  public function getNumDocumento(): ?string
  {
    return $this->NumDocumento;
  }
  public function setNumDocumento(string $numDoc)
  {
    $this->NumDocumento = $numDoc;
  }

  public function getSueldo(): ?float
  {
    return $this->Sueldo;
  }
  public function setSueldo(string $sueldo)
  {
    $this->Sueldo = $sueldo;
  }

  public function getDireccion(): ?string
  {
    return $this->Direccion;
  }
  public function setDireccion(string $direccion)
  {
    $this->Direccion = $direccion;
  }

  public function getTelefono(): ?string
  {
    return $this->Telefono;
  }
  public function setTelefono(string $telefono)
  {
    $this->Telefono = $telefono;
  }

  public function getEmail(): ?string
  {
    return $this->Email;
  }
  public function setEmail(string $email)
  {
    $this->Email = $email;
  }

  public function getEstado(): ?string
  {
    return $this->Estado;
  }
  public function setEstado(string $estado)
  {
    $this->Estado = $estado;
  }

  public function getNEstado(): ?int
  {
    return $this->NEstado;
  }
  public function setNEstado(int $nestado)
  {
    $this->NEstado = $nestado;
  }

  public function Listar()
  {
    try {

      $consulta = $this->pdo->prepare("SELECT * FROM trabajador WHERE idTrabajador!=1 AND nestado=1");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function Obtener(int $id)
  {
    try {

      $consulta = $this->pdo->prepare("SELECT * FROM trabajador WHERE idTrabajador=?");
      $consulta->execute(array($id));
      $r = $consulta->fetch(PDO::FETCH_OBJ);

      $p = new Empleado();
      $p->setIdTrabajador($r->idTrabajador);
      $p->setIdPuestoTrabajo($r->idPuestoTrabajo);
      $p->setNombre($r->Nombre);
      $p->setApellidos($r->Apellidos);
      $p->setTipoDocumento($r->TipoDocumento);
      $p->setNumDocumento($r->NumDocumento);
      $p->setSueldo($r->Sueldo);
      $p->setDireccion($r->Direccion);
      $p->setTelefono($r->Telefono);
      $p->setEmail($r->Email);
      $p->setEstado($r->Estado);
      $p->setNEstado($r->NEstado);

      return $p;
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function Insertar(Empleado $p)
  {
    try {

      $consulta = "INSERT INTO trabajador(idPuestoTrabajo,Nombre,Apellidos,TipoDocumento,NumDocumento,Sueldo,Direccion,Telefono,Email,Estado,NEstado)
                     VALUES (?,?,?,?,?,?,?,?,?,?,?)";
      $this->pdo->prepare($consulta)->execute(array(
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
        $p = 1,
      ));
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function Actualizar(Empleado $p)
  {
    try {

      $consulta = "UPDATE trabajador SET idPuestoTrabajo=?,Nombre=?,Apellidos=?,TipoDocumento=?,NumDocumento=?,Sueldo=?,Direccion=?,Telefono=?,Email=?,Estado=? WHERE idTrabajador=?";
      $this->pdo->prepare($consulta)->execute(array(
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
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function Eliminar($id)
  {
    try {

      $consulta = "UPDATE trabajador SET NEstado=0 WHERE idTrabajador=?";
      $this->pdo->prepare($consulta)->execute(array($id));
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }
}

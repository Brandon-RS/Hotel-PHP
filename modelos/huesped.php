<?php

class Huesped
{

  private $pdo;

  private $idHuesped;
  private $Nombre;
  private $Apellidos;
  private $Email;
  private $Password;
  private $TipoDocumento;
  private $NumDocumento;
  private $Procedencia;
  private $Telefono;
  private $Estado;
  private $NEstado;

  public function __CONSTRUCT()
  {
    $this->pdo = BasedeDatos::Conectar();
  }

  public function getIdHuesped(): ?int
  {
    return $this->idHuesped;
  }
  public function setIdHuesped(int $id)
  {
    $this->idHuesped = $id;
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

  public function getEmail(): ?string
  {
    return $this->Email;
  }
  public function setEmail(string $email)
  {
    $this->Email = $email;
  }

  public function getPassword(): ?string
  {
    return $this->Password;
  }
  public function setPassword(string $password)
  {
    $this->Password = $password;
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

  public function getProcedencia(): ?string
  {
    return $this->Procedencia;
  }
  public function setProcedencia(string $procedencia)
  {
    $this->Procedencia = $procedencia;
  }

  public function getTelefono(): ?string
  {
    return $this->Telefono;
  }
  public function setTelefono(string $telefono)
  {
    $this->Telefono = $telefono;
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

  public function Insertar(Huesped $p)
  {
    try {

      $consulta = "INSERT INTO huesped(Nombre,Apellidos,Email,Password,TipoDocumento,NumDocumento,Procedencia,Telefono,Estado,NEstado)
                     VALUES (?,?,?,?,'null','0','null','0','INACTIVO',1)";
      $this->pdo->prepare($consulta)->execute(array(
        $p->getNombre(),
        $p->getApellidos(),
        $p->getEmail(),
        $p->getPassword(),
      ));
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function ObtenerDts(string $mail)
  {
    try {

      $consulta = $this->pdo->prepare("SELECT * FROM huesped WHERE Email=?");
      $consulta->execute(array($mail));
      $r = $consulta->fetch(PDO::FETCH_OBJ);

      $p = new Huesped();
      $p->setIdHuesped($r->idHuesped);
      $p->setNombre($r->Nombre);
      $p->setApellidos($r->Apellidos);
      $p->setEmail($r->Email);
      $p->setPassword($r->Password);
      $p->setTipoDocumento($r->TipoDocumento);
      $p->setNumDocumento($r->NumDocumento);
      $p->setProcedencia($r->Procedencia);
      $p->setTelefono($r->Telefono);
      $p->setEstado($r->Estado);
      $p->setNEstado($r->NEstado);

      return $p;
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function ActualizarDts(Huesped $p)
  {
    try {

      $consulta = "UPDATE huesped SET TipoDocumento=?,NumDocumento=?,Procedencia=?,Telefono=? WHERE Email=?";
      $this->pdo->prepare($consulta)->execute(array(
        $p->getTipoDocumento(),
        $p->getNumDocumento(),
        $p->getProcedencia(),
        $p->getTelefono(),
        $p->getEmail(),
      ));
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }
}

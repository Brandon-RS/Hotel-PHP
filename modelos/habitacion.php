<?php

class Habitacion
{

  private $pdo;

  private $idHabitacion;
  private $Numero;
  private $Piso;
  private $Caracteristicas;
  private $Descripcion;
  private $TipoHabitacion;
  private $Precio;
  private $Estado;
  private $NEstado;

  public function __CONSTRUCT()
  {
    $this->pdo = BasedeDatos::Conectar();
  }

  public function getIdHabitacion(): ?int
  {
    return $this->idHabitacion;
  }
  public function setIdHabitacion(int $id)
  {
    $this->idHabitacion = $id;
  }

  public function getNumero(): ?string
  {
    return $this->Numero;
  }
  public function setNumero(string $numero)
  {
    $this->Numero = $numero;
  }

  public function getPiso(): ?string
  {
    return $this->Piso;
  }
  public function setPiso(string $piso)
  {
    $this->Piso = $piso;
  }

  public function getCaracteristicas(): ?string
  {
    return $this->Caracteristicas;
  }
  public function setCaracteristicas(string $caracteristica)
  {
    $this->Caracteristicas = $caracteristica;
  }

  public function getDescripcion(): ?string
  {
    return $this->Descripcion;
  }
  public function setDescripcion(string $descrip)
  {
    $this->Descripcion = $descrip;
  }

  public function getTipoHabitacion(): ?string
  {
    return $this->TipoHabitacion;
  }
  public function setTipoHabitacion(string $tipoHabit)
  {
    $this->TipoHabitacion = $tipoHabit;
  }

  public function getPrecio(): ?float
  {
    return $this->Precio;
  }
  public function setPrecio(float $precio)
  {
    $this->Precio = $precio;
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

      $consulta = $this->pdo->prepare("SELECT * FROM habitacion WHERE nestado=1");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function Obtener(int $id)
  {
    try {

      $consulta = $this->pdo->prepare("SELECT * FROM habitacion WHERE idHabitacion=?");
      $consulta->execute(array($id));
      $r = $consulta->fetch(PDO::FETCH_OBJ);

      $p = new Habitacion();
      $p->setIdHabitacion($r->idHabitacion);
      $p->setNumero($r->Numero);
      $p->setPiso($r->Piso);
      $p->setCaracteristicas($r->Caracteristicas);
      $p->setDescripcion($r->Descripcion);
      $p->setTipoHabitacion($r->TipoHabitacion);
      $p->setPrecio($r->Precio);
      $p->setEstado($r->Estado);
      $p->setNEstado($r->NEstado);

      return $p;
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function Insertar(Habitacion $p)
  {
    try {

      $consulta = "INSERT INTO habitacion(Numero,Piso,Caracteristicas,Descripcion,TipoHabitacion,Precio,Estado,NEstado)
                     VALUES (?,?,?,?,?,?,?,?)";
      $this->pdo->prepare($consulta)->execute(array(
        $p->getNumero(),
        $p->getPiso(),
        $p->getCaracteristicas(),
        $p->getDescripcion(),
        $p->getTipoHabitacion(),
        $p->getPrecio(),
        $p->getEstado(),
        $p = 1,
      ));
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function Actualizar(Habitacion $p)
  {
    try {

      $consulta = "UPDATE habitacion SET Numero=?,Piso=?,Caracteristicas=?,Descripcion=?,TipoHabitacion=?,Precio=?,Estado=? WHERE idHabitacion=?";
      $this->pdo->prepare($consulta)->execute(array(
        $p->getNumero(),
        $p->getPiso(),
        $p->getCaracteristicas(),
        $p->getDescripcion(),
        $p->getTipoHabitacion(),
        $p->getPrecio(),
        $p->getEstado(),
        $p->getIdHabitacion(),
      ));
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function Eliminar($id)
  {
    try {

      $consulta = "UPDATE habitacion SET NEstado=0 WHERE idHabitacion=?";
      $this->pdo->prepare($consulta)->execute(array($id));
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }
}

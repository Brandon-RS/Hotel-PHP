<?php
class Reserva
{

  private $pdo;

  private $idReserva;
  private $idHabitacion;
  private $idHuesped;
  private $idUsuario;
  private $fechaReserva;
  private $fechaIngreso;
  private $fechaSalida;
  private $CostoAlojamiento;
  private $Observaciones;
  private $Estado;
  private $NEstado;

  public function __CONSTRUCT()
  {
    $this->pdo = BasedeDatos::Conectar();
  }

  public function getIdReserva(): ?int
  {
    return $this->idReserva;
  }
  public function setIdReserva(int $id)
  {
    $this->idReserva = $id;
  }

  public function getIdHabitacion(): ?int
  {
    return $this->idHabitacion;
  }
  public function setIdHabitacion(int $idHa)
  {
    $this->idHabitacion = $idHa;
  }

  public function getIdHuesped(): ?int
  {
    return $this->idHuesped;
  }
  public function setIdHuesped(int $idHu)
  {
    $this->idHuesped = $idHu;
  }

  public function getIdUsuario(): ?int
  {
    return $this->idUsuario;
  }
  public function setIdUsurio(int $idUs)
  {
    $this->idUsuario = $idUs;
  }

  public function getFechaReserva(): ?string
  {
    return $this->fechaReserva;
  }
  public function setFechaReserva(string $fchReser)
  {
    $this->fechaReserva = $fchReser;
  }

  public function getFechaIngreso(): ?string
  {
    return $this->fechaIngreso;
  }
  public function setFechaIngreso(string $fchIngre)
  {
    $this->fechaIngreso = $fchIngre;
  }

  public function getFechaSalida(): ?string
  {
    return $this->fechaSalida;
  }
  public function setFechaSalida(string $fchSalida)
  {
    $this->fechaSalida = $fchSalida;
  }

  public function getCostoAlojamiento(): ?float
  {
    return $this->CostoAlojamiento;
  }
  public function setCostoAlojamiento(string $cstAloj)
  {
    $this->CostoAlojamiento = $cstAloj;
  }

  public function getObservaciones(): ?string
  {
    return $this->Observaciones;
  }
  public function setObservaciones(string $obsv)
  {
    $this->Observaciones = $obsv;
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

  //GET Y SET PARA VALIDAR QUE EL CLIENTE TENGA TODOS LOS DATOS NECESARIOS PARA LA RESERVA
  public function getDocumento(): ?string
  {
    return $this->NumDocumento;
  }
  public function setDocumento(string $numDoc)
  {
    $this->NumDocumento = $numDoc;
  }

  public function ValidarDatos($mail)
  {
    try {

      $consulta = $this->pdo->prepare("SELECT NumDocumento FROM huesped WHERE Email=?");
      $consulta->execute(array($mail));
      $r = $consulta->fetch(PDO::FETCH_OBJ);

      $p = new Reserva();
      $p->setDocumento($r->NumDocumento);
      $val = $p->getDocumento();
      $val_ret = 0;

      if (strlen($val) > 4) {
        $val_ret = 1;
      }
      return $val_ret;
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  //FUNCIONES PROPIAS DE LAS RESERVAS

  public function Hbt_Disponibles($tipo_hbt)
  {
    try {

      $consulta = $this->pdo->prepare("SELECT COUNT(*) AS Cantidad FROM habitacion WHERE TipoHabitacion='$tipo_hbt' AND Estado='DISPONIBLE'");
      $consulta->execute();
      $r = $consulta->fetch(PDO::FETCH_OBJ);
      return $r->Cantidad;
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function Fecha_actual()
  {
    date_default_timezone_set('America/Los_Angeles');
    $fch_actual = date("Y-m-d");
    return $fch_actual;
  }

  public function Dias_Alojamiento($ingreso, $salida)
  {
    $dias = (strtotime($ingreso) - strtotime($salida)) / 86400;
    $dias = abs($dias);
    $dias = floor($dias);
    return $dias;
  }

  public function Obtener_precio($tipo_hbt)
  {
    try {

      $consulta = $this->pdo->prepare("SELECT Precio FROM habitacion WHERE TipoHabitacion='$tipo_hbt'");
      $consulta->execute();
      $r = $consulta->fetch(PDO::FETCH_OBJ);
      return $r->Precio;
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function Obtener_mail($id_hu)
  {
    try {

      $consulta = $this->pdo->prepare("SELECT Email FROM Huesped WHERE idHuesped='$id_hu'");
      $consulta->execute();
      $r = $consulta->fetch(PDO::FETCH_OBJ);
      return $r->Email;
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function Listar()
  {
    try {

      $consulta = $this->pdo->prepare("SELECT idReserva, (SELECT H.Numero FROM habitacion H WHERE H.idHabitacion=R.idHabitacion) AS Num_hbt,
          (SELECT H.TipoHabitacion FROM habitacion H WHERE H.idHabitacion=R.idHabitacion) AS Tipo_Hbt, (SELECT Hu.Email FROM huesped Hu WHERE Hu.idHuesped=R.idHuesped) AS Email_hu,
          (SELECT U.Acceso FROM usuario U WHERE U.idUsuario=R.idUsuario) AS Usuario_r, R.fechaReserva, R.fechaIngreso, R.fechaSalida, R.CostoAlojamiento, R.Observaciones, R.Estado
          FROM reserva R WHERE nestado=1");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function Listar_mis_reservas($mail)
  {
    try {

      $consulta = $this->pdo->prepare("SELECT idReserva, (SELECT H.Numero FROM habitacion H WHERE H.idHabitacion=R.idHabitacion) AS Num_hbt,
          (SELECT H.TipoHabitacion FROM habitacion H WHERE H.idHabitacion=R.idHabitacion) AS Tipo_Hbt, R.fechaReserva, R.fechaIngreso,
          R.fechaSalida, R.CostoAlojamiento, R.Observaciones, R.Estado FROM reserva R WHERE R.idHuesped=(SELECT HH.idHuesped FROM huesped HH
            WHERE HH.email='$mail') AND nestado=1");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function Obtener(int $id)
  {
    try {

      $consulta = $this->pdo->prepare("SELECT * FROM reserva WHERE idReserva=?");
      $consulta->execute(array($id));
      $r = $consulta->fetch(PDO::FETCH_OBJ);

      $p = new Reserva();
      $p->setIdReserva($r->idReserva);
      $p->setIdHabitacion($r->idHabitacion);
      $p->setIdHuesped($r->idHuesped);
      $p->setIdUsurio($r->idUsuario);

      $p->setFechaReserva($r->fechaReserva);
      $p->setFechaIngreso($r->fechaIngreso);
      $p->setFechaSalida($r->fechaSalida);
      $p->setCostoAlojamiento($r->CostoAlojamiento);
      $p->setObservaciones($r->Observaciones);

      $p->setEstado($r->Estado);
      $p->setNEstado($r->NEstado);

      return $p;
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function Insertar($p, $tipo_hbt, $mail)
  {
    try {

      $consulta = "INSERT INTO reserva(idHabitacion,idHuesped,idUsuario,fechaReserva,fechaIngreso,fechaSalida,CostoAlojamiento,Observaciones,Estado,NEstado)
                     VALUES ((SELECT idHabitacion FROM habitacion WHERE TipoHabitacion='$tipo_hbt' AND Estado='DISPONIBLE' ORDER BY Numero ASC LIMIT 1),
                             (SELECT idHuesped FROM huesped WHERE email='$mail'),'1',?,?,?,?,?,'POR PAGAR','1')";

      $consulta2 = "UPDATE habitacion SET Estado='OCUPADA' WHERE idHabitacion=(SELECT idHabitacion FROM habitacion WHERE TipoHabitacion='$tipo_hbt' AND Estado='DISPONIBLE' ORDER BY Numero ASC LIMIT 1)";

      $this->pdo->prepare($consulta)->execute(array(
        $p->getFechaReserva(),
        $p->getFechaIngreso(),
        $p->getFechaSalida(),
        $p->getCostoAlojamiento(),
        $p->getObservaciones()
      ));

      $this->pdo->prepare($consulta2)->execute();
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function Actualizar_res(Reserva $p)
  {
    try {

      $consulta = "UPDATE reserva SET idHabitacion=?,idHuesped=?,idUsuario=?,fechaIngreso=?,fechaSalida=?,CostoAlojamiento=?,Observaciones=?,Estado=? WHERE idReserva=?";
      $this->pdo->prepare($consulta)->execute(array(
        $p->getIdHabitacion(),
        $p->getIdHuesped(),
        $p->getIdUsuario(),
        $p->getFechaIngreso(),
        $p->getFechaSalida(),
        $p->getCostoAlojamiento(),
        $p->getObservaciones(),
        $p->getEstado(),
        $p->getIdReserva()
      ));
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  public function Eliminar($id)
  {
    try {

      $consulta = "UPDATE reserva SET Estado='CANCELADA', NEstado=0 WHERE idReserva=?";
      $consulta2 = "UPDATE habitacion SET Estado='DISPONIBLE' WHERE idHabitacion=(SELECT idHabitacion FROM reserva WHERE idReserva=?)";
      $this->pdo->prepare($consulta)->execute(array($id));
      $this->pdo->prepare($consulta2)->execute(array($id));
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }

  //RESERVAS POR PARTE DEL USUARIO DEL SISTEMA

  public function Insertar_res($p, $tipo_hbt, $mail, $id_hu)
  {
    try {

      $consulta = "INSERT INTO reserva(idHabitacion,idHuesped,idUsuario,fechaReserva,fechaIngreso,fechaSalida,CostoAlojamiento,Observaciones,Estado,NEstado)
                     VALUES ((SELECT idHabitacion FROM habitacion WHERE TipoHabitacion='$tipo_hbt' AND Estado='DISPONIBLE' ORDER BY Numero ASC LIMIT 1),'$id_hu',
                             (SELECT U.idUsuario FROM usuario U WHERE U.idTrabajador=(SELECT T.idTrabajador FROM trabajador T WHERE T.Email='$mail')),?,?,?,?,?,?,'1')";

      $consulta2 = "UPDATE habitacion SET Estado='OCUPADA' WHERE idHabitacion=(SELECT idHabitacion FROM habitacion WHERE TipoHabitacion='$tipo_hbt' AND Estado='DISPONIBLE' ORDER BY Numero ASC LIMIT 1)";

      $this->pdo->prepare($consulta)->execute(array(
        $p->getFechaReserva(),
        $p->getFechaIngreso(),
        $p->getFechaSalida(),
        $p->getCostoAlojamiento(),
        $p->getObservaciones(),
        $p->getEstado()
      ));

      $this->pdo->prepare($consulta2)->execute();
    } catch (Exception $e) {

      die($e->getMessage());
    }
  }
}

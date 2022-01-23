<?php

class BasedeDatos
{

  const servidor = "127.0.0.1";
  const usuariodb = "root";
  const clave = "";
  const nombredb = "db_hotel";

  public static function Conectar()
  {

    try {

      $conexion = new PDO("mysql:host =" . self::servidor . ";dbname=" . self::nombredb . ";chartset=utf8", self::usuariodb, self::clave);

      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conexion;
    } catch (PDOException $e) {

      return "Falló " . $e->getMessage() . " Linea " . $e->getLine();
    }
  }
}

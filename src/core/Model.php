<?php
defined('BASEPATH') or exit('No se permite acceso directo');
/**
 * Modelo base
 */
class Model
{
  /**
  * @var object
  */
  protected $db;

  /**
  * Inicializa conexion
  */
  public function __construct()
  { 

    $connection = "mysql:host=" . HOST . ";"
    . "dbname=" . DB . ";"
    . "charset=" . CHARSET . ";";

    $options = [
        PDO::ATTR_ERRMODE           =>  PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES  => FALSE,
    ];

    $this->db = new PDO($connection, USER, PASSWORD, $options);
  }

  /**
  * Finaliza conexion
  */
  public function __destruct()
  {
    $this->db = null;
  }
}
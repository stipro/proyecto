<?php

/**
 * Plantilla general de modelos
 * Versión 1.0.1
 *
 * Modelo de movimientos
 */
class movimientosModel extends Model {
  public static $t1   = 'movimientos'; // Nombre de la tabla en la base de datos;
  
  // Nombre de tabla 2 que talvez tenga conexión con registros
  //public static $t2 = '__tabla 2___'; 
  //public static $t3 = '__tabla 3___'; 

  function __construct()
  {
    // Constructor general
  }
  
  static function all()
  {
    // Todos los registros
    $sql = 'SELECT * FROM movimientos ORDER BY id_movimiento DESC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function lastMovement()
  {
    // Todos los registros
    $sql = 'SELECT MAX(mv.id_movimiento) AS mv FROM movimientos AS mv LIMIT 1';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT * FROM movimientos WHERE id_movimiento = :id LIMIT 1';
    return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : [];
  }
}


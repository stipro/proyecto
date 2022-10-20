<?php

/**
 * Plantilla general de modelos
 * Versión 1.0.1
 *
 * Modelo de ingreso_detalle
 */
class ingreso_detalleModel extends Model {
  public static $t1   = 'ingresosdetalle'; // Nombre de la tabla en la base de datos;
  
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
    $sql = 'SELECT * FROM ingresosdetalle ORDER BY id_ingresodetalle DESC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT * FROM ingresosdetalle WHERE id_ingresodetalle = :id LIMIT 1';
    return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : [];
  }
}


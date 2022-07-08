<?php

/**
 * Plantilla general de modelos
 * Versión 1.0.1
 *
 * Modelo de marcas
 */
class marcasModel extends Model
{
  public static $t1   = 'marcas'; // Nombre de la tabla en la base de datos;

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
    $sql = 'SELECT * FROM marcas ORDER BY id_marca ASC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function all_paginated()
  {
    // Todos los registros
    $sql = 'SELECT * FROM marcas ORDER BY id_marca ASC';
    return PaginationHandler::paginate($sql);
  }

  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT * FROM marcas WHERE id_marca = :id LIMIT 1';
    $rows = parent::query($sql, ['id' => $id]);

    if (!$rows) return [];

    return $rows;
    /* return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : []; */
  }
}

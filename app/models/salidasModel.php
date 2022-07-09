<?php

/**
 * Plantilla general de modelos
 * Versión 1.0.1
 *
 * Modelo de salidas
 */
class salidasModel extends Model
{
  public static $t1   = 'salidas'; // Nombre de la tabla en la base de datos;

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
    $sql = 'SELECT * FROM salidas ORDER BY id_salida DESC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function all_paginated()
  {
    // Todos los registros
    $sql = 'SELECT sl.id_salida, sl.producto_id, pd.codigo_producto, pd.nombre_producto, sl.cantidad_salida, sl.precio_salida, sl.dateCreation_salida FROM salidas AS sl LEFT JOIN productos AS pd ON sl.producto_id = pd.id_producto ORDER BY id_salida ASC';
    return PaginationHandler::paginate($sql, [], 5);
  }

  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT * FROM salidas WHERE id_salida = :id LIMIT 1';
    return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : [];
  }

  static function nSalida()
  {
    // Obtenemos ultimo Ingreso
    $sql = 'SELECT MAX(sl.numero_salida) AS nSalida FROM salidas AS sl LIMIT 1';
    return ($rows = parent::query($sql)) ? $rows : [];
  }
}

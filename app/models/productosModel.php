<?php

/**
 * Plantilla general de modelos
 * Versión 1.0.1
 *
 * Modelo de productos
 */
class productosModel extends Model
{
  public static $t1   = 'productos'; // Nombre de la tabla en la base de datos;

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
    $sql = 'SELECT * FROM productos ORDER BY id_producto DESC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function all_paginated()
  {
    // Todos los registros
    $sql = 'SELECT pd.id_producto, pd.codigo_producto, pd.codigoBarra_producto, pd.nombre_producto, mr.nombre_marca, ct.nombre_categoria FROM productos AS pd LEFT JOIN marcas AS mr ON pd.marca_id = mr.id_marca LEFT JOIN categorias AS ct ON pd.categoria_id = ct.id_categoria ORDER BY id_producto ASC';
    return PaginationHandler::paginate($sql, [], 5);
  }

  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT pd.id_producto, pd.codigo_producto, pd.codigoBarra_producto, pd.nombre_producto, pd.marca_id, mr.nombre_marca, pd.categoria_id, ct.nombre_categoria FROM productos AS pd LEFT JOIN marcas AS mr ON pd.marca_id = mr.id_marca LEFT JOIN categorias AS ct ON pd.categoria_id = ct.id_categoria WHERE id_producto = :id LIMIT 1';
    return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : [];
  }
}

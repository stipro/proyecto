<?php

/**
 * Plantilla general de modelos
 * Versión 1.0.1
 *
 * Modelo de ingresos
 */
class ingresosModel extends Model {
  public static $t1   = 'ingresos'; // Nombre de la tabla en la base de datos;
  
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
    $sql = 'SELECT * FROM ingresos ORDER BY id_ingreso DESC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function all_2()
  {
    // Todos los registros
    $sql = "SELECT T.* FROM (
    SELECT ek.*, (SELECT @total:=0),
@entrada := IF(ek.tipoMovimiento_id = 1,(ek.cantidadTotal_ingreso),(0)) AS Entrada,
@salida := IF(ek.tipoMovimiento_id = 2,(ek.cantidadTotal_ingreso),(0)) AS Salida,
    CASE 
        WHEN (@explosivo = '' OR @explosivo = ek.tipoMovimiento_id) AND ek.tipoMovimiento_id = 1 THEN @saldo:= @saldo + ek.cantidadTotal_ingreso
        WHEN (@explosivo = '' OR @explosivo = ek.tipoMovimiento_id) AND ek.tipoMovimiento_id = 2 THEN @saldo:= @saldo - ek.cantidadTotal_ingreso
        WHEN @explosivo != ek.tipoMovimiento_id AND ek.tipoMovimiento_id = 1 THEN @saldo:= 0 + ek.cantidadTotal_ingreso
        WHEN @explosivo != ek.tipoMovimiento_id AND ek.tipoMovimiento_id = 2 THEN @saldo:= 0 - ek.cantidadTotal_ingreso
    END AS Saldo,
    @explosivo:= ek.tipoMovimiento_id
    FROM (SELECT (SELECT @saldo:=0), (SELECT @explosivo:=0), tk.* FROM ingresos AS tk) AS ek 
  LEFT JOIN tipomovimiento AS vlES ON ek.tipoMovimiento_id = vlES.id_tipoMovimiento
  ORDER BY ek.dateCreation_ingreso
    ) T;";
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function all_paginated()
  {
    // Todos los registros
    $sql = 'SELECT ig.id_ingreso, ig.producto_id, pd.codigo_producto, pd.nombre_producto, ig.cantidad_ingreso, ig.precio_ingreso, ig.dateCreation_ingreso FROM ingresos AS ig LEFT JOIN productos AS pd ON ig.producto_id = pd.id_producto  ORDER BY id_ingreso ASC';
    return PaginationHandler::paginate($sql, [], 5);
  }

  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT * FROM ingresos WHERE id_ingreso = :id LIMIT 1';
    return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : [];
  }

  static function nIngreso()
  {
    // Obtenemos ultimo Ingreso
    $sql = 'SELECT MAX(ig.numero_ingreso) AS nIngreso FROM ingresos AS ig LIMIT 1';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

}


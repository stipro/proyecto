<?php

/**
 * Plantilla general de modelos
 * Versión 1.0.1
 *
 * Modelo de kardex
 */
class kardexModel extends Model {
  public static $t1   = 'kardex'; // Nombre de la tabla en la base de datos;
  
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
    $sql = 'SELECT * FROM kardex ORDER BY id DESC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function all_general()
  {
    // Todos los registros
    $sql = "SELECT T.tipoMovimiento_id, T.fecha_movimiento,
    @entrada:= IF(T.tipoMovimiento_id = 1,(T.cantidadTotal_ingreso),(0)) AS ingreso,
    @entradaMoney:= IF(T.tipoMovimiento_id = 1,(T.precioTotal_ingreso),(0.00)) AS ingreso_dinero,
    @salida:= IF(T.tipoMovimiento_id = 2,(T.cantidadTotal_salida),(0)) AS salida,
    @salidaMoney:= IF(T.tipoMovimiento_id = 2,(T.precioTotal_salida),(0.00)) AS salida_dinero,
    CASE 
      WHEN (@idMovimiento = '' OR @idMovimiento = T.id_movimiento) AND T.tipoMovimiento_id = 1 THEN @saldo:= @saldo + T.cantidadTotal_ingreso
      WHEN (@idMovimiento = '' OR @idMovimiento = T.id_movimiento) AND T.tipoMovimiento_id = 2 THEN @saldo:= @saldo - T.cantidadTotal_salida
      WHEN @idMovimiento != T.id_movimiento AND T.tipoMovimiento_id = 1 THEN @saldo:= 0 + T.cantidadTotal_ingreso
      WHEN @idMovimiento != T.id_movimiento AND T.tipoMovimiento_id = 2 THEN @saldo:= 0 - T.cantidadTotal_salida
        END AS Saldo,
     CASE 
      WHEN (@idMovimiento = '' OR @idMovimiento = T.id_movimiento) AND T.tipoMovimiento_id = 1 THEN @saldoMoney:= @saldoMoney + T.precioTotal_ingreso
      WHEN (@idMovimiento = '' OR @idMovimiento = T.id_movimiento) AND T.tipoMovimiento_id = 2 THEN @saldoMoney:= @saldoMoney - T.precioTotal_salida
      WHEN @idMovimiento != T.id_movimiento AND T.tipoMovimiento_id = 1 THEN @saldoMoney:= 0 + T.precioTotal_ingreso
      WHEN @idMovimiento != T.id_movimiento AND T.tipoMovimiento_id = 2 THEN @saldoMoney:= 0 - T.precioTotal_salida
        END AS SaldoMoney
    FROM (SELECT mv.*, ig.cantidadTotal_ingreso, ig.precioTotal_ingreso, sl.cantidadTotal_salida, sl.precioTotal_salida, (SELECT @saldo:= 0), (SELECT @idMovimiento:= 0) , (SELECT @saldoMoney:= 0) FROM movimientos AS mv 
        LEFT JOIN ingresos AS ig ON mv.id_movimiento = ig.movimiento_id
       LEFT JOIN salidas AS sl ON mv.id_movimiento = sl.movimiento_id
           ORDER BY mv.fecha_movimiento ASC) T";
    return PaginationHandler::paginate($sql);
  }

  static function all_2()
  {
    // Todos los registros
    $sql = "SELECT T.*, 
    @entrada:= IF(T.tipoMovimiento_id = 1,(T.cantidadTotal_ingreso),(0)) AS Entrada,
    @salida:= IF(T.tipoMovimiento_id = 2,(T.cantidadTotal_salida),(0)) AS Salida,
    CASE 
      WHEN (@explosivo = '' OR @explosivo = T.id_movimiento) AND T.tipoMovimiento_id = 1 THEN @saldo:= @saldo + T.cantidadTotal_ingreso
      WHEN (@explosivo = '' OR @explosivo = T.id_movimiento) AND T.tipoMovimiento_id = 2 THEN @saldo:= @saldo - T.cantidadTotal_salida
      WHEN @explosivo != T.id_movimiento AND T.tipoMovimiento_id = 1 THEN @saldo:= 0 + T.cantidadTotal_ingreso
      WHEN @explosivo != T.id_movimiento AND T.tipoMovimiento_id = 2 THEN @saldo:= 0 - T.cantidadTotal_salida
        END AS Saldo
    FROM (SELECT mv.*, ig.cantidadTotal_ingreso, sl.cantidadTotal_salida, (SELECT @saldo:= 0), (SELECT @explosivo:= 0) FROM movimientos AS mv 
        LEFT JOIN ingresos AS ig ON mv.id_movimiento = ig.movimiento_id
       LEFT JOIN salidas AS sl ON mv.id_movimiento = sl.movimiento_id
           ORDER BY mv.fecha_movimiento ASC) T";
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT * FROM kardex WHERE id = :id LIMIT 1';
    return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : [];
  }
}


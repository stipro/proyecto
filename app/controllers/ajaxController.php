<?php

class ajaxController extends Controller
{

  private $accepted_actions = ['get', 'post', 'put', 'delete', 'options', 'add', 'load'];
  private $required_params  = ['hook', 'action'];

  function __construct()
  {
    foreach ($this->required_params as $param) {
      if (!isset($_POST[$param])) {
        json_output(json_build(403));
      }
    }

    if (!in_array($_POST['action'], $this->accepted_actions)) {
      json_output(json_build(403));
    }
  }

  function index()
  {
    /**
    200 OK
    201 Created
    300 Multiple Choices
    301 Moved Permanently
    302 Found
    304 Not Modified
    307 Temporary Redirect
    400 Bad Request
    401 Unauthorized
    403 Forbidden
    404 Not Found
    410 Gone
    500 Internal Server Error
    501 Not Implemented
    503 Service Unavailable
    550 Permission denied
     */
    json_output(json_build(403));
  }

  function bee_add_movement()
  {
    try {
      $mov              = new movementModel();
      $mov->type        = $_POST['type'];
      $mov->description = $_POST['description'];
      $mov->amount      = (float) $_POST['amount'];
      if (!$id = $mov->add()) {
        json_output(json_build(400, null, 'Hubo error al guardar el registro'));
      }

      // se guardó con éxito
      $mov->id = $id;
      json_output(json_build(201, $mov->one(), 'Movimiento agregado con éxito'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function bee_get_movements()
  {
    try {
      $movements          = new movementModel;
      $movs               = $movements->all_by_date();

      $taxes              = (float) get_option('taxes') < 0 ? 16 : get_option('taxes');
      $use_taxes          = get_option('use_taxes') === 'Si' ? true : false;

      $total_movements    = $movs[0]['total'];
      $total              = $movs[0]['total_incomes'] - $movs[0]['total_expenses'];
      $subtotal           = $use_taxes ? $total / (1.0 + ($taxes / 100)) : $total;
      $taxes              = $subtotal * ($taxes / 100);

      $calculations       = [
        'total_movements' => $total_movements,
        'subtotal'        => $subtotal,
        'taxes'           => $taxes,
        'total'           => $total
      ];

      $data = get_module('movements', ['movements' => $movs, 'cal' => $calculations]);
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  function bee_delete_movement()
  {
    try {
      $mov     = new movementModel();
      $mov->id = $_POST['id'];

      if (!$mov->delete()) {
        json_output(json_build(400, null, 'Hubo error al borrar el registro'));
      }

      json_output(json_build(200, null, 'Movimiento borrado con éxito'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function bee_update_movement()
  {
    try {
      $movement     = new movementModel;
      $movement->id = $_POST['id'];
      $mov          = $movement->one();

      if (!$mov) {
        json_output(json_build(400, null, 'No existe el movimiento'));
      }

      $data = get_module('updateForm', $mov);
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  }

  function bee_save_movement()
  {
    try {
      $mov              = new movementModel();
      $mov->id          = $_POST['id'];
      $mov->type        = $_POST['type'];
      $mov->description = $_POST['description'];
      $mov->amount      = (float) $_POST['amount'];
      if (!$mov->update()) {
        json_output(json_build(400, null, 'Hubo error al guardar los cambios'));
      }

      // se guardó con éxito
      json_output(json_build(200, $mov->one(), 'Movimiento actualizado con éxito'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function bee_save_options()
  {
    $options =
      [
        'use_taxes' => $_POST['use_taxes'],
        'taxes'     => (float) $_POST['taxes'],
        'coin'      => $_POST['coin']
      ];

    foreach ($options as $k => $option) {
      try {
        if (!$id = optionModel::save($k, $option)) {
          json_output(json_build(400, null, sprintf('Hubo error al guardar la opción %s', $k)));
        }
      } catch (Exception $e) {
        json_output(json_build(400, null, $e->getMessage()));
      }
    }

    // se guardó con éxito
    json_output(json_build(200, null, 'Opciones actualizadas con éxito'));
  }

  function add_brand_form()
  {
    try {
      $nombre = clean($_POST['name_brand']);

      /* if(strlen($nombre) < 2){
        json_output(json_build(400, null, 'El nombre es corto'));
      } */
      $data =
        [
          'nombre_marca'              => $nombre,
          'dateCreation_marca'        => now(),
          'dateUpdate_marca'          => now()
        ];
      if (!$id = marcasModel::add(marcasModel::$t1, $data)) {
        json_output(json_build(400, null, 'Hubo error al guardar el registro'));
      }

      // se guardó con éxito
      $marcas = marcasModel::by_id($id);
      json_output(json_build(201, $marcas, 'Marca agregado con exito. '));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function add_category_form()
  {
    try {
      $nombre = clean($_POST['name_category']);
      $descripcion = clean($_POST['description_category']);
      /* if(strlen($nombre) < 2){
        json_output(json_build(400, null, 'El nombre es corto'));
      } */
      $data =
        [
          'nombre_categoria'              => $nombre,
          'descripcion_categoria'         => $descripcion,
          'dateCreation_categoria'        => now(),
          'dateUpdate_categoria'          => now()
        ];
      if (!$id = categoriasModel::add(categoriasModel::$t1, $data)) {
        json_output(json_build(400, null, 'Hubo error al guardar el registro'));
      }

      // se guardó con éxito
      $categorias = categoriasModel::by_id($id);
      json_output(json_build(201, $categorias, 'Marca agregado con exito. '));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function add_product_form()
  {
    try {
      $nombre = clean($_POST['name_product']);
      $codigoBarra = clean($_POST['barCode_product']);
      $codigo = clean($_POST['code_product']);
      $marca_id = clean($_POST['brand_id']);
      $categoria_id = clean($_POST['category_id']);

      if (!$nombre) {
        json_output(json_build(400, null, 'Ingrese Nombre'));
      }
      if (!$marca_id) {
        json_output(json_build(400, null, 'Seleccione una Marca'));
      }
      $data =
        [
          'nombre_producto'              => $nombre,
          'codigoBarra_producto'         => $codigoBarra,
          'codigo_producto'              => $codigo,
          'marca_id'                     => $marca_id,
          'categoria_id'                 => $categoria_id,
          'dateCreation_producto'        => now(),
          'dateUpdate_producto'          => now()
        ];
      if (!$id = productosModel::add(productosModel::$t1, $data)) {
        json_output(json_build(400, null, 'Hubo error al guardar el registro'));
      }

      // se guardó con éxito
      $productos = productosModel::by_id($id);
      json_output(json_build(201, $productos, 'Producto agregado con exito. '));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function get_product_form()
  {
    try {
      $id = clean($_POST['id']);
      if (!$producto = productosModel::by_id($id)) {
        throw new PDOException('El Producto no existe en la base de datos.');
      }

      json_output(json_build(200, $producto));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  function delete_product()
  {
    try {
      $id_producto = clean($_POST['id']);

      // Validar que exista la producto
      if (!$producto = productosModel::by_id($id_producto)) {
        throw new Exception('No existe el producto en la base de datos.');
      }

      if (!productosModel::remove(productosModel::$t1, ['id_producto' => $id_producto], 1)) {
        json_output(json_build(400, null, 'Hubo un error al borrar el producto.'));
      }

      json_output(json_build(200, null, 'Producto borrada con éxito.'));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }
  // Agregar un Ingreso
  function add_income_form()
  {
    try {
      $numero_ingreso = clean($_POST['number-income']);
      $fechaMovimiento_ingreso = clean($_POST['date-income']);
      $cantidadTotal_ingreso = clean($_POST['totalProducts-income']);
      $precioTotal_ingreso = floatval(clean($_POST['totalPrice-income']));
      $detalle_ingreso = json_decode($_POST['detail-income'], true);
      $tipoMovimiento_id = 1;
      $almacen_id = 1;

      if (!$fechaMovimiento_ingreso) {
        json_output(json_build(400, null, 'Ingrese fecha de Ingreso'));
      }
      if (!$detalle_ingreso) {
        json_output(json_build(400, null, 'Ingrese datos'));
      }
      $dataMovimientos =
        [
          'tipoMovimiento_id'            => $tipoMovimiento_id,
          'almacen_id'                  => $almacen_id,
          'fecha_movimiento'            => $fechaMovimiento_ingreso,
        ];

      if (!$id = movimientosModel::add(movimientosModel::$t1, $dataMovimientos)) {
        json_output(json_build(400, null, 'Hubo error al guardar el movimiento'));
      }
      $rptJson_movimientoUltimo = movimientosModel::lastMovement();
      $movimientoUltimo = $rptJson_movimientoUltimo[0]['mv'];
      $data =
        [
          'numero_ingreso'              => $numero_ingreso,
          'movimiento_id'               => $movimientoUltimo,
          'cantidadTotal_ingreso'       => $cantidadTotal_ingreso,
          'precioTotal_ingreso'         => $precioTotal_ingreso,
          'dateCreation_ingreso'        => now(),
          'dateUpdate_ingreso'          => now()
        ];
      if (!$id_ingreso = ingresosModel::add(ingresosModel::$t1, $data)) {
        json_output(json_build(400, null, 'Hubo error al guardar el ingreso'));
      }
      foreach ($detalle_ingreso as $item) {
        $ingresoDetalle =
          [
            'ingreso_id'                     => $numero_ingreso,
            /* 'lote_ingresoDetalle'            => 1, */
            'producto_id'                    => $item['product_id'],
            'cantidad_ingresoDetalle'        => $item['quantity'],
            'precioUnitario_ingresoDetalle'  => $item['priceUnit'],
            'precioTotal_ingresoDetalle'     => $item['priceTotal'],
          ];
        if (!$id = ingreso_detalleModel::add(ingreso_detalleModel::$t1, $ingresoDetalle)) {
          json_output(json_build(400, null, 'Hubo error al guardar el detalle'));
        }
      }

      // se guardó con éxito
      $productos = ingreso_detalleModel::by_id($id);
      $id_ingreso++;
      $productos['rptSig'] = $id_ingreso;
      /* var_dump($productos); */
      json_output(json_build(201, $productos, 'Ingreso agregado con exito. '));
    } catch (Exception $e) {
      json_output(json_build(400, null, $e->getMessage()));
    } catch (PDOException $e) {
      json_output(json_build(400, null, $e->getMessage()));
    }
  }

  /* function get_table_brands()
  {
    try {
      //var_dump(marcasModel::all_paginated());
      //debug(marcasModel::all_paginated());die;
      $data = get_module('tableMarcas', marcasModel::all_paginated());
      json_output(json_build(200, $data));
    } catch (Exception $e) {
      json_output(json_build(400, $e->getMessage()));
    }
  } */
}

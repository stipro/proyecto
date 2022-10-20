$(document).ready(function () {

  // Toast para notificaciones
  //toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!');

  // Waitme
  //$('body').waitMe({effect : 'orbit'});

  /**
   * Alerta para confirmar una acción establecida en un link o ruta específica
   */
  $('body').on('click', '.confirmar', function (e) {
    e.preventDefault();

    let url = $(this).attr('href'),
      ok = confirm('¿Estás seguro?');

    // Redirección a la URL del enlace
    if (ok) {
      window.location = url;
      return true;
    }

    console.log('Acción cancelada.');
    return true;
  });

  /**
   * Inicializa summernote el editor de texto avanzado para textareas
   */
  if ($('.summernote').length !== 0) {
    $('.summernote').summernote({
      placeholder: 'Escribe en este campo...',
      tabsize: 2,
      height: 300
    });
  }

  function zfill(number, width) {
    var numberOutput = Math.abs(number); /* Valor absoluto del número */
    var length = number.toString().length; /* Largo del número */
    var zero = "0"; /* String de cero */

    if (width <= length) {
      if (number < 0) {
        return ("-" + numberOutput.toString());
      } else {
        return numberOutput.toString();
      }
    } else {
      if (number < 0) {
        return ("-" + (zero.repeat(width - length)) + numberOutput.toString());
      } else {
        return ((zero.repeat(width - length)) + numberOutput.toString());
      }
    }
  }

  ////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////
  ///////// NO REQUERIDOS, SOLO PARA EL PROYECTO DEMO DE GASTOS E INGRESOS
  ////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////

  var totalProducts = 0;
  var totalAmounts = 0;

  var totalProducts_output = 0;
  var totalAmounts_output = 0;

  $('#insertIpt-brands-product, #insertIpt-categories-product').select2({
    theme: 'bootstrap-5',
    dropdownParent: $('#mdAdd-product'),
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: true,
    "language": {
      "noResults": function () {
        return "No se han encontrado resultados <a href='#' class='btn btn-danger'>úsalo de todos modos</a>";
      }
    },
    escapeMarkup: function (markup) {
      return markup;
    }
  });

  $('#editIpt-brands-product, #editIpt-categories-product').select2({
    theme: 'bootstrap-5',
    dropdownParent: $('#mdEdit-product'),
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: true,
    "language": {
      "noResults": function () {
        return "No se han encontrado resultados <a href='#' class='btn btn-danger'>úsalo de todos modos</a>";
      }
    },
    escapeMarkup: function (markup) {
      return markup;
    }
  });

  $('#insertIpt-product-income').select2({
    theme: 'bootstrap-5',
    dropdownParent: $('#mdAdd-income'),
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: true,
    "language": {
      "noResults": function () {
        return "No se han encontrado resultados <a href='#' class='btn btn-danger'>úsalo de todos modos</a>";
      }
    },
    escapeMarkup: function (markup) {
      return markup;
    }
  });

  $('#insertIpt-batch-income').select2({
    theme: 'bootstrap-5',
    dropdownParent: $('#mdAdd-income'),
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: true,
    "language": {
      "noResults": function () {
        return "No se han encontrado resultados <a href='#' class='btn btn-danger'>úsalo de todos modos</a>";
      }
    },
    escapeMarkup: function (markup) {
      return markup;
    }
  });

  $('#insertIpt-product-output').select2({
    theme: 'bootstrap-5',
    dropdownParent: $('#mdAdd-output'),
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: true,
    "language": {
      "noResults": function () {
        return "No se han encontrado resultados <a href='#' class='btn btn-danger'>úsalo de todos modos</a>";
      }
    },
    escapeMarkup: function (markup) {
      return markup;
    }
  }).on('change', function () {
    var value = $(this).find(":selected").data("id");
    console.log('Se detecto cambio' + value);
  });

  /* $('#insertIpt-product-output').select2().on('change', function () {
    var value = $(this).val();
    console.log('Se detecto cambio');
  }); */

  $('#insertIpt-batch-income').select2({
    theme: 'bootstrap-5',
    dropdownParent: $('#mdAdd-income'),
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: true,
    "language": {
      "noResults": function () {
        return "No se han encontrado resultados <a href='#' class='btn btn-danger'>úsalo de todos modos</a>";
      }
    },
    escapeMarkup: function (markup) {
      return markup;
    }
  });

  /* get_brands(); */
  function get_brands() {
    console.log('Obteniendo Marcas');
    var wrapper = $('.wrapper_brands'),
      hook = 'bee_hook',
      action = 'get';

    if (wrapper.length === 0) {
      return;
    }

    $.ajax({
      url: 'ajax/get_table_brands',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action
      },
      beforeSend: function () {
        wrapper.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        wrapper.html(res.data);
        //select2All();
      } else {
        toastr.error(res.msg, '¡Upss!');
        wrapper.html(res.msg);
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
      wrapper.html('Hubo un error al cargar los productos, intenta más tarde.');
    }).always(function () {
      wrapper.waitMe('hide');
    })
  }

  // Tabla detalle Ingreso
  var tbl_incomeDetail
  if ($('#tbl-incomeDetail')) {
    tbl_incomeDetail = $('#tbl-incomeDetail').DataTable({
      // Paginación
      paging: true,
      // Paginación defecto
      pageLength: 5,
      searching: false,
      select: true,
      responsive: true,
      columnDefs: [
        {
          searchable: false,
          orderable: false,
          targets: 0,
        },
      ],
      order: [[1, 'asc']],
      language: {
        url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json'
      }
    });
    tbl_incomeDetail.on('order.dt search.dt', function () {
      let i = 1;
      tbl_incomeDetail.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
        this.data(i++);
      });
    }).draw();
  }

  /* $('.tbl-incomeDetail').on('shown.bs.modal', function () {
    grid.columns.adjust();
  })  */

  /* $('.tbl-incomeDetail').on('shown.bs.modal', function () {
    tbl_incomeDetail.columns.adjust();
  }) */
  // Ocultamos ID
  tbl_incomeDetail.columns(1).visible(false);
  tbl_incomeDetail.columns(6).visible(false);
  var tbl_outputDetail;
  if ($('#tbl-incomeDetail')) {
    // Tabla detalle Salida
    var tbl_outputDetail = $('#tbl-outputDetail').DataTable({
      // Paginación
      paging: true,
      // Paginación defecto
      pageLength: 5,
      searching: false,
      select: true,
      responsive: true,
      olumnDefs: [
        {
          searchable: false,
          orderable: false,
          targets: 0,
        },
      ],
      order: [[1, 'asc']],
      language: {
        url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json'
      }
    });
    tbl_outputDetail.on('order.dt search.dt', function () {
      let i = 1;
      tbl_outputDetail.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
        this.data(i++);
      });
    }).draw();
  }
  // Ocultamos ID
  tbl_outputDetail.columns(1).visible(false);
  tbl_outputDetail.columns(6).visible(false);

  $(window).on('shown.bs.modal', function (e) {
    $.fn.dataTable.tables({ visible: true, api: true })
      .columns.adjust()
      .responsive.recalc();
  });

  $(document).on('click', '#btnAdd-md-brand', function () {
    $('#mdAdd-brand').modal('show');
  });

  $(document).on('click', '#btnAdd-md-category', function () {
    $('#mdAdd-category').modal('show');
  });

  $(document).on('click', '#btnAdd-md-product', function () {
    $('#mdAdd-product').modal('show');
  });

  $(document).on('click', '.btnView_product', function () {
    $('#mdView-product').modal('show');
  });

  $(document).on('click', '.btnEdit_product', function () {
    $('#mdEdit-product').modal('show');
  });
  // Ingreso
  $(document).on('click', '#btnAdd-md-income', function () {
    $('#mdAdd-income').modal('show');
    $('#mdAdd-income').modal();
  });
  // Salida
  $(document).on('click', '#btnAdd-md-output', function () {
    $('#mdAdd-output').modal('show');
  });

  // Agregar una Marca
  $('#add_brand_form').on('submit', add_brand_form);
  function add_brand_form(e) {
    e.preventDefault();
    var form = $(this),
      data = new FormData(form.get(0));
    // AJAX
    $.ajax({
      url: 'ajax/add_brand_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        /* form.trigger('reset'); */
        /* get_brands(); */
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Agregar una Categoria
  $('#add_category_form').on('submit', add_category_form);
  function add_category_form(e) {
    e.preventDefault();
    var form = $(this),
      data = new FormData(form.get(0));
    // AJAX
    $.ajax({
      url: 'ajax/add_category_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        /* form.trigger('reset'); */
        /* get_category(); */
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Agregar una Producto
  $('#add_product_form').on('submit', add_product_form);
  function add_product_form(e) {
    e.preventDefault();
    let val_brandId = $('#insertIpt-brands-product').find(':selected').data('id');
    let val_categoryId = $('#insertIpt-categories-product').find(':selected').data('id');
    var form = $(this),
      data = new FormData(form.get(0));
    data.append("brand_id", JSON.stringify(val_brandId));
    data.append("category_id", JSON.stringify(val_categoryId));

    // Validar selección
    if (!val_brandId) {
      toastr.error('Seleccióne Marca', '¡Upss!');
      return;
    }

    // Validar selección
    if (!val_categoryId) {
      toastr.error('Seleccióne Categoria', '¡Upss!');
      return;
    }

    // AJAX
    $.ajax({
      url: 'ajax/add_product_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        /* form.trigger('reset'); */
        /* get_category(); */
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Cargar información de presentación [VISTA]
  $('body').on('click', '.btnView_product', btnView_product);
  function btnView_product(e) {
    e.preventDefault();

    var button = $(this),
      id = button.data('id'),
      action = 'get',
      hook = 'bee_hook',
      form_e = $('#view_product_form');

    // Cargar la información del registro de la lección
    $.ajax({
      url: 'ajax/get_product_form',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('.view_product_form').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        let nombre_producto = res.data.nombre_producto ? res.data.nombre_producto : '-';
        $('[name="name-product"]', form_e).val(nombre_producto);
        let codigo_producto = res.data.codigo_producto ? res.data.codigo_producto : '-';
        $('[name="code-product"]', form_e).val(codigo_producto);
        let codigoBarra_producto = res.data.codigoBarra_producto ? res.data.codigoBarra_producto : '-';
        $('[name="barCode-product"]', form_e).val(codigoBarra_producto);

        $('#viewIpt-brands-product').empty().append($('<option>', {
          value: res.data.nombre_marca,
          text: res.data.nombre_marca
        }));
        $('#viewIpt-categories-product').empty().append($('<option>', {
          value: res.data.nombre_categoria,
          text: res.data.nombre_categoria
        }));

      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('.view_product_form').waitMe('hide');
    })
  }

  // Cargar información de producto [EDITAR]
  $('body').on('click', '.btnEdit_product', btnEdit_product);
  function btnEdit_product(e) {
    e.preventDefault();

    var button = $(this),
      id = button.data('id'),
      action = 'get',
      hook = 'bee_hook',
      form_e = $('#edit_product_form');

    // Cargar la información del registro de la indicación
    $.ajax({
      url: 'ajax/get_product_form',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('.edit_product_form').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        /* $('[name="id"]', form_e).val(res.data.id_producto); */
        let nombre_producto = res.data.nombre_producto ? res.data.nombre_producto : '-';
        $('[name="name-product"]', form_e).val(nombre_producto);
        let codigo_producto = res.data.codigo_producto ? res.data.codigo_producto : '-';
        $('[name="code-product"]', form_e).val(codigo_producto);
        let codigoBarra_producto = res.data.codigoBarra_producto ? res.data.codigoBarra_producto : '-';
        $('[name="barCode-product"]', form_e).val(codigoBarra_producto);

        $('#editIpt-brands-product option[data-id=' + res.data.marca_id + ']').attr("selected", true);
        $("#editIpt-brands-product").trigger('change');
        $('#editIpt-categories-product option[data-id=' + res.data.categoria_id + ']').attr("selected", true);
        $("#editIpt-categories-product").trigger('change');
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('.edit_product_form').waitMe('hide');
    })
  }

  // Borrar un producto
  $('body').on('click', '.btnDelete_product', btnDelete_product);
  function btnDelete_product(e) {
    e.preventDefault();
    console.log(this);
    var boton = $(this),
      id = boton.data('id'),
      hook = 'bee_hook',
      action = 'delete';

    swal({
      title: "Estas seguro?",
      text: "Una vez eliminado, no podrá recuperarlo!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: 'ajax/delete_product',
          type: 'POST',
          dataType: 'json',
          cache: false,
          data: {
            hook, action, id
          },
          beforeSend: function () {
            $('body').waitMe();
          }
        }).done(function (res) {
          if (res.status === 200) {
            toastr.success(res.msg, 'Bien!');
            swal("¡La información ha sido eliminado!", {
              icon: "success",
            });
          } else {
            toastr.error(res.msg, '¡Upss!');
          }
        }).fail(function (err) {
          toastr.error('Hubo un error en la petición', '¡Upss!');
        }).always(function () {
          $('body').waitMe('hide');
        })

      } else {
        swal("¡La información está a salvo!");
      }
    });
  }

  const mBtnAdd_Detail_income = document.getElementById("mbtnAdd-Detail-income");
  const mBtnAdd_Detail_output = document.getElementById("mbtnAdd-Detail-output");

  const ipt_quantity_income = document.getElementById("insertIpt-quantity-income");
  const ipt_priceUnit_income = document.getElementById("insertIpt-priceUnit-income");
  const ipt_priceTotal_income = document.getElementById("insertIpt-priceTotal-income");

  const ipt_quantity_output = document.getElementById("insertIpt-quantity-output");
  const ipt_priceUnit_output = document.getElementById("insertIpt-priceUnit-output");
  const ipt_priceTotal_output = document.getElementById("insertIpt-priceTotal-output");

  $("#insertIpt-quantity-income").keyup(function (event) {
    // Capturando Valor
    let val_priceUnit = $("#insertIpt-priceUnit-income").val();
    let val_priceTotal = $("#insertIpt-priceTotal-income").val();

    // Validaciones de Strin empty
    let rptValid_priceUnit = validStringEmpty(val_priceUnit);
    let rptValid_priceTotal = validStringEmpty(val_priceTotal);
    // Agregar ceros / Calcular
    rptValid_priceUnit && rptValid_priceTotal ? (
      $("#insertIpt-priceUnit-income").val(Number.parseFloat('0.00').toFixed(2)),
      $("#insertIpt-priceTotal-income").val(Number.parseFloat('0.00').toFixed(2))
    ) : (
      // Calculando
      cal_priceTotal = parseFloat($(this).val()) * parseFloat(val_priceUnit),
      ipt_priceTotal_income.value = Number.parseFloat(cal_priceTotal).toFixed(2)
    );
  });

  $("#insertIpt-quantity-income").blur(function () {
    let val_priceUnit = $("#insertIpt-priceUnit-income").val();
    let val_priceTotal = $("#insertIpt-priceTotal-income").val();
    // Validaciones de Strin empty
    let rptValid_priceUnit = validStringEmpty(val_priceUnit);
    let rptValid_priceTotal = validStringEmpty(val_priceTotal);
    // Agregar ceros / Calcular
    rptValid_priceUnit && rptValid_priceTotal ? (
      $("#insertIpt-priceUnit-income").val(Number.parseFloat('0.00').toFixed(2)),
      $("#insertIpt-priceTotal-income").val(Number.parseFloat('0.00').toFixed(2))
    ) : (
      // Calculando
      cal_priceTotal = parseFloat($(this).val()) * parseFloat(val_priceUnit),
      ipt_priceTotal_income.value = Number.parseFloat(cal_priceTotal).toFixed(2)
    );
  });

  $("#insertIpt-priceUnit-income").keyup(function (event) {
    // Capturando Valor
    let val_quantity = ipt_quantity_income.value;
    let val_priceTotal = ipt_priceTotal_income.value;
    // Validaciones de Strin empty
    let ptValid_quantity = validStringEmpty(val_quantity);
    let ptValid_priceTotal = validStringEmpty(val_priceTotal);
    ptValid_quantity && ptValid_priceTotal ? (
      $("#insertIpt-quantity-income").val(0),
      $("#insertIpt-priceTotal-income").val(Number.parseFloat('0.00').toFixed(2))
    ) : (
      // Calculando
      cal_priceTotal = parseFloat(val_quantity) * parseFloat($(this).val()),
      ipt_priceTotal_income.value = Number.parseFloat(cal_priceTotal).toFixed(2)
    );
  });

  $("#insertIpt-priceUnit-income").blur(function () {
    // Capturando Valor
    let val_quantity = ipt_quantity_income.value;
    $(this).val(Number.parseFloat($(this).val()).toFixed(2));
    // Calculando
    let cal_priceTotal = parseFloat($(this).val()) * parseFloat(val_quantity);
    ipt_priceTotal_income.value = Number.parseFloat(cal_priceTotal).toFixed(2);
  });

  $("#insertIpt-priceTotal-income").keyup(function (event) {
    // Capturando Valor
    let val_quantity = ipt_quantity_income.value;
    let val_priceUnit = ipt_priceUnit_income.value;
    // Validaciones de Strin empty
    validStringEmpty(ipt_quantity_income, val_quantity, '0');
    validStringEmpty(ipt_priceUnit_income, val_priceUnit, '0.00');
  });

  $("#insertIpt-priceTotal-income").blur(function () {
    // Capturando Valor
    let val_quantity = ipt_quantity_income.value;
    let val_priceUnit = ipt_priceUnit_income.value;
    ipt_priceUnit_income.value = Number.parseFloat(val_priceUnit).toFixed(2)
    $(this).val(Number.parseFloat($(this).val()).toFixed(2));
    // Calculando
    let cal_priceUnit = parseFloat($(this).val()) / parseFloat(val_quantity);
    ipt_priceUnit_income.value = Number.parseFloat(cal_priceUnit).toFixed(2);
  });

  function validStringEmpty(value) {
    if (typeof value === 'string' && value.length === 0) {
      return true;
    } else {
      return false;
    }
  }

  // Agregando Detalle Ingreso
  $("#mbtnAdd-Detail-income").on("click", add_incomeDetail);
  function add_incomeDetail(e) {
    // Capturando valores
    let val_productId = $('#insertIpt-product-income').find(':selected').data('id');
    let val_product = $('#insertIpt-product-income').find(':selected').val();
    let val_batchId = $('#insertIpt-batch-income').find(':selected').data('id');
    let val_batch = $('#insertIpt-batch-income').find(':selected').val();
    let val_quantity = $("#insertIpt-quantity-income").val();
    let val_priceUnit = $("#insertIpt-priceUnit-income").val();
    let val_priceTotal = $("#insertIpt-priceTotal-income").val();

    totalProducts = parseInt(totalProducts) + parseInt(val_quantity);
    totalAmounts = parseFloat(totalAmounts) + parseFloat(val_priceTotal);

    $("#totalProducts-income").text(totalProducts);
    $("#totalAmounts-income").text(Number.parseFloat(totalAmounts).toFixed(2));

    if (val_quantity > 0 && val_productId) {
      tbl_incomeDetail.row.add(
        [
          '',
          val_productId,
          val_product,
          val_quantity,
          val_priceUnit,
          val_priceTotal,
          val_batchId,
          '<button class="btn btn-danger removeRow"><i class="fa fa-minus-square" aria-hidden="true"></i>'
        ]
      ).draw();
    }
    else {
      toastr.error('Se necesita cantidad', 'Error Detalle');
    }
  }

  // Eliminan Detalle Ingreso
  $('#tbl-incomeDetail tbody').on('click', 'button.removeRow', function () {
    let rowData = tbl_incomeDetail.row($(this).parents('tr')).data();
    tbl_incomeDetail.row($(this)).remove().draw();
    tbl_incomeDetail.row($(this).closest("tr")).remove().draw();
    totalProducts = parseInt(totalProducts) - parseInt(rowData[3]);
    totalAmounts = parseFloat(totalAmounts) - parseFloat(rowData[5]);
    $("#totalProducts-income").text(totalProducts);
    $("#totalAmounts-income").text(Number.parseFloat(totalAmounts).toFixed(2));
  });

  // Agregar un Ingreso
  $('#add_income_form').on('submit', add_income_form);
  function add_income_form(e) {
    e.preventDefault();
    // Declaración de Variable
    let valArray_incomeDetail = [];
    // Detalle de ingreso
    let form_detalle_income = tbl_incomeDetail.rows().data();
    var f = form_detalle_income;
    for (var i = 0; f.length > i; i++) {
      var n = f[i].length;
      valArray_incomeDetail.push({
        'numeration': f[i][0],
        'product_id': f[i][1],
        'quantity': f[i][3],
        'priceUnit': f[i][4],
        'priceTotal': f[i][5],
      });
    }
    let val_totalProducts = $("#totalProducts-income").text();
    let val_totalAmounts = $("#totalAmounts-income").text();
    var form = $(this),
      data = new FormData(form.get(0));
    // Agregando
    data.append("detail-income", JSON.stringify(valArray_incomeDetail));
    data.append("totalProducts-income", JSON.stringify(parseInt(val_totalProducts)));
    data.append("totalPrice-income", JSON.stringify(parseFloat(val_totalAmounts)));

    // AJAX
    $.ajax({
      url: 'ajax/add_income_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 201) {
        numSig = res.data.rptSig;
        console.log(zfill(numSig, 8));
        $("#insertIpt-number-income").val(zfill(numSig, 8));
        $("#totalProducts-income").text(0);
        $("#totalAmounts-income").text('0.00');
        tbl_incomeDetail.clear().draw();
        toastr.success(res.msg, '¡Bien!');
        /* form.trigger('reset'); */
        /* get_category(); */
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Agregando Detalle Salida
  $("#mbtnAdd-Detail-output").on("click", add_outputDetail);
  function add_outputDetail(e) {
    // Capturando valores
    let val_productId = $('#insertIpt-product-output').find(':selected').data('id');
    let val_product = $('#insertIpt-product-output').find(':selected').val();
    let val_batchId = $('#insertIpt-batch-output').find(':selected').data('id');
    let val_batch = $('#insertIpt-batch-output').find(':selected').val();
    let val_quantity = $("#insertIpt-quantity-output").val();
    let val_priceUnit = $("#insertIpt-priceUnit-output").val();
    let val_priceTotal = $("#insertIpt-priceTotal-output").val();

    totalProducts_output = parseInt(totalProducts_output) + parseInt(val_quantity);
    totalAmounts_output = parseFloat(totalAmounts_output) + parseFloat(val_priceTotal);

    $("#totalProducts-output").text(totalProducts_output);
    $("#totalAmounts-output").text(Number.parseFloat(totalAmounts_output).toFixed(2));

    if (val_quantity > 0 && val_productId) {
      tbl_outputDetail.row.add(
        [
          '',
          val_productId,
          val_product,
          val_quantity,
          val_priceUnit,
          val_priceTotal,
          val_batchId,
          '<button class="btn btn-danger removeRow_output"><i class="fa fa-minus-square" aria-hidden="true"></i>'
        ]
      ).draw();
    }
    else {
      toastr.error('Se necesita cantidad', 'Error Detalle');
    }
  }

  // Eliminan Detalle Salida
  $('#tbl-outputDetail tbody').on('click', 'button.removeRow_output', function () {
    let rowData = tbl_outputDetail.row($(this).parents('tr')).data();
    tbl_outputDetail.row($(this)).remove().draw();
    tbl_outputDetail.row($(this).closest("tr")).remove().draw();
    totalProducts_output = parseInt(totalProducts_output) - parseInt(rowData[3]);
    totalAmounts_output = parseFloat(totalAmounts_output) - parseFloat(rowData[5]);
    $("#totalProducts-output").text(totalProducts_output);
    $("#totalAmounts-output").text(Number.parseFloat(totalAmounts_output).toFixed(2));
  });

  // Agregar una salida
  $('#add_output_form').on('submit', add_output_form);
  function add_output_form(e) {
    e.preventDefault();
    // Declaración de Variable
    let valArray_outputDetail = [];
    let val_brandId = $('#insertIpt-brands-product').find(':selected').data('id');
    let val_categoryId = $('#insertIpt-categories-product').find(':selected').data('id');
    var form = $(this),
      data = new FormData(form.get(0));
    data.append("brand_id", JSON.stringify(val_brandId));
    data.append("category_id", JSON.stringify(val_categoryId));

    // Validar selección
    if (!val_brandId) {
      toastr.error('Seleccióne Marca', '¡Upss!');
      return;
    }

    // Validar selección
    if (!val_categoryId) {
      toastr.error('Seleccióne Categoria', '¡Upss!');
      return;
    }

    // AJAX
    $.ajax({
      url: 'ajax/add_output_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        //form.trigger('reset');
        //get_category();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

});



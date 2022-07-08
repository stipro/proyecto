<?php require_once INCLUDES . 'inc_header.php'; ?>
<div id="main-wrapper">
  <?php require_once INCLUDES . 'inc_navbar.php'; ?>
  <div class="card rounded-0">
    <div class="card-header">
      <h2><?php echo $d->title; ?>
        <a class="btn blue fright" id="btnAdd-md-output"><i class="fa fa-arrow-up"></i>Salida</a>
        <a class="btn green fright" id="btnAdd-md-income"><i class="fa fa-arrow-down"></i>Ingreso</a>
      </h2>
    </div>
    <div class="card-body">
      <div id="table-head">
        <form method="post" action="" name="searchf">
          <input type="text" name="search" placeholder="Buscar..." class="search fleft" value="" />
        </form>
        <img src="media/img/loader-small.gif" class="fleft loader" width="15" height="15" />
        <div class="fright">
          <div class="select-holder">
            <i class="fa fa-caret-down"></i>
            <select name="show-per-page">
              <option value="25" selected>25</option>
              <option value="50">50</option>
              <option value="100">100</option>
              <option value="150">150</option>
              <option value="200">200</option>
              <option value="300">300</option>
              <option value="500">500</option>
            </select>
          </div>
        </div>
        <div class="fright" style="height:5px; margin-right:55px;"></div>
      </div>

      <div class="wrapper_kardex table-responsive">
        <?php if (empty($d->kardex->rows)) : ?>

        <div class="text-center py-5">
          <img src="<?php echo IMAGES . 'file.png'; ?>" alt="No hay registros" class="img-fluid" style="width: 120px;">
          <p class="text-muted">No hay registro de Kardex en la base de datos.</p>
        </div>

        <?php else : ?>
          
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th><input type="checkbox" name="select-all" /></th>
                <th width="6%">ID</th>
                <th width="6%">Cod.</th>
                <th width="6%">Ingreso</th>
                <th width="6%">S/</th>
                <th width="6%">Salida</th>
                <th width="6%">S/</th>
                <th width="6%">Saldo</th>
                <th width="6%">S/</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($d->kardex->rows as $t) : ?>
                <tr data-type="element" data-id="">
                  <td><input type="checkbox" name="chbox" value="<?php echo $t->tipoMovimiento_id; ?>" /></td>
                  <td class="hover"><?php echo $t->tipoMovimiento_id ?></td>
                  <td class="hover"><?php echo $t->tipoMovimiento_id ?></td>
                  <td class="hover"><?php echo $t->ingreso ?></td>
                  <td class="hover"><?php echo $t->ingreso_dinero ?></td>
                  <td class="hover"><?php echo $t->salida ?></td>
                  <td class="hover"><?php echo $t->salida_dinero ?></td>
                  <td class="hover"><?php echo $t->Saldo ?></td>
                  <td class="hover"><?php echo $t->SaldoMoney ?></td>
                  <td class="text-center" style="width:15rem;">
                    <div class="btn-group"><!-- 
                      <a href="" name="c3" title="Ver" class="btnView_product" data-id="<?php echo $t->id_producto; ?>"><i class="fas fa-eye"></i></a>
                      <a href="" name="c3" title="Editar" class="btnEdit_product" data-id="<?php echo $t->id_producto; ?>"><i class="fa fa-pencil"></i></a>
                      <a href="" name="c3" title="Elimnar" class="btnDelete_product" data-id="<?php echo $t->id_producto; ?>"><i class="fa fa-close"></i></a> -->
                      <button type="button" class="btn btn-info btn-sm btnView_product" data-id="<?php echo $t->id_producto; ?>">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button type="button" class="btn btn-warning btn-sm btnEdit_product" data-id="<?php echo $t->id_producto; ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                      <button type="button" class="btn btn-danger btn-sm btnDelete_product" data-id="<?php echo $t->id_producto; ?>">
                        <i class="fas fa-trash"></i>
                      </button>

                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?php echo $d->kardex->pagination; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="clear" style="margin-bottom:40px;"></div>
  <div class="border" style="margin-bottom:30px;"></div>
</div>
<?php require_once INCLUDES . 'inc_footer.php'; ?>
<?php require_once VIEWS . 'ingresos/modals/create.php'; ?>
<?php require_once VIEWS . 'salidas/modals/create.php'; ?>
<?php require_once VIEWS . 'productos/modals/create.php'; ?>
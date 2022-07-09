<!-- Modal -->
<div class="modal fade" id="mdAdd-income" tabindex="-1" aria-labelledby="mdAdd-incomeLabel" aria-hidden="true" role="dialog" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg">
        <form id="add_income_form" class="row g-3">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdAdd-incomeLabel">[Creación] Ingreso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="form-group">
                                <label for="insertIpt-number-income" class="control-label">N° Ingreso <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="number-income" id="insertIpt-number-income" class="form-control form-control-sm" aria-label="Nombre" value="<?php echo $d->ningreso; ?>" placeholder="Error" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3">
                            <div class="form-group">
                                <label for="insertIpt-date-income" class="control-label">F. Ingreso <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="date" name="date-income" id="insertIpt-date-income" class="form-control form-control-sm" aria-label="Nombre" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 col-sm-6 col-md-4 col-lg-6">
                            <div class="form-group">
                                <label for="insertIpt-product-income" class="control-label">Producto <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <select name="product-income" id="insertIpt-product-income" class="form-select form-select-sm" data-placeholder="Escribe para buscar...">
                                        <option></option>
                                        <?php if (empty(get_all_productos())) : ?>
                                            <option value="--0--">--No se obtuvo informacion--</option>
                                        <?php else : ?>
                                            <?php foreach (get_all_productos() as $cl) : ?>
                                                <?php $validSelected = $cl[1] == 1 ? 'selected' : ''; ?>
                                                <?php echo sprintf('<option value="%s" data-id="%s" %s>%s</option>', $cl[0], $cl[1], $validSelected, $cl[2]); ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-product"><i class="bi bi-arrow-clockwise"></i></button>
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-md-product"><i class="bi bi-plus-lg"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 col-sm-6 col-md-4 col-lg-6">
                            <div class="form-group">
                                <label for="insertIpt-batch-income" class="control-label">Lote <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <select name="batch-income" id="insertIpt-batch-income" class="form-select form-select-sm" data-placeholder="Escribe para buscar...">
                                        <option value="sin Lote">sin Lote</option>
                                    </select>
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-batch"><i class="bi bi-arrow-clockwise"></i></button>
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-md-batch"><i class="bi bi-plus-lg"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-sm-3 col-md-2 col-lg-2">
                            <div class="form-group">
                                <label for="insertIpt-quantity-income" class="control-label">Cantidad <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="quantity-income" id="insertIpt-quantity-income" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Ingrese Cantidad" autofocus autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3 col-md-2 col-lg-2">
                            <div class="form-group">
                                <label for="insertIpt-priceUnit-income" class="control-label">Precio Unid <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="priceUnit-income" id="insertIpt-priceUnit-income" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Ingrese Precio Unid" autofocus autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3 col-lg-2">
                            <div class="form-group">
                                <label for="insertIpt-priceTotal-income" class="control-label">Precio Total
                                    <!-- PEN (Sol peruano) --><span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="priceTotal-income" id="insertIpt-priceTotal-income" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Ingrese Precio" autofocus autocomplete="off">
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="">S/</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-auto d-flex justify-content-end align-content-end flex-wrap">
                            <button type="button" class="btn btn-outline-success btn-sm mt-1" id="mbtnAdd-Detail-income">Agregar</button>
                        </div>
                    </div>
                    <div class="wrapper-incomeDetail table-responsive m-1">
                        <table id="tbl-incomeDetail" class="table table-striped table-hover dt-responsive tbl-incomeDetail" style="width:100%">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>idProducto</th>
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unit</th>
                                    <th>Importe Total</th>
                                    <th>idLote</th>
                                    <th>Acciónes</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-sm-7"></div>
                        <div class="col-sm-5 ml-auto">
                            <table class="table table-sm table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">Valor Venta</td>
                                        <td class="text-right bg-light">0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="left">I.G.V.</td>
                                        <td class="text-right bg-light">0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="left">Importe Total</td>
                                        <td class="text-right bg-light">0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="left">Importe Percepción</td>
                                        <td class="text-right bg-light">0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="left">Importe Total</td>
                                        <td class="text-right bg-light">0.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fright" data-bs-dismiss="modal">Cerrar</button>
                    <?php echo insert_inputs(); ?>
                    <button type="submit" id="mbtnInsert-income-insert" class="btn green fright">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
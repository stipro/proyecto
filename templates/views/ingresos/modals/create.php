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
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="insertIpt-product-income" class="control-label">Producto <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <select class="form-select form-select-sm" name="product-income" id="insertIpt-product-income" data-placeholder="Escribe para buscar...">
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
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="insertIpt-quantity-income" class="control-label">Cantidad <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="quantity-income" id="insertIpt-quantity-income" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Ingrese Cantidad" autofocus autocomplete="off">
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id=""><i class="bi bi-cloud-lightning-fill"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="insertIpt-price-income" class="control-label">Precio PEN (Sol peruano)<span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="price-income" id="insertIpt-price-income" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Ingrese Precio" autofocus autocomplete="off">
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="">S/</button>
                                </div>
                            </div>
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
<!-- Modal -->
<div class="modal fade" id="mdAdd-brand" tabindex="-1" aria-labelledby="mdAdd-brandLabel" aria-hidden="true" role="dialog" style="overflow-y: scroll;">
    <div class="modal-dialog modal-sm">
        <form id="add_brand_form" class="row g-3">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdAdd-brandLabel">[Creación] Marcas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name_brand" class="control-label">Nombre <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="name_brand" id="name_brand" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Escribe para buscar..." autofocus required autocomplete="off">
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-name"><i class="bi bi-cloud-lightning-fill"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fright" data-bs-dismiss="modal">Cerrar</button>
                    <?php echo insert_inputs(); ?>
                    <button type="submit" id="mbtnInsert-brand-insert" class="btn green fright">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="mdAdd-category" tabindex="-1" aria-labelledby="mdAdd-categoryLabel" aria-hidden="true" role="dialog" style="overflow-y: scroll;">
    <div class="modal-dialog modal-sm">
        <form id="add_category_form" class="row g-3">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdAdd-categoryLabel">[Creacion] Categorias</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name_category" class="control-label">Nombre <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="name_category" id="name_category" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Ingrese Nombre..." autofocus required autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="description_category" class="control-label">Descripción </label>
                                <div class="input-group input-group-sm">
                                    <textarea name="description_category" id="description_category" rows="5" cols="30" class="form-control form-control-sm" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fright" data-bs-dismiss="modal">Cerrar</button>
                    <?php echo insert_inputs(); ?>
                    <button type="submit" id="mbtnInsert-category-insert" class="btn green fright">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="container">
    <div class="row">
    <?php  
    if (isset($validation)) {
        print $validation->ListErrors();
    }
    ?>
        <div class="col-8">
            <h2>Añadir Veterinarios</h2>
            <form action="<?= base_url('UnLugarDeMimos/admin/vistas/veterinarios/agregar');?>" method="POST">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="direccion">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn  btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

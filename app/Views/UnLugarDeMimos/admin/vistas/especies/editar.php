<div class="container">
    <div class="row">
    <?php  
    if (isset($validation)) {
        print $validation->ListErrors();
    }
    ?>
        <div class="col-8">
            <h2>Agregar Especie</h2>
            <form action="<?= base_url('UnLugarDeMimos/actespecie');?>" method="POST">
            <input type="hidden" name="id" value="<?= $especie->id_especie?>"/>
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $especie->nombre?>">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn  btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

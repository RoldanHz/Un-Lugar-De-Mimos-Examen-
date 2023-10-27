<div class="container">
    <div class="row">
    <?php  
    if (isset($validation)) {
        print $validation->ListErrors();
    }
    ?>
        <div class="col-6">
            <h2>Editar Cliente</h2>
            <form action="<?= base_url('UnLugarDeMimos/actclientes');?>" method="POST">
            <input type="hidden" name="id" value="<?= $cliente->id_cliente?>"/>
                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $cliente->nombre?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" value="<?= $cliente->direccion?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" value="<?= $cliente->telefono?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Correo Electrónico</label>
                    <input type="text" class="form-control" name="correo" id="correo" value="<?= $cliente->correo_electronico?>">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn  btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

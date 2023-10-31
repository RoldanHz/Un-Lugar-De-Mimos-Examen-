<div class="container">
    <div class="row">
    <?php  
    if (isset($validation)) {
        print $validation->ListErrors();
    }
    ?>
        <div class="col-8">
            <h2>Buscar Veterinarios</h2>
            <form action="<?= base_url('UnLugarDeMimos/admin/vistas/veterinarios/buscar');?>" method="GET">
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


<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Veterinarios</h2>
            
            <table class="table">
                <thead>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                </thead>
                <tbody>
                <?php foreach ($veterinarios as $veterinario): ?>
                    <tr>
                        <td><?= $veterinario->nombre?></td>
                        <td><?= $veterinario->direccion?></td>
                        <td><?= $veterinario->telefono?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

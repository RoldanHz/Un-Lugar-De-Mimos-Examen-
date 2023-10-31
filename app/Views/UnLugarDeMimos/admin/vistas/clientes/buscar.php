<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Buscar Clientes</h2>
            <form action="<?= base_url('UnLugarDeMimos/admin/vistas/clientes/buscar'); ?>" method="GET">
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
                    <label for="" class="form-label">Correo Electrónico</label>
                    <input type="text" class="form-control" name="correo" id="correo">
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
            <h2>Clientes</h2>

            <table class="table">
                <thead>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente) : ?>
                        <tr>
                            <td><?= $cliente->nombre ?></td>
                            <td><?= $cliente->direccion ?></td>
                            <td><?= $cliente->telefono ?></td>
                            <td><?= $cliente->correo_electronico ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
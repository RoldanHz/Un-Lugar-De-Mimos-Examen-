<div class="container">
    <div class="row">
    <?php  
    if (isset($validation)) {
        print $validation->ListErrors();
    }
    ?>
        <div class="col-8">
            <h2>Buscar Especie</h2>
            <form action="<?= base_url('UnLugarDeMimos/admin/vistas/especies/buscar');?>" method="GET">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
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
            <h2>Especies</h2>
            
            <table class="table">
                <thead>
                    <th>Nombre</th> 
                </thead>
                <tbody>
                <?php foreach ($especies as $especie): ?>
                    <tr>
                        <td><?= $especie->nombre?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

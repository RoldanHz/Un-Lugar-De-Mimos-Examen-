<div class="container">
    <div class="row">
    <?php  
    if (isset($validation)) {
        print $validation->ListErrors();
    }
    ?>
        <div class="col-8">
            <h2>Buscar Dietas</h2>
            <form action="<?= base_url('UnLugarDeMimos/admin/vistas/dietas/buscar');?>" method="GET">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion">
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
            <h2>Dietas</h2>
            
            <table class="table">
                <thead>
                    <th>Nombre</th>
                    <th>Descripción</th> 
                </thead>
                <tbody>
                <?php foreach ($dietas as $dieta): ?>
                    <tr>
                        <td><?= $dieta->nombre?></td>
                        <td><?= $dieta->descripcion?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>


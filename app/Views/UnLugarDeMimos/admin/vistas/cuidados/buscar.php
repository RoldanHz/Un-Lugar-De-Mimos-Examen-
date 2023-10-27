<div class="container">
    <div class="row">
    <?php  
    if (isset($validation)) {
        print $validation->ListErrors();
    }
    ?>
        <div class="col-8">
            <h2>Agregar Cuidados</h2>
            <form action="<?= base_url('UnLugarDeMimos/admin/vistas/cuidados/buscar');?>" method="GET">
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
            <h2>Cuidados</h2>
            
            <table class="table">
                <thead>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </thead>
                <tbody>
                <?php foreach ($cuidados as $cuidado): ?>
                    <tr>
                        <td><?= $cuidado->nombre?></td>
                        <td><?= $cuidado->descripcion?></td> 
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

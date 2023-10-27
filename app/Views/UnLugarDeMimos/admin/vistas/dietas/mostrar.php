<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Dietas</h2>
            
            <table class="table">
                <thead>
                    <th>Nombre</th>
                    <th>Descripción</th> 
                    <th>Acciones</th>
                </thead>
                <tbody>
                <?php foreach ($dietas as $dieta): ?>
                    <tr>
                        <td><?= $dieta->nombre?></td>
                        <td><?= $dieta->descripcion?></td>
                        <td>
                            <a href="<?=base_url('UnLugarDeMimos/dietas/eliminar/'.$dieta->id_dieta);?>">Eliminar</a>
                            <a href="<?=base_url('UnLugarDeMimos/admin/vistas/dietas/editar/'.$dieta->id_dieta);?>">Editar</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

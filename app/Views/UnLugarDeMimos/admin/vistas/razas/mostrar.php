<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Razas</h2>
            
            <table class="table">
                <thead>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Especie</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                <?php foreach ($razas as $raza): ?>
                    <tr>
                        <td><?= $raza->nombre?></td>
                        <td><?= $raza->descripcion?></td>
                        <td><?= $raza->especie?></td>
                        <td>
                            <a href="<?=base_url('UnLugarDeMimos/razas/eliminar/'.$raza->id_raza);?>">Eliminar</a>
                            <a href="<?=base_url('UnLugarDeMimos/admin/vistas/razas/editar/'.$raza->id_raza);?>">Editar</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Veterinarios</h2>
            
            <table class="table">
                <thead>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                <?php foreach ($veterinarios as $veterinario): ?>
                    <tr>
                        <td><?= $veterinario->nombre?></td>
                        <td><?= $veterinario->direccion?></td>
                        <td><?= $veterinario->telefono?></td>
                        <td>
                            <a href="<?=base_url('UnLugarDeMimos/veterinarios/eliminar/'.$veterinario->id_veterinario);?>">Eliminar</a>
                            <a href="<?=base_url('UnLugarDeMimos/admin/vistas/veterinarios/editar/'.$veterinario->id_veterinario);?>">Editar</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

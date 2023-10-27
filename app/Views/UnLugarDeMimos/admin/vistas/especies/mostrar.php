<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Especies</h2>
            
            <table class="table">
                <thead>
                    <th>Nombre</th> 
                    <th>Acciones</th>
                </thead>
                <tbody>
                <?php foreach ($especies as $especie): ?>
                    <tr>
                        <td><?= $especie->nombre?></td>
                        <td>
                            <a href="<?=base_url('UnLugarDeMimos/especies/eliminar/'.$especie->id_especie);?>">Eliminar</a>
                            <a href="<?=base_url('UnLugarDeMimos/admin/vistas/especies/editar/'.$especie->id_especie);?>">Editar</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

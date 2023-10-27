<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Cuidados</h2>
            
            <table class="table">
                <thead>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                <?php foreach ($cuidados as $cuidado): ?>
                    <tr>
                        <td><?= $cuidado->nombre?></td>
                        <td><?= $cuidado->descripcion?></td> 
                        <td>
                            <a href="<?=base_url('UnLugarDeMimos/cuidados/eliminar/'.$cuidado->id_cuidado);?>">Eliminar</a>
                            <a href="<?=base_url('UnLugarDeMimos/admin/vistas/cuidados/editar/'.$cuidado->id_cuidado);?>">Editar</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

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
                    <th>Acciones</th>  
                </thead>
                <tbody>
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?= $cliente->nombre?></td>
                        <td><?= $cliente->direccion?></td>
                        <td><?= $cliente->telefono?></td>
                        <td><?= $cliente->correo_electronico?></td>
                        <td>
                            <a href="<?=base_url('UnLugarDeMimos/clientes/eliminar/'.$cliente->id_cliente);?>">Eliminar</a>
                            <a href="<?=base_url('UnLugarDeMimos/admin/vistas/clientes/editar/'.$cliente->id_cliente);?>">Editar</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

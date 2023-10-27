<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>    <main>Mascotas</main></h2>
            
            <table class="table">
                <thead>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Dieta</th>
                    <th>Descripción</th>
                    <th>Foto</th>
                    <th>Cuidado</th>
                    <th>Estado de Adopción</th>
                    <th>Veterinario</th>  
                    <th>Acciones</th>
                </thead>
                <tbody>
                <?php foreach ($mascotas as $mascota): ?>
                    <tr>
                        <td><?= $mascota->nombre?></td>
                        <td><?= $mascota->especie?></td>
                        <td><?= $mascota->raza?></td>
                        <td><?= $mascota->edad?></td>
                        <td><?= $mascota->sexo?></td>
                        <td><?= $mascota->dieta?></td>
                        <td><?= $mascota->descripcion?></td>
                        <td><?= $mascota->foto?></td>
                        <td><?= $mascota->cuidado?></td>
                        <td><?= $mascota->estado_adopcion?></td>
                        <td><?= $mascota->id_veterinario?></td>
                        <td>
                            <a href="<?=base_url('UnLugarDeMimos/mascotas/eliminar/'.$mascota->id_mascota);?>">Eliminar</a>
                            <a href="<?=base_url('UnLugarDeMimos/admin/vistas/mascotas/editar/'.$mascota->id_mascota);?>">Editar</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

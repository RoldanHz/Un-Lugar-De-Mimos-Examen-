<div class="container">
    <div class="row">
    <?php  
    if (isset($validation)) {
        print $validation->ListErrors();
    }
    ?>
        <div class="col-8">
            <h2>Agregar Mascotas</h2>
            <form action="<?= base_url('UnLugarDeMimos/admin/vistas/mascotas/buscar');?>" method="GET">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Especie</label>
                    <input type="text" class="form-control" name="especie">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Raza</label>
                    <input type="text" class="form-control" name="raza" >
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Edad</label>
                    <input type="text" class="form-control" name="edad" >
                </div>
                <div class="mb-3">
                    <label for="sexo">Sexo</label>
                    <input type="text" class="form-control" name="sexo" >
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Dieta</label>
                    <input type="text" class="form-control" name="dieta" >
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Foto</label>
                    <input type="text" class="form-control" name="foto">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Cuidado</label>
                    <input type="text" class="form-control" name="cuidado">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Estado de Adopción</label>
                    <input type="text" class="form-control" name="estado" >
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Veterinario</label>
                    <input type="text" class="form-control" name="veterinario" >
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
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

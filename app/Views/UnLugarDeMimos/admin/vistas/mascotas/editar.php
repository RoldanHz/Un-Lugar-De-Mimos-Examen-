<div class="container">
    <div class="row">
    <?php  
    if (isset($validation)) {
        print $validation->ListErrors();
    }
    ?>
        <div class="col-8">
            <h2>Editar Mascotas</h2>
            <form action="<?= base_url('UnLugarDeMimos/actmascota');?>" method="POST">
            <input type="hidden" name="id" value="<?= $mascota->id_mascota?>"/>
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $mascota->nombre?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Especie</label>
                    <select name="especie" class="form-control" value="<?= $mascota->especie?>">
                        <?php foreach ($especies as $especie):?>
                            <option value="<?=$especie->id_especie?>"><?=$especie->nombre?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Raza</label>
                    <select name="raza" class="form-control" value="<?= $mascota->raza?>">
                        <?php foreach ($razas as $raza):?>
                            <option value="<?=$raza->id_raza?>"><?=$raza->nombre?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Edad</label>
                    <input type="text" class="form-control" name="edad" id="edad" value="<?= $mascota->edad?>">
                </div>
                <div class="mb-3">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control" value="<?= $mascota->sexo?>">
                        <option value="Macho">Macho</option>
                        <option value="Hembra">Hembra</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Dieta</label>
                    <select name="dieta" class="form-control" value="<?= $mascota->dieta?>">
                        <?php foreach ($dietas as $dieta):?>
                            <option value="<?=$dieta->id_dieta?>"><?=$dieta->nombre?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?= $mascota->descripcion?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Foto</label>
                    <input type="text" class="form-control" name="foto" id="foto" value="<?= $mascota->foto?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Cuidado</label>
                    <select name="cuidado" id="cuidado" class="form-control" value="<?= $mascota->cuidado?>">
                        <?php foreach ($cuidados as $cuidado):?>
                            <option value="<?=$cuidado->id_cuidado?>"><?=$cuidado->nombre?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Estado de Adopción</label>
                    <select name="estado" id="estado" class="form-control" value="<?= $mascota->estado_adopcion?>">
                        <option value="Disponible">Disponible</option>
                        <option value="Adoptado">Adopatado</option>
                        <option value="En proceso">En proceso</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Veterinario</label>
                    <select name="veterinario" class="form-control" value="<?= $mascota->id_veterinario?>">
                        <?php foreach ($veterinarios as $veterinario):?>
                            <option value="<?=$veterinario->id_veterinario?>"><?=$veterinario->nombre?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn  btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
    <?php  
    if (isset($validation)) {
        print $validation->ListErrors();
    }
    ?>
        <div class="col-8">
            <h2>Agregar Mascotas</h2>
            <form action="<?= base_url('UnLugarDeMimos/admin/vistas/mascotas/agregar');?>" method="POST">
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Especie</label>
                    <select name="especie" class="form-control">
                        <?php foreach ($especies as $especie):?>
                            <option value="<?=$especie->id_especie?>"><?=$especie->nombre?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Raza</label>
                    <select name="raza" class="form-control">
                        <?php foreach ($razas as $raza):?>
                            <option value="<?=$raza->id_raza?>"><?=$raza->nombre?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Edad</label>
                    <input type="text" class="form-control" name="edad" id="edad">
                </div>
                <div class="mb-3">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" id="sexo" class="form-control" >
                        <option value="macho">Macho</option>
                        <option value="hembra">Hembra</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Dieta</label>
                    <select name="dieta" class="form-control">
                        <?php foreach ($dietas as $dieta):?>
                            <option value="<?=$dieta->id_dieta?>"><?=$dieta->nombre?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Foto</label>
                    <input type="text" class="form-control" name="foto" id="foto">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Cuidado</label>
                    <select name="cuidado" id="cuidado" class="form-control" >
                        <?php foreach ($cuidados as $cuidado):?>
                            <option value="<?=$cuidado->id_cuidado?>"><?=$cuidado->nombre?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Estado de Adopción</label>
                    <select name="estado" id="estado" class="form-control" >
                        <option value="Disponible">Disponible</option>
                        <option value="Adoptado">Adopatado</option>
                        <option value="En proceso">En proceso</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Veterinario</label>
                    <select name="veterinario" class="form-control">
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

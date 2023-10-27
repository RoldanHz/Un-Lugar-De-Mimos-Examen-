<div class="container">
    <div class="row">
    <?php  
    if (isset($validation)) {
        print $validation->ListErrors();
    }
    ?>
        <div class="col-8">
            <h2>Editar Raza</h2>
            <form action="<?= base_url('UnLugarDeMimos/actraza');?>" method="POST">
            <input type="hidden" name="id" value="<?= $raza->id_raza?>"/>
            <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $raza->nombre?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?= $raza->descripcion?>">
                </div> 
                <div class="mb-3">
                    <label for="" class="form-label">Especie</label>
                    <select name="especie" class="form-control" value="<?= $raza->especie?>">
                        <?php foreach ($especies as $especie):?>
                            <option value="<?=$especie->id_especie?>"><?=$especie->nombre?></option>
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

<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/LocalPublico.php';

const PAGE_TITLE = 'Procurar';
const PAGE_BACK = '../../';

include __DIR__.'/../../includes/header.php';

$locais = LocalPublico::all();

?>

<div class="row grid-divider">
    <div class="col-md-6">
        <h3>Por locais públicos</h3>
        <form action="results.php" method="POST">
            <div class="form-group">
                <label for="local_1Input">Local Público 1</label>
                <select required name="local_1" class="custom-select">
                    <option value="NULL" disabled selected>Selecionar Local Público 1</option>
                    <?php foreach ($locais as $local): ?>
                        <option value="<?= $local->latitude.';'.$local->longitude ?>"><?= $local->nome.' ('.$local->latitude.'; '.$local->longitude.')' ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="local_1Input">Local Público 2</label>
                <select required name="local_2" class="custom-select">
                    <option value="NULL" disabled selected>Selecionar Local Público 2</option>
                    <?php foreach ($locais as $local): ?>
                        <option value="<?= $local->latitude.';'.$local->longitude ?>"><?= $local->nome.' ('.$local->latitude.'; '.$local->longitude.')' ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <?php if(isset($error)): ?>
                <div class="alert alert-danger" role="alert"><?= $error ?></div>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary">Procurar</button>
        </form>
    </div>

    <div class="col-md-6">
        <h3>Por coordenadas</h3>
        <form action="results.php" method="POST">
            <div class="form-row">
                <div class="col form-group">
                    <label for="latitudeInput">Latitude</label>
                    <input name="latitude" value="<?= $latitude?>" required type="number" step="0.01" class="form-control" id="latitudeInput">
                </div>

                <div class="col form-group">
                    <label for="longitudeInput">Longitude</label>
                    <input name="longitude" value="<?= $longitude?>" required type="number" step="0.01" class="form-control" id="longitudeInput">
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="dLatitudeInput">Diferença Latitude</label>
                    <input name="dLatitude" value="<?= $dLatitude?>" required type="number" min="0" step="0.01" class="form-control" id="dLatitudeInput">
                </div>

                <div class="col form-group">
                    <label for="dLongitudeInput">Diferença Longitude</label>
                    <input name="dLongitude" value="<?= $dLongitude?>" required type="number" min="0" step="0.01" class="form-control" id="dLongitudeInput">
                </div>
            </div>

            <?php if(isset($error)): ?>
                <div class="alert alert-danger" role="alert"><?= $error ?></div>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary">Procurar</button>
        </form>
    </div>
</div>


<style>
.grid-divider {
  overflow-x: hidden;
  position: relative;
}

.grid-divider > .col-md-6:nth-child(n + 2):after {
    content: "";
    background-color: red;
    position: absolute;
    top: 0;
    bottom: 0;
    width: 1px;
    height: auto;
    left: -1px;
}

@media screen and (max-width: 767px) {
    .grid-divider > .col-md-6:nth-child(n + 2):after {
        width: 100%;
        height: 1px;
        left: 0;
    }
}
</style>

<?php include __DIR__.'/../../includes/footer.php'; ?>
<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/Item.php';
require_once __DIR__.'/../../models/LocalPublico.php';

const PAGE_TITLE = 'Itens';
const PAGE_SUBTITLE = 'Adicionar';
const PAGE_BACK = '../itens';

include __DIR__.'/../../includes/header.php';

$descricao = isset($_POST['descricao']) ? validateInput($_POST['descricao']) : NULL;
$localizacao = isset($_POST['localizacao']) ? validateInput($_POST['localizacao']) : NULL;
$latitude = isset($_POST['latitude']) ? validateInput($_POST['latitude']) : NULL;
$longitude = isset($_POST['longitude']) ? validateInput($_POST['longitude']) : NULL;
$local = isset($_POST['local']) ? validateInput($_POST['local']) : NULL;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($local) {
        $local = explode(';', $local);
        $latitude = floatval($local[0]);
        $longitude = floatval($local[1]);
    }

    if($descricao && $localizacao && ($latitude && $longitude)) {
        $item = new Item($descricao, $localizacao, $latitude, $longitude);

        $error = $item->save();

        if(!$error)
            flashMessageAndRedirect('Item adicionado com sucesso.', 'success');
    }
}

$locais = LocalPublico::all();
?>

<form method="POST">
    <div class="form-group">
        <label for="descricaoInput">Descrição</label>
        <input name="descricao" value="<?= $descricao ?>" required type="text" class="form-control" id="descricaoInput">
    </div>

    <div class="form-group">
        <label for="localizacaoInput">Localização</label>
        <input name="localizacao" value="<?= $localizacao ?>" required type="text" class="form-control" id="localizacaoInput">
    </div>

    <h5>Local Público:</h5>

    <div class="form-row">
        <div class="col form-group">
            <label for="latitudeInput">Latitude</label>
            <input name="latitude" value="<?= $latitude?>" type="number" step="0.01" class="form-control" id="latitudeInput">
        </div>

        <div class="col form-group">
            <label for="longitudeInput">Longitude</label>
            <input name="longitude" value="<?= $longitude?>" type="number" step="0.01" class="form-control" id="longitudeInput">
        </div>
    </div>

    <div class="text-muted text-center">Ou</div>

    <div class="form-group">
        <label for="localInput">Local Público</label>
        <select name="local" class="custom-select">
            <option value="NULL" disabled selected>Selecionar Local Público</option>
            <?php foreach ($locais as $local): ?>
                <option value="<?= $local->latitude.';'.$local->longitude ?>"><?= $local->nome.' ('.$local->latitude.'; '.$local->longitude.')' ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"><?= $error ?></div>
    <?php endif; ?>

    <button type="submit" class="btn btn-success">Confirmar</button>
</form>

<?php include __DIR__.'/../../includes/footer.php'; ?>
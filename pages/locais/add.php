<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/LocalPublico.php';

const PAGE_TITLE = 'Locais Públicos';
const PAGE_SUBTITLE = 'Adicionar';
const PAGE_BACK = '../locais';

include __DIR__.'/../../includes/header.php';

$latitude = isset($_POST['latitude']) ? validateInput($_POST['latitude']) : NULL;
$longitude = isset($_POST['longitude']) ? validateInput($_POST['longitude']) : NULL;
$nome = isset($_POST['nome']) ? validateInput($_POST['nome']) : NULL;
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($latitude && $longitude && $nome) {
        $local = new LocalPublico($nome, $latitude, $longitude);

        $error = $local->save();

        if(!$error)
            flashMessageAndRedirect('Local público adicionado com sucesso.', 'success');
    }
}
?>

<form method="POST">
    <div class="form-group">
        <label for="latitudeInput">Latitude</label>
        <input name="latitude" value="<?= $latitude?>" required type="number" step="0.01" class="form-control" id="latitudeInput">
    </div>
    <div class="form-group">
        <label for="longitudeInput">Longitude</label>
        <input name="longitude" value="<?= $longitude?>" required type="number" step="0.01" class="form-control" id="longitudeInput">
    </div>
    <div class="form-group">
        <label for="nomeInput">Nome</label>
        <input name="nome" value="<?= $nome ?>" required type="text" class="form-control" id="nomeInput">
    </div>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"><?= $error ?></div>
    <?php endif; ?>

    <button type="submit" class="btn btn-success">Confirmar</button>
</form>

<?php include __DIR__.'/../../includes/footer.php'; ?>
<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/LocalPublico.php';

const PAGE_TITLE = 'Locais Públicos';
const PAGE_SUBTITLE = 'Eliminar';
const PAGE_BACK = '../locais';

include __DIR__.'/../../includes/header.php';

$latitude = isset($_GET['latitude']) ? validateInput($_GET['latitude']) : NULL;
$longitude = isset($_GET['longitude']) ? validateInput($_GET['longitude']) : NULL;
$local = LocalPublico::find($latitude, $longitude);

if(!$local)
    flashMessageAndRedirect('Local público inválido.', 'danger');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $local->delete();
    flashMessageAndRedirect('Local público eliminado.', 'success');
}
?>

<form method="POST">
    <div class="form-group">
        <label for="latitudeInput">Latitude</label>
        <input disabled value="<?= $local->latitude?>" type="number" step="0.01" class="form-control" id="latitudeInput">
    </div>
    <div class="form-group">
        <label for="longitudeInput">Longitude</label>
        <input disabled value="<?= $local->longitude?>" type="number" step="0.01" class="form-control" id="longitudeInput">
    </div>
    <div class="form-group">
        <label for="nomeInput">Nome</label>
        <input disabled value="<?= $local->nome ?>" type="text" class="form-control" id="nomeInput">
    </div>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"><?= $error ?></div>
    <?php endif; ?>

    <button type="submit" class="btn btn-danger">Confirmar</button>
</form>

<?php include __DIR__.'/../../includes/footer.php'; ?>
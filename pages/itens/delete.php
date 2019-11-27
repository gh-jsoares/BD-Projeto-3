<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/Item.php';

const PAGE_TITLE = 'Locais Públicos';
const PAGE_SUBTITLE = 'Eliminar';
const PAGE_BACK = '../locais';

include __DIR__.'/../../includes/header.php';

$id = isset($_GET['id']) ? validateInput($_GET['id']) : NULL;
$item = Item::find($id);

if(!$item)
    flashMessageAndRedirect('Item inválido.', 'danger');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item->delete();
    flashMessageAndRedirect('Item eliminado.', 'success');
}
?>

<form method="POST">
    <div class="form-group">
        <label for="idInput">ID</label>
        <input disabled value="<?= $item->id ?>" type="number" class="form-control" id="idInput">
    </div>

    <div class="form-group">
        <label for="descricaoInput">Descrição</label>
        <input disabled value="<?= $item->descricao ?>" type="text" class="form-control" id="descricaoInput">
    </div>

    <div class="form-group">
        <label for="localizacaoInput">Localização</label>
        <input disabled value="<?= $item->localizacao ?>" type="text" class="form-control" id="localizacaoInput">
    </div>

    <div class="form-group">
        <label for="latitudeInput">Latitude</label>
        <input disabled value="<?= $item->latitude?>" type="number" step="0.01" class="form-control" id="latitudeInput">
    </div>

    <div class="form-group">
        <label for="longitudeInput">Longitude</label>
        <input disabled value="<?= $item->longitude?>" type="number" step="0.01" class="form-control" id="longitudeInput">
    </div>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"><?= $error ?></div>
    <?php endif; ?>

    <button type="submit" class="btn btn-danger">Confirmar</button>
</form>

<?php include __DIR__.'/../../includes/footer.php'; ?>
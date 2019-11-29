<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/Incidencia.php';

const PAGE_TITLE = 'Incidências';
const PAGE_SUBTITLE = 'Adicionar';
const PAGE_BACK = '../incidencias';

include __DIR__.'/../../includes/header.php';

$anomalia_id = isset($_POST['anomalia_id']) ? validateInput($_POST['anomalia_id']) : NULL;
$item_id = isset($_POST['item_id']) ? validateInput($_POST['item_id']) : NULL;
$email = isset($_POST['email']) ? validateInput($_POST['email']) : NULL;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($anomalia_id && $item_id && $email) {
        $incidencia = new Incidencia($anomalia_id, $item_id, $email);

        $error = $incidencia->save();

        if(!$error)
            flashMessageAndRedirect('Incidência adicionada com sucesso.', 'success');
    }
}
?>

<form method="POST">
    <div class="form-group">
        <label for="anomaliaInput">Anomalia</label>
        <input name="anomalia_id" value="<?= $anomalia_id ?>" required type="text" class="form-control" id="anomaliaInput">
    </div>

    <div class="form-group">
        <label for="itemInput">Item</label>
        <input name="item_id" value="<?= $item_id ?>" required type="text" class="form-control" id="itemInput">
    </div>

    <div class="form-group">
        <label for="emailInput">Email</label>
        <input name="email" value="<?= $email ?>" required type="email" class="form-control" id="emailInput">
    </div>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"><?= $error ?></div>
    <?php endif; ?>

    <button type="submit" class="btn btn-success">Confirmar</button>
</form>

<?php include __DIR__.'/../../includes/footer.php'; ?>
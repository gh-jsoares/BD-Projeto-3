<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/Incidencia.php';
require_once __DIR__.'/../../models/Anomalia.php';
require_once __DIR__.'/../../models/Item.php';
require_once __DIR__.'/../../models/UtilizadorQualificado.php';

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

$users = UtilizadorQualificado::all();
$items = Item::all();
$anomalias = Anomalia::all();
?>

<form method="POST">
    <div class="form-group">
        <label for="anomaliaInput">Item 2</label>
        <select name="anomalia_id" class="custom-select">
            <option value="NULL" disabled selected>Selecionar Anomalia</option>
            <?php foreach ($anomalias as $anomalia): ?>
                <option <?= $anomalia->id == $anomalia_id ? 'selected' : '' ?> value="<?= $anomalia->id ?>"><?= $anomalia->id ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="itemInput">Item</label>
        <select name="item_id" class="custom-select">
            <option value="NULL" disabled selected>Selecionar Item</option>
            <?php foreach ($items as $item): ?>
                <option <?= $item->id == $item_id ? 'selected' : '' ?> value="<?= $item->id ?>"><?= $item->id ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="emailInput">Email</label>
        <select name="email" class="custom-select">
            <option value="NULL" disabled selected>Selecionar Email</option>
            <?php foreach ($users as $user): ?>
                <option <?= $user->email == $email ? 'selected' : '' ?> value="<?= $user->email ?>"><?= $user->email ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"><?= $error ?></div>
    <?php endif; ?>

    <button type="submit" class="btn btn-success">Confirmar</button>
</form>

<?php include __DIR__.'/../../includes/footer.php'; ?>
<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/Duplicado.php';
require_once __DIR__.'/../../models/Item.php';

const PAGE_TITLE = 'Duplicados';
const PAGE_SUBTITLE = 'Adicionar';
const PAGE_BACK = '../duplicados';

include __DIR__.'/../../includes/header.php';

$item1 = isset($_POST['item1']) ? validateInput($_POST['item1']) : NULL;
$item2 = isset($_POST['item2']) ? validateInput($_POST['item2']) : NULL;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($item1 && $item2) {
        $duplicado = new Duplicado($item1, $item2);

        $error = $duplicado->save();

        if(!$error)
            flashMessageAndRedirect('Duplicado adicionado com sucesso.', 'success');
    }
}

$items = Item::all();
?>

<form method="POST">

    <div class="form-group">
        <label for="item1Input">Item 1</label>
        <select name="item1" class="custom-select">
            <option value="NULL" disabled selected>Selecionar Item 1</option>
            <?php foreach ($items as $item): ?>
                <option <?= $item->id == $item1 ? 'selected' : '' ?> value="<?= $item->id ?>"><?= $item->id ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="item2Input">Item 2</label>
        <select name="item2" class="custom-select">
            <option value="NULL" disabled selected>Selecionar Item 2</option>
            <?php foreach ($items as $item): ?>
                <option <?= $item->id == $item2 ? 'selected' : '' ?> value="<?= $item->id ?>"><?= $item->id ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"><?= $error ?></div>
    <?php endif; ?>

    <button type="submit" class="btn btn-success">Confirmar</button>
</form>

<?php include __DIR__.'/../../includes/footer.php'; ?>
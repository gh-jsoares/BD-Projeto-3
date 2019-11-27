<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/Duplicado.php';

const PAGE_TITLE = 'Duplicados';
const PAGE_SUBTITLE = 'Adicionar';
const PAGE_BACK = '../duplicados';

include __DIR__.'/../../includes/header.php';

$item1 = isset($_POST['item1']) ? validateInput($_POST['item1']) : NULL;
$item2 = isset($_POST['item2']) ? validateInput($_POST['item2']) : NULL;

if($item1 && $item2) {
    $duplicado = new Duplicado($item1, $item2);

    $error = $duplicado->save();

    if(!$error)
        flashMessageAndRedirect('Duplicado adicionado com sucesso.', 'success');
}
?>

<form method="POST">
    <div class="form-group">
        <label for="item1Input">Item 1</label>
        <input name="item1" value="<?= $item1 ?>" required type="text" class="form-control" id="item1Input">
    </div>

    <div class="form-group">
        <label for="item2Input">Item 2</label>
        <input name="item2" value="<?= $item2 ?>" required type="text" class="form-control" id="item2Input">
    </div>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"><?= $error ?></div>
    <?php endif; ?>

    <button type="submit" class="btn btn-success">Confirmar</button>
</form>

<?php include __DIR__.'/../../includes/footer.php'; ?>
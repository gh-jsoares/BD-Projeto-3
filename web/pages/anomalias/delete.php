<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/Anomalia.php';

const PAGE_TITLE = 'Anomalia';
const PAGE_SUBTITLE = 'Eliminar';
const PAGE_BACK = '../anomalias';

include __DIR__.'/../../includes/header.php';

$id = isset($_GET['id']) ? validateInput($_GET['id']) : NULL;
$anomalia = Anomalia::find($id);

if(!$anomalia)
    flashMessageAndRedirect('Anomalia inválida.', 'danger');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $anomalia->delete();
    flashMessageAndRedirect('Anomalia eliminada.', 'success');
}
?>

<form method="POST">
    <div class="form-group">
        <label for="zonaInput">Zona</label>
        <input disabled name="zona" value="<?= $anomalia->zona ?>" required type="text" class="form-control" id="zonaInput">
    </div>

    <div class="form-group">
        <label for="imagemInput">Imagem</label>
        <input disabled name="imagem" value="<?= $anomalia->imagem ?>" required type="text" class="form-control" id="imagemInput">
    </div>

    <div class="form-group">
        <label for="linguaInput">Lingua</label>
        <input disabled name="lingua" value="<?= $anomalia->lingua ?>" required type="text" class="form-control" id="linguaInput">
    </div>

    <div class="form-group">
        <label for="timestampInput">Timestamp</label>
        <input disabled name="timestamp" value="<?= (new DateTime($anomalia->ts))->format('Y-m-d\Th:i') ?>" required type="datetime-local" class="form-control" id="timestampInput">
    </div>

    <div class="form-group">
        <label for="descricaoInput">Descrição</label>
        <input disabled name="descricao" value="<?= $anomalia->descricao ?>" required type="text" class="form-control" id="descricaoInput">
    </div>

    <div class="form-group custom-control custom-switch">
        <input disabled name="tem_redacao" <?= $anomalia->tem_anomalia_redacao ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="tem_redacaoInput">
        <label class="custom-control-label" for="tem_redacaoInput">Tem Redação</label>
    </div>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"><?= $error ?></div>
    <?php endif; ?>

    <button type="submit" class="btn btn-danger">Confirmar</button>
</form>

<?php include __DIR__.'/../../includes/footer.php'; ?>
<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/Anomalia.php';

const PAGE_TITLE = 'Anomalias';
const PAGE_SUBTITLE = 'Adicionar';
const PAGE_BACK = '../anomalias';

include __DIR__.'/../../includes/header.php';

$zona = isset($_POST['zona']) ? validateInput($_POST['zona']) : NULL;
$imagem = isset($_POST['imagem']) ? validateInput($_POST['imagem']) : NULL;
$lingua = isset($_POST['lingua']) ? validateInput($_POST['lingua']) : NULL;
$timestamp = isset($_POST['timestamp']) ? validateInput($_POST['timestamp']) : (new DateTime('now', new DateTimeZone('Europe/Lisbon')))->format('Y-m-d\Th:i');
$descricao = isset($_POST['descricao']) ? validateInput($_POST['descricao']) : NULL;
$tem_redacao = isset($_POST['tem_redacao']) ? 1 : 0;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($zona && $imagem && $lingua && $timestamp && $descricao) {
        $anomalia = new Anomalia($zona, $imagem, $lingua, $timestamp, $descricao, $tem_redacao);

        $error = $anomalia->save();

        if(!$error)
            flashMessageAndRedirect('Anomalia adicionada com sucesso.', 'success');
    }
}
?>

<form method="POST">
    <div class="form-group">
        <label for="zonaInput">Zona</label>
        <input name="zona" value="<?= $zona ?>" required type="text" class="form-control" id="zonaInput">
    </div>

    <div class="form-group">
        <label for="imagemInput">Imagem</label>
        <input name="imagem" value="<?= $imagem ?>" required type="text" class="form-control" id="imagemInput">
    </div>

    <div class="form-group">
        <label for="linguaInput">Lingua</label>
        <input name="lingua" value="<?= $lingua ?>" required type="text" class="form-control" id="linguaInput">
    </div>

    <div class="form-group">
        <label for="timestampInput">Timestamp</label>
        <input name="timestamp" value="<?= $timestamp ?>" required type="datetime-local" class="form-control" id="timestampInput">
    </div>

    <div class="form-group">
        <label for="descricaoInput">Descrição</label>
        <input name="descricao" value="<?= $descricao ?>" required type="text" class="form-control" id="descricaoInput">
    </div>

    <div class="form-group custom-control custom-switch">
        <input name="tem_redacao" <?= $tem_redacao ? 'checked' : '' ?> type="checkbox" class="custom-control-input" id="tem_redacaoInput">
        <label class="custom-control-label" for="tem_redacaoInput">Tem Redação</label>
    </div>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"><?= $error ?></div>
    <?php endif; ?>

    <button type="submit" class="btn btn-success">Confirmar</button>
</form>

<?php include __DIR__.'/../../includes/footer.php'; ?>
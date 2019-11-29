<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/PropostaDeCorrecao.php';
require_once __DIR__.'/../../models/Incidencia.php';

const PAGE_TITLE = 'Propostas de Correção';
const PAGE_SUBTITLE = 'Eliminar';
const PAGE_BACK = '../correcoes';

include __DIR__.'/../../includes/header.php';

$email = isset($_GET['email']) ? validateInput($_GET['email']) : NULL;
$nro = isset($_GET['nro']) ? validateInput($_GET['nro']) : NULL;
$proposta = PropostaDeCorrecao::find($email, $nro);

if(!$proposta)
    flashMessageAndRedirect('Proposta de Correção inválida.', 'danger');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $proposta->delete();
    flashMessageAndRedirect('Proposta de Correção eliminada.', 'success');
}
?>

<form method="POST">
    <div class="form-group">
        <label for="emailInput">Email</label>
        <input disabled value="<?= $proposta->email?>" type="email" class="form-control" id="emailInput">
    </div>

    <div class="form-group">
        <label for="nroInput">Número</label>
        <input disabled value="<?= $proposta->nro?>" type="number" class="form-control" id="nroInput">
    </div>

    <div class="form-group">
        <label for="anomaliasInput">Anomalias</label>
        <select disabled name="anomalias[]" class="form-group custom-select" id="anomaliasInput" multiple size="3">
            <?php foreach (Incidencia::all() as $incidencia): ?>
                <option <?= in_array($incidencia->anomalia_id, array_map(function ($a) { return $a->anomalia_id; }, $proposta->correcoes())) ? 'selected' : '' ?>><?= $incidencia->anomalia_id ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="data_horaInput">Data - Hora</label>
        <input disabled name="data_hora" value="<?= (new DateTime($proposta->data_hora))->format('Y-m-d\Th:i') ?>" required type="datetime-local" class="form-control" id="data_horaInput">
    </div>

    <div class="form-group">
        <label for="textoInput">Texto</label>
        <input disabled value="<?= $proposta->texto ?>" type="text" class="form-control" id="textoInput">
    </div>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"><?= $error ?></div>
    <?php endif; ?>

    <button type="submit" class="btn btn-danger">Confirmar</button>
</form>

<?php include __DIR__.'/../../includes/footer.php'; ?>
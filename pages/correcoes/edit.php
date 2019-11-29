<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/PropostaDeCorrecao.php';
require_once __DIR__.'/../../models/Incidencia.php';

const PAGE_TITLE = 'Propostas de Correção';
const PAGE_SUBTITLE = 'Adicionar';
const PAGE_BACK = '../locais';

include __DIR__.'/../../includes/header.php';

$email = isset($_POST['email']) ? validateInput($_POST['email']) : NULL;
$nro = isset($_POST['nro']) ? validateInput($_POST['nro']) : NULL;
$anomalias = isset($_POST['anomalias']) ? array_map('validateInput', $_POST['anomalias']) : [];
$data_hora = isset($_POST['data_hora']) ? validateInput($_POST['data_hora']) : (new DateTime('now', new DateTimeZone('Europe/Lisbon')))->format('Y-m-d\Th:i');
$texto = isset($_POST['texto']) ? validateInput($_POST['texto']) : NULL;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($email && $anomalias && $data_hora && $texto && $nro) {
        $db->beginTransaction();
        try {
            $proposta = PropostaDeCorrecao::find($email, $nro);
            $error = $proposta->save();

            foreach ($proposta->correcoes() as $correcao) {
                if(!in_array($correcao->anomalia_id, $anomalias)) {
                    $correcao->delete();
                }
                $error = $correcao->save();
            }

            $anomalias = array_diff(array_map('intval', $anomalias), $proposta->correcoes())

            $correcao = new Correcao($email, $proposta->nro, intval($anomalia));

            $db->commitTransaction();
        } catch(PDOException $e) {
            $db->rollbackTransaction();
        }
        
        if(!$error)
            flashMessageAndRedirect('Proposta de Correção adicionada com sucesso.', 'success');
    } else {
        $error = 'Required fields missing';
    }
}
?>

<form method="POST">
    <div class="form-group">
        <label for="emailInput">Email</label>
        <input name="email" value="<?= $email?>" type="email" class="form-control" id="emailInput">
    </div>

    <select name="anomalias[]" class="form-group custom-select" multiple size="3">
        <?php foreach (Incidencia::all() as $incidencia): ?>
            <option value="<?= $incidencia->anomalia_id ?>" <?= in_array($incidencia->anomalia_id, $anomalias) ? 'selected' : '' ?>><?= $incidencia->anomalia_id ?></option>
        <?php endforeach; ?>
    </select>

    <div class="form-group">
        <label for="data_horaInput">Data - Hora</label>
        <input name="data_hora" value="<?= $data_hora ?>" required type="datetime-local" class="form-control" id="data_horaInput">
    </div>

    <div class="form-group">
        <label for="textoInput">Texto</label>
        <input name="texto" value="<?= $texto ?>" type="text" class="form-control" id="textoInput">
    </div>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"><?= $error ?></div>
    <?php endif; ?>

    <button type="submit" class="btn btn-success">Confirmar</button>
</form>

<?php include __DIR__.'/../../includes/footer.php'; ?>
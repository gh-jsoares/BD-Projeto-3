<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/PropostaDeCorrecao.php';
require_once __DIR__.'/../../models/Incidencia.php';

const PAGE_TITLE = 'Propostas de Correção';
const PAGE_SUBTITLE = 'Editar';
const PAGE_BACK = '../correcoes';

include __DIR__.'/../../includes/header.php';

$email = isset($_GET['email']) ? validateInput($_GET['email']) : NULL;
$nro = isset($_GET['nro']) ? validateInput($_GET['nro']) : NULL;
$proposta = PropostaDeCorrecao::find($email, $nro);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $anomalias = isset($_POST['anomalias']) ? array_map('validateInput', $_POST['anomalias']) : [];
    $data_hora = isset($_POST['data_hora']) ? validateInput($_POST['data_hora']) : (new DateTime('now', new DateTimeZone('Europe/Lisbon')))->format('Y-m-d\Th:i');
    $texto = isset($_POST['texto']) ? validateInput($_POST['texto']) : NULL;

    if($proposta && $anomalias && $data_hora && $texto) {
        $db->beginTransaction();
        try {
            $proposta->data_hora = $data_hora;
            $proposta->texto = $texto;
            $error = $proposta->save();

            foreach ($proposta->correcoes() as $correcao) {
                if(!in_array($correcao->anomalia_id, $anomalias)) {
                    $correcao->delete();
                }
                $error = $correcao->save();
            }

            $anomalias = array_diff(array_map('intval', $anomalias), array_map(function ($c) { return $c->anomalia_id; }, $proposta->correcoes()));
            
            foreach ($anomalias as $anomalia) {
                $correcao = new Correcao($email, $proposta->nro, $anomalia);
                $error = $correcao->save();
            }

            $db->commitTransaction();
        } catch(PDOException $e) {
            $db->rollbackTransaction();
        }
        
        if(!$error)
            flashMessageAndRedirect('Proposta de Correção editada com sucesso.', 'success');
    } else {
        $error = 'Required fields missing';
    }
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
        <select name="anomalias[]" class="form-group custom-select" id="anomaliasInput" multiple size="3">
            <?php foreach (Incidencia::all() as $incidencia): ?>
                <option <?= in_array($incidencia->anomalia_id, array_map(function ($a) { return $a->anomalia_id; }, $proposta->correcoes())) ? 'selected' : '' ?>><?= $incidencia->anomalia_id ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="data_horaInput">Data - Hora</label>
        <input name="data_hora" value="<?= (new DateTime($proposta->data_hora))->format('Y-m-d\Th:i') ?>" required type="datetime-local" class="form-control" id="data_horaInput">
    </div>

    <div class="form-group">
        <label for="textoInput">Texto</label>
        <input name="texto" value="<?= $proposta->texto ?>" type="text" class="form-control" id="textoInput">
    </div>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"><?= $error ?></div>
    <?php endif; ?>

    <button type="submit" class="btn btn-success">Confirmar</button>
</form>

<?php include __DIR__.'/../../includes/footer.php'; ?>
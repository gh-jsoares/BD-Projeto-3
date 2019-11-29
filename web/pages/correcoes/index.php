<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/PropostaDeCorrecao.php';

const PAGE_TITLE = 'Propostas de Correção';
const PAGE_BACK = '../../';

include __DIR__.'/../../includes/header.php';

$propostas = PropostaDeCorrecao::all();

?>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Email</th>
                <th>Número</th>
                <th>Anomalias</th>
                <th>Data - Hora</th>
                <th>Texto</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propostas as $proposta): ?>
                <tr>
                    <td><?= $proposta->email ?></td>
                    <td><?= $proposta->nro ?></td>
                    <td>
                        <?= count($proposta->correcoes()) == 0 ? 'Nenhuma anomalia' : '' ?>
                        <?php foreach ($proposta->correcoes() as $correcao): ?>
                            <?= $correcao->anomalia_id ?>
                        <?php endforeach; ?>
                    </td>
                    <td><?= $proposta->data_hora ?></td>
                    <td><?= $proposta->texto ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning text-white" href="edit.php?email=<?= $proposta->email ?>&nro=<?= $proposta->nro ?>"><i class="fa fa-pen"></i></a>
                        <a class="btn btn-sm btn-danger" href="delete.php?email=<?= $proposta->email ?>&nro=<?= $proposta->nro ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<a href="add.php" class="btn btn-primary">Adicionar Proposta de Correção</a>

<?php include __DIR__.'/../../includes/footer.php'; ?>
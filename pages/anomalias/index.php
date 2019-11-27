<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/Anomalia.php';

const PAGE_TITLE = 'Anomalias';
const PAGE_BACK = '../../';

include __DIR__.'/../../includes/header.php';

$anomalias = Anomalia::all();

?>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Zona</th>
                <th>Imagem</th>
                <th>Lingua</th>
                <th>Timestamp</th>
                <th>Descrição</th>
                <th>Tem Redação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anomalias as $anomalia): ?>
                <tr>
                    <td><?= $anomalia->id ?></td>
                    <td><?= $anomalia->zona ?></td>
                    <td><?= $anomalia->imagem ?></td>
                    <td><?= $anomalia->lingua ?></td>
                    <td class="timestamp"><?= $anomalia->ts ?></td>
                    <td><?= $anomalia->descricao ?></td>
                    <td><i class="fa fa-<?= $anomalia->tem_anomalia_redacao ? 'check' : 'times'?>"></i></td>
                    <td>
                        <a class="btn btn-sm btn-warning text-white" href="edit.php?id=<?= $anomalia->id ?>"><i class="fa fa-pen"></i></a>
                        <a class="btn btn-sm btn-danger" href="delete.php?id=<?= $anomalia->id ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<a href="add.php" class="btn btn-primary">Adicionar Anomalia</a>

<?php include __DIR__.'/../../includes/footer.php'; ?>
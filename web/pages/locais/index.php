<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/LocalPublico.php';

const PAGE_TITLE = 'Locais Públicos';
const PAGE_BACK = '../../';

include __DIR__.'/../../includes/header.php';

$locais = LocalPublico::all();

?>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locais as $local): ?>
                <tr>
                    <td><?= $local->latitude ?></td>
                    <td><?= $local->longitude ?></td>
                    <td><?= $local->nome ?></td>
                    <td>
                        <a class="btn btn-sm btn-danger" href="delete.php?latitude=<?= $local->latitude ?>&longitude=<?= $local->longitude ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<a href="<?= __DIR__ ?>add.php" class="btn btn-primary">Adicionar Local Público</a>

<?php include __DIR__.'/../../includes/footer.php'; ?>
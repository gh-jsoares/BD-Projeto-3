<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/Incidencia.php';

const PAGE_TITLE = 'Incidências';
const PAGE_BACK = '../../';

include __DIR__.'/../../includes/header.php';

$incidencias = Incidencia::all();

?>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Anomalia</th>
                <th>Item</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($incidencias as $incidencia): ?>
                <tr>
                    <td><?= $incidencia->anomalia_id ?></td>
                    <td><?= $incidencia->item_id ?></td>
                    <td><?= $incidencia->email ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<a href="add.php" class="btn btn-primary">Adicionar Incidência</a>

<?php include __DIR__.'/../../includes/footer.php'; ?>
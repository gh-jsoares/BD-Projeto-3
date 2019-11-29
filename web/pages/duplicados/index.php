<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/Duplicado.php';

const PAGE_TITLE = 'Duplicados';
const PAGE_BACK = '../../';

include __DIR__.'/../../includes/header.php';

$duplicados = Duplicado::all();

?>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Item 1</th>
                <th>Item 2</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($duplicados as $duplicado): ?>
                <tr>
                    <td><?= $duplicado->item1 ?></td>
                    <td><?= $duplicado->item2 ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<a href="add.php" class="btn btn-primary">Adicionar Duplicado</a>

<?php include __DIR__.'/../../includes/footer.php'; ?>
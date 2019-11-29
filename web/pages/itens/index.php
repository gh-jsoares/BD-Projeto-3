<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/Item.php';

const PAGE_TITLE = 'Itens';
const PAGE_BACK = '../../';

include __DIR__.'/../../includes/header.php';

$itens = Item::all();

?>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Localização</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itens as $item): ?>
                <tr>
                    <td><?= $item->id ?></td>
                    <td><?= $item->descricao ?></td>
                    <td><?= $item->localizacao ?></td>
                    <td><?= $item->latitude ?></td>
                    <td><?= $item->longitude ?></td>
                    <td>
                        <a class="btn btn-sm btn-danger" href="delete.php?id=<?= $item->id ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<a href="add.php" class="btn btn-primary">Adicionar Item</a>

<?php include __DIR__.'/../../includes/footer.php'; ?>
<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/LocalPublico.php';

$locais = LocalPublico::all();

include __DIR__.'/../../includes/header.php';
?>
<a href="../../">Voltar atrás</a>
<h1>Locais Públicos</h1>

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
                        <a class="btn btn-warning" href="edit.php?latitude=<?= $local->latitude ?>&longitude=<?= $local->longitude ?>">Editar</a>
                        <a class="btn btn-danger" href="delete.php?latitude=<?= $local->latitude ?>&longitude=<?= $local->longitude ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<a href="add.php" class="btn btn-primary">Adicionar Local Público</a>

<?php include __DIR__.'/../../includes/footer.php'; ?>
<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/LocalPublico.php';

$locais = LocalPublico::all();

include __DIR__.'/../../includes/header.php';
?>

<a href="../../">Voltar atrás</a>
<h1>Locais Públicos</h1>

<?php if(isset($_SESSION['success'])): ?>
    <div class="alert alert-success" role="alert"><?= $_SESSION['success'] ?></div>
<?php  unset($_SESSION['success']); endif; ?>

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
                        <a class="btn btn-sm btn-warning text-white" href="edit.php?latitude=<?= $local->latitude ?>&longitude=<?= $local->longitude ?>"><i class="fa fa-pen"></i></a>
                        <a class="btn btn-sm btn-danger" href="delete.php?latitude=<?= $local->latitude ?>&longitude=<?= $local->longitude ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<a href="add.php" class="btn btn-primary">Adicionar Local Público</a>

<?php include __DIR__.'/../../includes/footer.php'; ?>
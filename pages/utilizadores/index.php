<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/Utilizador.php';

const PAGE_TITLE = 'Utilizadores';
const PAGE_BACK = '../../';

include __DIR__.'/../../includes/header.php';

$users = Utilizador::all();

?>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Email</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): if($user->tipo()): ?>
                <tr>
                    <td><?= $user->email ?></td>
                    <td><?= $user->tipo() ?></td>
                </tr>
            <?php endif; endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__.'/../../includes/footer.php'; ?>
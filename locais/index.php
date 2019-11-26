<?php

require_once '../database.php';
require_once '../models/local.php';

$locais = Local::all();

$locais[count($locais)-1]->delete();

$local = new Local('Local C', 132, 123);
$local->save();
$local->show();

?>

<h1>Locais Públicos</h1>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Latitude</th>
            <th>Longitude</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($locais as $local): ?>
            <tr>
                <td><?= $local->nome ?></td>
                <td><?= $local->latitude ?></td>
                <td><?= $local->longitude ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
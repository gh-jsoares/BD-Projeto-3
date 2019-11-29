<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/Anomalia.php';
require_once __DIR__.'/../../models/LocalPublico.php';

const PAGE_TITLE = 'Procura';
const PAGE_SUBTITLE = 'Resultados';
const PAGE_BACK = '../procuras/';

include __DIR__.'/../../includes/header.php';

$local_1 = isset($_POST['local_1']) ? validateInput($_POST['local_1']) : NULL;
$local_2 = isset($_POST['local_2']) ? validateInput($_POST['local_2']) : NULL;
$latitude = isset($_POST['latitude']) ? validateInput($_POST['latitude']) : NULL;
$longitude = isset($_POST['longitude']) ? validateInput($_POST['longitude']) : NULL;
$dLatitude = isset($_POST['dLatitude']) ? validateInput($_POST['dLatitude']) : NULL;
$dLongitude = isset($_POST['dLongitude']) ? validateInput($_POST['dLongitude']) : NULL;

$latitudes = [];
$longitudes = [];

if($_SERVER['REQUEST_METHOD'] !== 'POST')
    flashMessageAndRedirect('Procura inválida.', 'danger');


if($local_1 && $local_2) {
    if($local_1 == $local_2)
        flashMessageAndRedirect('Os locais públicos têm de ser diferentes.', 'danger');
    
    $local_1 = explode(';', $local_1);
    $local_2 = explode(';', $local_2);
    $latitudes = [floatval($local_1[0]), floatval($local_2[0])];
    $longitudes = [floatval($local_1[1]), floatval($local_2[1])];
    $months = NULL;

    $local_1 = LocalPublico::find($local_1[0], $local_1[1]);
    $local_2 = LocalPublico::find($local_2[0], $local_2[1]);

} else if($latitude && $longitude && $dLatitude && $dLongitude) {
    $latitudes = [floatval($latitude) + floatval($dLatitude), floatval($latitude) - floatval($dLatitude)];
    $longitudes = [floatval($longitude) + floatval($dLongitude), floatval($longitude) - floatval($dLongitude)];
    $months = '3';
} else
    flashMessageAndRedirect('Procura inválida.', 'danger');

$anomalias = Anomalia::findAllBetween($latitudes, $longitudes, $months);

?>

<?php if($months): ?>
    <h4>Por coordenadas</h4>
    <ul>
        <li>Latitude: <?= $latitude ?> ± <?= $dLatitude ?></li>
        <li>Longitude: <?= $longitude ?> ± <?= $dLongitude ?></li>
    </ul>
<?php else: ?>
    <h4>Por locais públicos</h4>
    <ul>
        <li>Local Público 1: <?= $local_1->nome.' ('.$local_1->latitude.'; '.$local_1->longitude.')' ?></li>
        <li>Local Público 2: <?= $local_2->nome.' ('.$local_2->latitude.'; '.$local_2->longitude.')' ?></li>
    </ul>
<?php endif; ?>


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
                        <a class="btn btn-sm btn-danger" href="../anomalias/delete.php?id=<?= $anomalia->id ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__.'/../../includes/footer.php'; ?>
<?php

require_once __DIR__.'/../../database.php';
require_once __DIR__.'/../../models/LocalPublico.php';

$locais = LocalPublico::all();

include __DIR__.'/../../includes/header.php';
?>
<a href="../locais">Voltar atrás</a>
<h1>Locais Públicos</h1>
<hr>
<h3><small class="text-muted">Adicionar</small></h3>

<form method="POST">
    <div class="form-group">
        <label for="latitudeInput">Latitude</label>
        <input required type="number" step="0.01" class="form-control" id="latitudeInput">
    </div>
    <div class="form-group">
        <label for="longitudeInput">Longitude</label>
        <input required type="number" step="0.01" class="form-control" id="longitudeInput">
    </div>
    <div class="form-group">
        <label for="nomeInput">Nome</label>
        <input required type="text" class="form-control" id="nomeInput">
    </div>
    <button type="submit" class="btn btn-success">Confirmar</button>
</form>

<?php include __DIR__.'/../../includes/footer.php'; ?>
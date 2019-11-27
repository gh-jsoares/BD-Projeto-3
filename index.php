<?php

require_once 'utils.php';
require_once 'database.php';
require_once 'models/Item.php';

// $item = new Item('Descricao', 'pt', 321, 654);
// $item->save();

// foreach (Item::all() as $item) {
//     $item->show();
// }

include 'includes/header.php';
?>

<h1>Content</h1>
<ul>
    <li><a href="pages/locais">Ver locais</a></li>
    <li><a href="pages/itens">Ver itens</a></li>
    <li><a href="pages/anomalias">Ver anomalias</a></li>
    <li><a href="pages/utilizadores">Ver utilizadores</a></li>
</ul>

<?php include 'includes/footer.php'; ?>
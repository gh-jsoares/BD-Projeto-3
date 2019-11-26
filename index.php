<?php

require_once 'utils.php';
require_once 'database.php';
require_once 'models/item.php';

//$item = new Item('Descricao', 'pt', 321, 654);
//$item->save();
//$item->show();

foreach (Item::all() as $item) {
    $item->descricao = 'new c';
    $item->save();
    $item->show();
}

?>

<h1>Index</h1>
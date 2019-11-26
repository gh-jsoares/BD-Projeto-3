<?php

require_once 'utils.php';
require_once 'database.php';
require_once 'models/item.php';

// $item = new Item('Descricao', 'pt', 321, 654);
// $item->save();

foreach (Item::all() as $item) {
    $item->show();
}

?>

<h1>Index</h1>
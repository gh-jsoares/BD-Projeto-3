<?php

function getFields($object) {
    return get_object_vars($object);
}

function getAsset($asset) {
    return '/'.basename(__DIR__)."/assets/$asset";
}

function validateInput($input) {
    return pg_escape_string(htmlspecialchars($input));
}
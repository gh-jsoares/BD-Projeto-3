<?php

include_once 'env.php';

function getURLRoot() {
    return URL_ROOT;
}

function getFields($object) {
    return get_object_vars($object);
}

function getAsset($asset) {
    return getURLRoot()."/assets/$asset";
}

function validateInput($input) {
    return pg_escape_string(htmlspecialchars($input));
}

function flashMessageAndRedirect($message, $type, $redirect = './') {
    $_SESSION['message-content'] = $message;
    $_SESSION['message-type'] = $type;
    header('Location: '.getURLRoot().'/pages/'.basename(getcwd()).'/'.$redirect);
    die();
}
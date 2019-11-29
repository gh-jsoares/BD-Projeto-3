<?php

function getFields($object) {
    return get_object_vars($object);
}

function getAsset($asset) {
    return "/assets/$asset";
}

function validateInput($input) {
    return pg_escape_string(htmlspecialchars($input));
}

function flashMessageAndRedirect($message, $type, $redirect = './') {
    $_SESSION['message-content'] = $message;
    $_SESSION['message-type'] = $type;
    header('Location: /pages/'.basename(getcwd()).'/'.$redirect);
    die();
}
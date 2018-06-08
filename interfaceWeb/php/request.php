<?php

require_once('InterfaceBDD.php');

function sendJsonData($message, $h) {
    header($h);
    header('Content-Type: text/plain; charset=utf-8');
    header('Cache-control: no-store, no-cache, must-revalidate');
    header('Pragma: no-cache');
    echo json_encode($message);
}

$db = new InterfaceBDD();

if (!$db->getBdd()) {
    header('HTTP/1.1 503 Service Unavailable');
    exit;
}

$requestMethod = filter_var(getenv('REQUEST_METHOD'));
$tmp = substr(filter_var(getenv('PATH_INFO')), 1);
$request = explode('/', $tmp);
$requestRessource = array_shift($request);

if ($requestRessource == 'search') {
    
} else {
    header('HTTP/1.1 400 Bad Request');
    exit;
}

$login = $db->verifyToken();

exit;
?>
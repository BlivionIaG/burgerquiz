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

$requestMethod = $_SERVER['REQUEST_METHOD'];
$request = substr($_SERVER['PATH_INFO'], 1);
$request = explode('/', $request);
$requestRessource = array_shift($request);

if ($requestRessource == 'search'){
    
}
    exit;
?>
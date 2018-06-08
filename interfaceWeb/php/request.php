<?php

require_once('InterfaceBDD.php');

$db = new InterfaceBDD();

if (!$db->getBdd()) {
    header('HTTP/1.1 503 Service Unavailable');
    exit;
}

$requestMethod = $_SERVER['REQUEST_METHOD'];
$request = substr($_SERVER['PATH_INFO'], 1);
$request = explode('/', $request);
$requestRessource = array_shift($request);

if($requestRessource == '')

exit;
?>
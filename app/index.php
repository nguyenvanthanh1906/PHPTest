<?php

require_once('connection.php');

$url = explode("/", filter_var(trim($_GET["url"], "/")));
if (!empty($url[0])) {
    $controller = $url[0];
    if (!empty($url[1])) {
        $action = $url[1];
    } else {
        $action = 'index';
    }
} else {
    $controller = 'pages';
    $action = 'home';
}

require_once('routes.php');

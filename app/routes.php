<?php

$controllers = array(
    'pages' => ['home', 'error'],
    'works' => ['index', 'edit', 'delete', 'add', 'create', 'update']
);

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    include_once('controllers/PagesController.php');

    $controller = new PagesController();
    $controller->error();
} else {
    $controllerName = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
    $serviceName = str_replace('_', '', ucwords($controller, '_')) . 'Service';
    $repositoryName = str_replace('_', '', ucwords($controller, '_')) . 'Repository';

    include_once('controllers/' . $controllerName . '.php');
    include_once('services/' . $serviceName . '.php');
    include_once('repositories/' . $repositoryName . '.php');

    $repository = new $repositoryName;
    $service = new $serviceName($repository);
    $controller = new $controllerName($service, $repository);
    $controller->$action();
}

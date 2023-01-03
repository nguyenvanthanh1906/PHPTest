<?php

$controllers = array(
    'pages' => ['home', 'error'],
    'works' => ['index', 'edit', 'delete', 'add']
); 

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'pages';
    $action = 'error';
}

//works->WorksController
$controllerName = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$serviceName = str_replace('_', '', ucwords($controller, '_')) . 'Service';
$repositoryName = str_replace('_', '', ucwords($controller, '_')) . 'Repository';

include_once('controllers/' . $controllerName . '.php');
include_once('services/' . $serviceName . '.php');
include_once('repositories/' . $repositoryName . '.php');

$repository = new $repositoryName;
$service = new $serviceName($repository);
$controller = new $controllerName($service);
$controller->$action();

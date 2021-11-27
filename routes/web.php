<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('user', new Route(constant('URL_SUBFOLDER') . '/users/{id}', [
    'controller' => 'UserController',
    'method' => 'index',
], [
    'id' => '[0-9]+'
]));

$routes->add('home', new Route(constant('URL_SUBFOLDER') . '/', [
    'controller' => 'HomeController',
    'method' => 'index',
], []));

$routes->add('clickup-data', new Route(constant('URL_SUBFOLDER') . '/clickup/retrieve-data', [
    'controller' => 'ClickUpDataController',
    'method' => 'retrieveData',
], [
    'id' => '[0-9]+'
]));
<?php

use Cake\Core\Plugin;
use Cake\Routing\Router;

Router::scope('/', function ($routes) {
    $routes->extensions(['json']);
    $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
    $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
});
Plugin::routes();

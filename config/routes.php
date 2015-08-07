<?php

use Cake\Routing\Router;

Router::scope('/', ['plugin' => 'AdminLte'], function ($routes) {
    $routes->extensions(['json']);
    $routes->fallbacks('InflectedRoute');
});
Router::plugin('AdminLte', function ($routes) {
    $routes->extensions(['json']);
    $routes->fallbacks('InflectedRoute');
});

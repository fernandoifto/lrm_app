<?php


use Cake\Core\Plugin;
use Cake\Routing\Router;

Router::defaultRouteClass('DashedRoute');

Router::scope('/', function ($routes) {
    
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    
    $routes->connect('admin', ['controller' => 'Agendamentos', 'action' => 'index', 'prefix' => 'admin']);
    $routes->fallbacks('DashedRoute');
});

Router::prefix('admin', function ($routes){  
    
    $routes->extensions('pdf');
    $routes->fallbacks('InflectedRoute');
});

Plugin::routes();

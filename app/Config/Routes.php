<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('admin',['namespace'=>'App\Controllers\Admin'],function($routes){
    $routes->get('/', 'Home\IndexController::index');
});
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->group('auth',['namespace'=>'App\Controllers\Auth'],function($routes){
    $routes->get('login','LoginController::index');
    $routes->post('login','LoginController::loginAction');
    $routes->get('login2','LoginController::loginAction');
    $routes->get('logout','LoginController::logoutAction');
 });

$routes->group('admin',['namespace'=>'App\Controllers\Admin'],function($routes){
    $routes->get('/', 'Home\IndexController::index');
});

$routes->group('',['namespace'=>'App\Controllers'],function($routes){
    $routes->get('/', 'Home::index');
});
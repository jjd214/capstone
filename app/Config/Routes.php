<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// admin routes
$routes->group('admin', static function($routes){

    // Routes for only authenticated admin
    $routes->group('', [], static function($routes){
        $routes->view('example-page', 'example-page');
        $routes->get('home', 'AdminController::index', ['as' => 'admin.home']);
    });
    
    // Routes for non authenticated admin
    $routes->group('', [], static function($routes){
        // $routes->view('example-auth', 'example-auth');
        $routes->get('login', 'AuthController::loginForm', ['as' => 'admin.login.form']);
        $routes->post('login', 'AuthController::loginHandler', ['as' => 'admin.login.handler']);
    });
});

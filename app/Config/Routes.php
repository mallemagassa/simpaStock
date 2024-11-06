<?php

use App\Controllers\PagesController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->set404Override('App\Controllers\Errors::show404');

// $routes->get('/', 'DashboardController::index');
// $routes->get('/product', 'ProductController::index');
// $routes->get('/user', 'UserController::index');
// $routes->get('/stock', 'StockController::index');
// $routes->get('/unit', 'UnitController::index');

$routes->group('', ['namespace' => 'App\Controllers'], function($routes) {

    $routes->get('/', 'DashboardController::index');


    $routes->group('product', function($routes) {
        $routes->get('/', 'ProductController::index');
        $routes->post('store', 'ProductController::store');
        $routes->post('update', 'ProductController::update');
        $routes->get('delete/(:num)', 'ProductController::delete/$1');


    });

    
    $routes->group('notifications', function($routes) {
        $routes->post('mark-read', 'NotificationController::markAllAsRead');
        $routes->delete('delete/(:num)', 'NotificationController::deleteNotification/$1');

    });

 
    $routes->group('user', function($routes) {
        $routes->get('/', 'UserController::index');
        $routes->post('store', 'UserController::store');
        $routes->post('update/(:num)', 'UserController::update/$1');
        $routes->get('delete/(:num)', 'UserController::delete/$1');

    });

    $routes->group('stock', function($routes) {
        $routes->get('/', 'StockController::index');
        $routes->get('create', 'StockController::create');
        $routes->post('store', 'StockController::store');
        $routes->get('show/(:num)', 'StockController::show/$1');
        $routes->get('edit/(:num)', 'StockController::edit/$1');
        $routes->post('update', 'StockController::update');
        $routes->get('delete/(:num)', 'StockController::delete/$1');

        $routes->get('in/(:num)', 'StockController::in/$1');
        $routes->post('in/(:num)', 'StockController::in/$1');
        
        $routes->get('out/(:num)', 'StockController::out/$1');
        $routes->post('out', 'StockController::out/$1');
        $routes->get('exports', 'StockController::exports');
        $routes->get('exportToPDF', 'StockController::exportToPDF');
    });
    

    $routes->group('shop', function($routes) {
        $routes->get('/', 'ShopController::index');
        $routes->post('store', 'ShopController::store');
        $routes->post('update/(:num)', 'ShopController::update/$1');
        $routes->get('show/(:num)', 'ShopController::show/$1');
        $routes->get('delete/(:num)', 'ShopController::delete/$1');
        $routes->post('tmpUpload', 'ShopController::tmpUpload');
        $routes->get('exports/(:num)', 'ShopController::exportToPDF/$1');

    });


    $routes->group('unit', function($routes) {
        $routes->get('/', 'UnitController::index');
        $routes->post('store', 'UnitController::store');
        $routes->post('update', 'UnitController::update');
        $routes->get('delete/(:num)', 'UnitController::delete/$1');
    });

    $routes->group('roles', function($routes) {
        $routes->get('/', 'RoleController::index');
        $routes->get('create', 'RoleController::create');
        $routes->post('store', 'RoleController::store');
        $routes->get('edit/(:segment)', 'RoleController::edit/$1');
        $routes->post('update/(:segment)', 'RoleController::update/$1');
        $routes->get('delete/(:segment)', 'RoleController::delete/$1');
    });
    
    $routes->group('permissions', function($routes) {
        $routes->get('/', 'PermissionController::index');
        $routes->get('create', 'PermissionController::create');
        $routes->post('store', 'PermissionController::store');
        $routes->get('edit/(:segment)', 'PermissionController::edit/$1');
        $routes->post('update/(:segment)', 'PermissionController::update/$1');
        $routes->get('delete/(:segment)', 'PermissionController::delete/$1');
    });

    $routes->group('reports', function($routes) {
        $routes->get('/', 'ReportController::index');
        $routes->get('delete/(:num)', 'ShopController::delete/$1');
    });
    
    $routes->post('/filterOut', 'StockController::filterByDate');
    $routes->post('/filterOuts', 'StockController::filterOuts');
});



service('auth')->routes($routes);
$routes->get('(:segment)', [PagesController::class, 'view']);
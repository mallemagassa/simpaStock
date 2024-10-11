<?php

$routes->group('crud', ['namespace' => 'Vendor\CrudPackage\Controllers'], function($routes) {
    $routes->get('(:segment)', 'CrudController::index');
    $routes->get('(:segment)/create', 'CrudController::create');
    $routes->post('(:segment)/create', 'CrudController::create');
    $routes->get('(:segment)/edit/(:segment)', 'CrudController::edit/$2');
    $routes->post('(:segment)/edit/(:segment)', 'CrudController::edit/$2');
    $routes->get('(:segment)/delete/(:segment)', 'CrudController::delete/$2');
});

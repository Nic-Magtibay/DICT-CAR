<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */ 
/**controller+function inside the controller */


// $routes->setDefaultController('Item');
// $routes->setDefaultMethod('index');
$routes->setAutoRoute(true);

$routes->group('',['filter'=>'AuthAdmin'], function($routes){
    $routes->get('/item','Item::index');
    $routes->get('/item/index','Item::index');
    $routes->get('/item/add','Item::add');
    $routes->get('/item/edit','Item::edit');
    $routes->get('/item/edit/(:num)','Item::edit/$1');
    $routes->get('/item/delete','Item::delete');
    $routes->get('/item/delete/(:num)','Item::delete/$1');


});

// $routes->get('/', 'Home::index');
// $routes->get('/index', 'Item::index');
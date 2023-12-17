<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/blog', 'Blog::index');
$routes->get('/api/data','ApiController::getData');
$routes->post('/api/prediction', 'ApiController::postPrediction');
$routes->get('/api/prediction', 'ApiController::postPrediction');
$routes->get('/login', 'LoginController::index');
$routes->get('/logout', 'LoginController::logout');
$routes->post('/login_action', 'LoginController::login_action');
$routes->put('/api/restock/(:any)', 'DatabaseAPI::restockDrugs/$1');
$routes->get('/inventory', 'InventoryController::index');


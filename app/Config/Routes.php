<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/signup', 'Signup::index');
$routes->post('/login', 'Login::login');
$routes->post('/signup', 'Signup::signup');

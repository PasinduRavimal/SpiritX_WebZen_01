<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'User::loginGet');
$routes->get('/signup', 'User::signupGet');
$routes->post('/login', 'User::login');
$routes->post('/signup', 'User::signup');

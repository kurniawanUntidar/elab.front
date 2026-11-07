<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Landing::index');
$routes->get('dashboard', 'Home::index');
$routes->match(['GET', 'POST'], '/login', 'Login::index');
$routes->get('/logout', 'Login::logout');
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Login::login');
$routes->post('/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');
$routes->get('/posts', 'Post::index', ['filter' => 'auth']);
$routes->get('/posts/create', 'Post::create', ['filter' => 'auth']);
$routes->post('/posts/store', 'Post::store', ['filter' => 'auth']);
$routes->get('/posts/show/(:num)', 'Post::show/$1');
$routes->get('/posts/edit/(:num)', 'Post::edit/$1', ['filter' => 'auth']);
$routes->post('/posts/update', 'Post::update', ['filter' => 'auth']);
$routes->get('/posts/delete/(:num)', 'Post::delete/$1', ['filter' => 'auth']);

$routes->get('/show/(:num)', 'Post::show/$1');


$routes->get('users', 'User::index');
$routes->get('/users/create', 'User::create');
$routes->post('/users/store', 'User::store');
$routes->get('/users/edit/(:num)', 'User::edit/$1');
$routes->post('/users/update/(:num)', 'User::update/$1');
$routes->get('/users/delete/(:num)', 'User::delete/$1');
$routes->get('/users/show/(:num)', 'User::show/$1');
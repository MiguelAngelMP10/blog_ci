<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Login::login');
$routes->post('/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');
$routes->get('/posts', 'Blog::index', ['filter' => 'auth']);
$routes->get('/posts/create', 'Post::create', ['filter' => 'auth']);
$routes->post('/posts/store', 'Post::store', ['filter' => 'auth']);
$routes->get('/posts/edit/(:num)', 'Post::edit/$1', ['filter' => 'auth']);
$routes->post('/posts/update', 'Post::update', ['filter' => 'auth']);
$routes->get('/posts/delete/(:num)', 'Post::delete/$1', ['filter' => 'auth']);

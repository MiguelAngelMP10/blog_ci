<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Login::login');
$routes->post('/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');
$routes->get('/blogs', 'Blog::index', ['filter' => 'auth']);
$routes->get('/blogs/create', 'Blog::create', ['filter' => 'auth']);
$routes->get('/blogs/store', 'Blog::store', ['filter' => 'auth']);
$routes->get('/blogs/edit/:num', 'Blog::edit/$i', ['filter' => 'auth']);
$routes->get('/blogs/update/', 'Blog::update', ['filter' => 'auth']);
$routes->get('/blogs/delete/:num', 'Blog::delete/$i', ['filter' => 'auth']);

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// http://localhost/miordenqr/api
$routes->group('miordenqr/api', ['namespace' => 'App\Controllers\API'], function(
    $routes
){
    $routes->match(['get', 'post'], 'FileUpload/upload', 'FileUpload::upload');
    $routes->get('users', 'User::getAll');
    $routes->post('users/create', 'User::create');
    $routes->post('users/login', 'User::login');
    $routes->post('users/upload', 'User::uploadFile');
    $routes->get('users/detail/(:num)', 'User::detail/$1');
    $routes->put('users/update/(:num)', 'User::update/$1');
    $routes->delete('users/delete/(:num)', 'User::delete/$1');

    
    $routes->get('teams', 'Team::getAll');
    $routes->post('teams/create', 'Team::create');
    $routes->get('teams/detail/(:num)', 'Team::detail/$1');
    $routes->put('teams/update/(:num)', 'Team::update/$1');
    $routes->delete('teams/delete/(:num)', 'Team::delete/$1');

    
    $routes->get('sessions', 'User::getAll');
    $routes->post('sessions/create', 'Sesion::create');
    $routes->get('sessions/detail/(:num)', 'Sesion::detail/$1');
    $routes->put('sessions/update/(:num)', 'Sesion::update/$1');
    $routes->delete('sessions/delete/(:num)', 'Sesion::delete/$1');

    
    $routes->get('series', 'User::getAll');
    $routes->post('series/create', 'Serie::create');
    $routes->get('series/detail/(:num)', 'Serie::detail/$1');
    $routes->put('series/update/(:num)', 'Serie::update/$1');
    $routes->delete('series/delete/(:num)', 'Serie::delete/$1');

    
    $routes->get('restaurantes', 'Restaurante::getAll');
    $routes->post('restaurantes/create', 'Restaurante::create');
    $routes->get('restaurantes/detail/(:num)', 'Restaurante::detail/$1');
    $routes->put('restaurantes/update/(:num)', 'Restaurante::update/$1');
    $routes->delete('restaurantes/delete/(:num)', 'Restaurante::delete/$1');

    
    $routes->get('productos', 'Producto::getAll');
    $routes->post('productos/create', 'Producto::create');
    $routes->get('productos/detail/(:num)', 'Producto::detail/$1');
    $routes->put('productos/update/(:num)', 'Producto::update/$1');
    $routes->delete('productos/delete/(:num)', 'Producto::delete/$1');

    
    $routes->get('tokens', 'PersonalToken::getAll');
    $routes->post('tokens/create', 'PersonalToken::create');
    $routes->get('tokens/detail/(:num)', 'PersonalToken::detail/$1');
    $routes->put('tokens/update/(:num)', 'PersonalToken::update/$1');
    $routes->delete('tokens/delete/(:num)', 'PersonalToken::delete/$1');

    
    $routes->get('passwords', 'PasswordReset::getAll');
    $routes->post('passwords/create', 'PasswordReset::create');
    $routes->get('passwords/detail/(:num)', 'PasswordReset::detail/$1');
    $routes->put('passwords/update/(:num)', 'PasswordReset::update/$1');
    $routes->delete('passwords/delete/(:num)', 'PasswordReset::delete/$1');

    
    $routes->get('cuentas', 'Cuenta::getAll');
    $routes->post('cuentas/create', 'Cuenta::create');
    $routes->get('cuentas/detail/(:num)', 'Cuenta::detail/$1');
    $routes->put('cuentas/update/(:num)', 'Cuenta::update/$1');
    $routes->delete('cuentas/delete/(:num)', 'Cuenta::delete/$1');

    
    $routes->get('categorias', 'Categoria::getAll');
    $routes->post('categorias/create', 'Categoria::create');
    $routes->get('categorias/detail/(:num)', 'Categoria::detail/$1');
    $routes->put('categorias/update/(:num)', 'Categoria::update/$1');
    $routes->delete('categorias/delete/(:num)', 'Categoria::delete/$1');
});
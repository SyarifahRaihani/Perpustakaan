<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use CodeIgniter\Router\RouteCollectionInterface;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->group('login', function(RouteCollection $routes){
    $routes->get('lupa', 'PustakawanController::viewLupaPassword');
    $routes->get('/', 'PustakawanController::viewLogin');
    $routes->post('/', 'PustakawanController::login');
    $routes->delete('/', 'PustakawanController::logout');
    $routes->patch('/', 'PustawakanController::lupaPassword');
});

$routes->group('pustakawan', function(RouteCollection $routes){
    $routes->get('/', 'PustakawanController::index');
    $routes->post('/', 'PustakawanController::store');
    $routes->patch('/', 'PustakawanController::update');
    $routes->delete('/', 'PustakawanController::delete');
    $routes->get('(:num)', 'PustakawanController::show/$1');
    $routes->get('all', 'PustakawanController::all');
});

$routes->group('klasifikasi', function(RouteCollection $routes){
    $routes->get('/', 'KlasifikasiController::index');
    $routes->post('/', 'KlasifikasiController::store');
    $routes->patch('/', 'KlasifikasiController::update');
    $routes->delete('/', 'KlasifikasiController::delete');
    $routes->get('(:num)', 'KlasifikasiController::show/$1');
    $routes->get('all', 'KlasifikasiController::all');
});

$routes->group('penerbit', function(RouteCollection $routes){
    $routes->get('/', 'PenerbitController::index');
    $routes->post('/', 'PenerbitController::store');
    $routes->patch('/', 'PenerbitController::update');
    $routes->delete('/', 'PenerbitController::delete');
    $routes->get('(:num)', 'PenerbitController::show/$1');
    $routes->get('all', 'PenerbitController::all');
});

$routes->group('penerbit', function(RouteCollection $routes){
    $routes->get('/', 'PenerbitController::index');
    $routes->post('/', 'PenerbitController::store');
    $routes->patch('/', 'PenerbitController::update');
    $routes->delete('/', 'PenerbitController::delete');
    $routes->get('(:num)', 'PenerbitController::show/$1');
    $routes->get('all', 'PenerbitController::all');
});

$routes->group('stokkoleksi', function(RouteCollection $routes){
    $routes->get('/', 'StokKoleksiController::index');
    $routes->post('/', 'StokKoleksiController::store');
    $routes->patch('/', 'StokKoleksiController::update');
    $routes->delete('/', 'StokKoleksiController::delete');
    $routes->get('(:num)', 'StokKoleksiController::show/$1');
    $routes->get('all', 'StokKoleksiController::all');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

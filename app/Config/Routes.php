<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

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
    $routes->get('lupa', 'KlasifikasiController::ViewLupaPassword');
    $routes->get('/', 'KlasifikasiController::ViewLogin');
    $routes->post('/', 'KlasifikasiController::Login');
    $routes->delete('/', 'KlasifikasiController::Logout');
    $routes->patch('/', 'KlasifikasiController::LupaPassword');

});

$routes->group('Klasifikasi', function(RouteCollection $routes){
    $routes->get('/', 'KlasifikasiController::index');
    $routes->post('/', 'KlasifikasiController::store');
    $routes->patch('/', 'KlasifikasiController::update');
    $routes->delete('/', 'KlasifikasiController::delete');
    $routes->get('(:num:', 'KlasifikasiController::show/$1');
    $routes->get('/', 'KlasifikasiController::all');
});

$routes->group('login', function(RouteCollection $routes){
    $routes->get('lupa', 'PemesananController::ViewLupaPassword');
    $routes->get('/', 'PemesananController::ViewLogin');
    $routes->post('/', 'PemesananController::Login');
    $routes->delete('/', 'PemesananController::Logout');
    $routes->patch('/', 'PemesananController::LupaPassword');

});

$routes->group('Pemesanan', function(RouteCollection $routes){
    $routes->get('/', 'PemesananController::index');
    $routes->post('/', 'PemesananController::store');
    $routes->patch('/', 'PemesananController::update');
    $routes->delete('/', 'PemesananController::delete');
    $routes->get('(:num:', 'PemesananController::show/$1');
    $routes->get('/', 'PemesananController::all');
});

$routes->group('login', function(RouteCollection $routes){
    $routes->get('lupa', 'StokKoleksiController::ViewLupaPassword');
    $routes->get('/', 'StokKoleksiController::ViewLogin');
    $routes->post('/', 'StokKoleksiController::Login');
    $routes->delete('/', 'StokKoleksiController::Logout');
    $routes->patch('/', 'StokKoleksiController::LupaPassword');

});

$routes->group('StokKoleksi', function(RouteCollection $routes){
    $routes->get('/', 'StokKoleksiController::index');
    $routes->post('/', 'StokKoleksiController::store');
    $routes->patch('/', 'StokKoleksiController::update');
    $routes->delete('/', 'StokKoleksiController::delete');
    $routes->get('(:num:', 'StokKoleksiController::show/$1');
    $routes->get('/', 'StokKoleksiController::all');
});


     
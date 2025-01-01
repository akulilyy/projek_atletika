<?php

namespace Config;

$routes = Services::routes();
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
* Router Setup
*/

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('index');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);


$routes->get('/', 'Login::index');


$routes->post('/login/authenticate', 'Login::authenticate');
$routes->get('/logout', 'Login::logout');
$routes->get('/dashboard', 'Dashboard::dashboard');


//dokter
$routes->get('/dokter', 'Dokter::index');
$routes->get('/dokter/tambah', 'Dokter::tambah');
$routes->post('/dokter/simpan', 'Dokter::simpan');
$routes->get('/dokter/edit/(:num)', 'Dokter::edit/$1');
$routes->post('/dokter/update', 'Dokter::update');
$routes->get('/dokter/delete/(:num)', 'Dokter::delete/$1');

//pelanggan
$routes->get('/pelanggan', 'Pelanggan::index');
$routes->get('/pelanggan/tambah', 'Pelanggan::tambah');
$routes->post('/pelanggan/simpan', 'Pelanggan::simpan');
$routes->get('/pelanggan/edit/(:num)', 'Pelanggan::edit/$1');
$routes->post('/pelanggan/update', 'Pelanggan::update');
$routes->get('/pelanggan/delete/(:num)', 'Pelanggan::delete/$1');

//supplier
$routes->get('/supplier', 'Supplier::index');
$routes->get('/supplier/tambah', 'Supplier::tambah');
$routes->post('/supplier/simpan', 'Supplier::simpan');
$routes->get('/supplier/edit/(:num)', 'Supplier::edit/$1');
$routes->post('/supplier/update', 'Supplier::update');
$routes->get('/supplier/delete/(:num)', 'Supplier::delete/$1');

//treatment
$routes->get('/treatment', 'Treatment::index');
$routes->get('/treatment/tambah', 'Treatment::tambah');
$routes->post('/treatment/simpan', 'Treatment::simpan');
$routes->get('/treatment/edit/(:num)', 'Treatment::edit/$1');
$routes->post('/treatment/update', 'Treatment::update');
$routes->get('/treatment/delete/(:num)', 'Treatment::delete/$1');

//produk
$routes->get('/produk', 'Produk::index');
$routes->get('/produk/tambah', 'Produk::tambah');
$routes->post('/produk/simpan', 'Produk::simpan');
$routes->get('/produk/edit/(:num)', 'Produk::edit/$1');
$routes->post('/produk/update', 'Produk::update');
$routes->get('/produk/delete/(:num)', 'Produk::delete/$1');

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . 'Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . 'Routes.php';
}

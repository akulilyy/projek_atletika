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


if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . 'Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . 'Routes.php';
}

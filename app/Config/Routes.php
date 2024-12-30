<?php

namespace Config;

$routes = Services::routes();
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->post('dokter/simpan', 'Dokter::simpan');
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




if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . 'Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . 'Routes.php';
}

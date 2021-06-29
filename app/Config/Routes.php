<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Frontend');
$routes->setDefaultMethod('frontend');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Frontend::frontend');
$routes->get('/kontak', 'Frontend::kontak');
$routes->get('/about', 'Frontend::about');


$routes->get('/dashboard', 'Home::index');
$routes->get('/v1/auth', 'LoginController::index');

// DAFTAR PENGURUS MASJID AL - HIKMAH

$routes->get('daftarpengurus', 'PengurusController::index');
$routes->get('daftarpengurus/create', 'PengurusController::create');
$routes->post('daftarpengurus/store', 'PengurusController::store');
$routes->get('daftarpengurus/edit/(:alphanum)', 'PengurusController::edit/$1');
$routes->post('daftarpengurus/update', 'PengurusController::update/$1');
$routes->get('daftarpengurus/delete/(:alphanum)', 'PengurusController::delete/$1');


// DAFTAR IMAM MASJID AL - HIKMAH
$routes->get('daftarimam', 'ImamController::index');
$routes->get('daftarimam/create', 'ImamController::create');
$routes->post('daftarimam/store', 'ImamController::store');
$routes->get('daftarimam/edit/(:alphanum)', 'ImamController::edit/$1');
$routes->post('daftarimam/update/(:alphanum)', 'ImamController::update/$1');
$routes->get('daftarimam/delete/(:alphanum)', 'ImamController::delete/$1');


$routes->get('daftarmuazin', 'MuazinController::index');
$routes->get('daftarmuazin/create', 'MuazinController::create');
$routes->post('daftarmuazin/store', 'MuazinController::store');
$routes->get('daftarmuazin/edit/(:alphanum)', 'MuazinController::edit/$1');
$routes->post('daftarmuazin/update/(:alphanum)', 'MuazinController::update/$1');
$routes->get('daftarmuazin/delete/(:alphanum)', 'MuazinController::delete/$1');


$routes->get('daftarkhotib', 'KhotibController::index');
$routes->get('daftarkhotib/create', 'KhotibController::create');
$routes->post('daftarkhotib/store', 'KhotibController::store');
$routes->get('daftarkhotib/edit/(:alphanum)', 'KhotibController::edit/$1');
$routes->post('daftarkhotib/update/(:alphanum)', 'KhotibController::update/$1');
$routes->get('daftarkhotib/delete/(:alphanum)', 'KhotibController::delete/$1');


$routes->get('daftarbilal', 'BilalController::index');
$routes->get('daftarbilal/create', 'BilalController::create');
$routes->post('daftarbilal/store', 'BilalController::store');
$routes->get('daftarbilal/edit/(:alphanum)', 'BilalController::edit/$1');
$routes->post('daftarbilal/update/(:alphanum)', 'BilalController::update/$1');
$routes->get('daftarbilal/delete/(:alphanum)', 'BilalController::delete/$1');


$routes->get('daftarmarbot', 'MarbotController::index');
$routes->get('daftarmarbot/create', 'MarbotController::create');
$routes->post('daftarmarbot/store', 'MarbotController::store');
$routes->get('daftarmarbot/edit/(:alphanum)', 'MarbotController::edit/$1');
$routes->post('daftarmarbot/update/(:alphanum)', 'MarbotController::update/$1');
$routes->get('daftarmarbot/delete/(:alphanum)', 'MarbotController::delete/$1');


$routes->get('daftarzakat', 'ZakatController::index');
$routes->get('daftarzakat/create', 'ZakatController::create');
$routes->post('daftarzakat/store', 'ZakatController::store');
$routes->get('daftarzakat/edit/(:alphanum)', 'ZakatController::edit/$1');
$routes->post('daftarzakat/update/(:alphanum)', 'ZakatController::update/$1');
$routes->get('daftarzakat/delete/(:alphanum)', 'ZakatController::delete/$1');


$routes->get('daftarmaal', 'MaalController::index');
$routes->get('daftarmaal/create', 'MaalController::create');
$routes->post('daftarmaal/store', 'MaalController::store');
$routes->get('daftarmaal/edit/(:alphanum)', 'MaalController::edit/$1');
$routes->post('daftarmaal/update/(:alphanum)', 'MaalController::update/$1');
$routes->get('daftarmaal/delete/(:alphanum)', 'MaalController::delete/$1');


$routes->get('daftarynz', 'YnzController::index');
$routes->get('daftarynz/create', 'YnzController::create');
$routes->post('daftarynz/store', 'YnzController::store');
$routes->get('daftarynz/edit/(:alphanum)', 'YnzController::edit/$1');
$routes->post('daftarynz/update/(:alphanum)', 'YnzController::update/$1');
$routes->get('daftarynz/delete/(:alphanum)', 'YnzController::delete/$1');



$routes->get('agenda', 'AgendaController::index');
$routes->get('agenda/create', 'AgendaController::create');
$routes->post('agenda/store', 'AgendaController::store');
$routes->get('agenda/edit/(:alphanum)', 'AgendaController::edit/$1');
$routes->post('agenda/update/(:alphanum)', 'AgendaController::update/$1');
$routes->get('agenda/delete/(:alphanum)', 'AgendaController::delete/$1');


$routes->get('users', 'UsersController::index');
$routes->get('users/create', 'UsersController::create');
$routes->post('users/store', 'UsersController::store');
$routes->get('users/edit/(:alphanum)', 'UsersController::edit/$1');
$routes->post('users/update/(:alphanum)', 'UsersController::update/$1');
$routes->get('users/delete/(:alphanum)', 'UsersController::delete/$1');


$routes->get('berita', 'BeritaController::index');
$routes->get('berita/create', 'BeritaController::create');
$routes->post('berita/store', 'BeritaController::store');
$routes->get('berita/edit/(:alphanum)', 'BeritaController::edit/$1');
$routes->post('berita/update/(:alphanum)', 'BeritaController::update/$1');
$routes->get('berita/delete/(:alphanum)', 'BeritaController::delete/$1');


$routes->get('profil', 'ProfilController::index');
$routes->get('profil/create', 'ProfilController::create');
$routes->post('profil/store', 'ProfilController::store');
$routes->get('profil/edit/(:alphanum)', 'ProfilController::edit/$1');
$routes->post('profil/update/(:alphanum)', 'ProfilController::update/$1');
$routes->get('profil/delete/(:alphanum)', 'ProfilController::delete/$1');


$routes->get('jadwal', 'JadwalController::index');
$routes->get('jadwal/create', 'JadwalController::create');
$routes->post('jadwal/store', 'JadwalController::store');
$routes->get('jadwal/edit/(:alphanum)', 'JadwalController::edit/$1');
$routes->post('jadwal/update/(:alphanum)', 'JadwalController::update/$1');
$routes->get('jadwal/delete/(:alphanum)', 'JadwalController::delete/$1');


$routes->get('daftarsampul', 'SampulController::index');
$routes->get('daftarsampul/create', 'SampulController::create');
$routes->post('daftarsampul/store', 'SampulController::store');
$routes->get('daftarsampul/edit/(:alphanum)', 'SampulController::edit/$1');
$routes->post('daftarsampul/update/(:alphanum)', 'SampulController::update/$1');
$routes->get('daftarsampul/delete/(:alphanum)', 'SampulController::delete/$1');


// DAFTAR Remaja MASJID AL - HIKMAH

$routes->get('daftarremaja', 'RemajaController::index');
$routes->get('daftarremaja/create', 'RemajaController::create');
$routes->post('daftarremaja/store', 'RemajaController::store');
$routes->get('daftarremaja/edit/(:alphanum)', 'RemajaController::edit/$1');
$routes->post('daftarremaja/update/(:alphanum)', 'RemajaController::update/$1');
$routes->get('daftarremaja/delete/(:alphanum)', 'RemajaController::delete/$1');


if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

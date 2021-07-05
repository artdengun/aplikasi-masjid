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



# data internal masjid terkait data 

$routes->get('daftarpengurus', 'PengurusController::index');
$routes->get('daftarpengurus/laporan', 'PengurusController::laporan');
$routes->get('daftarpengurus/create', 'PengurusController::create');
$routes->post('daftarpengurus/store', 'PengurusController::store');
$routes->get('daftarpengurus/edit/(:alphanum)', 'PengurusController::edit/$1');
$routes->post('daftarpengurus/update', 'PengurusController::update/$1');
$routes->get('daftarpengurus/delete/(:alphanum)', 'PengurusController::delete/$1');


$routes->get('daftarimam', 'ImamController::index');
$routes->get('daftarimam/laporan', 'ImamController::laporan');
$routes->get('daftarimam/create', 'ImamController::create');
$routes->post('daftarimam/store', 'ImamController::store');
$routes->get('daftarimam/edit/(:alphanum)', 'ImamController::edit/$1');
$routes->post('daftarimam/update/(:alphanum)', 'ImamController::update/$1');
$routes->get('daftarimam/delete/(:alphanum)', 'ImamController::delete/$1');


$routes->get('daftarmuazin', 'MuazinController::index');
$routes->get('daftarmuazin/laporan', 'MuazinController::laporan');
$routes->get('daftarmuazin/create', 'MuazinController::create');
$routes->post('daftarmuazin/store', 'MuazinController::store');
$routes->get('daftarmuazin/edit/(:alphanum)', 'MuazinController::edit/$1');
$routes->post('daftarmuazin/update/(:alphanum)', 'MuazinController::update/$1');
$routes->get('daftarmuazin/delete/(:alphanum)', 'MuazinController::delete/$1');


$routes->get('daftarkhotib', 'KhotibController::index');
$routes->get('daftarkhotib/laporan', 'KhotibController::laporan');
$routes->get('daftarkhotib/create', 'KhotibController::create');
$routes->post('daftarkhotib/store', 'KhotibController::store');
$routes->get('daftarkhotib/edit/(:alphanum)', 'KhotibController::edit/$1');
$routes->post('daftarkhotib/update/(:alphanum)', 'KhotibController::update/$1');
$routes->get('daftarkhotib/delete/(:alphanum)', 'KhotibController::delete/$1');


$routes->get('daftarbilal', 'BilalController::index');
$routes->get('daftarbilal/laporan', 'BilalController::laporan');
$routes->get('daftarbilal/create', 'BilalController::create');
$routes->post('daftarbilal/store', 'BilalController::store');
$routes->get('daftarbilal/edit/(:alphanum)', 'BilalController::edit/$1');
$routes->post('daftarbilal/update/(:alphanum)', 'BilalController::update/$1');
$routes->get('daftarbilal/delete/(:alphanum)', 'BilalController::delete/$1');


$routes->get('daftarmarbot', 'MarbotController::index');
$routes->get('daftarmarbot/laporan', 'MarbotController::laporan');
$routes->get('daftarmarbot/create', 'MarbotController::create');
$routes->post('daftarmarbot/store', 'MarbotController::store');
$routes->get('daftarmarbot/edit/(:alphanum)', 'MarbotController::edit/$1');
$routes->post('daftarmarbot/update/(:alphanum)', 'MarbotController::update/$1');
$routes->get('daftarmarbot/delete/(:alphanum)', 'MarbotController::delete/$1');

$routes->get('daftarynz', 'YnzController::index');
$routes->get('daftarynz/laporan', 'YnzController::laporan');
$routes->get('daftarynz/create', 'YnzController::create');
$routes->post('daftarynz/store', 'YnzController::store');
$routes->get('daftarynz/edit/(:alphanum)', 'YnzController::edit/$1');
$routes->post('daftarynz/update/(:alphanum)', 'YnzController::update/$1');
$routes->get('daftarynz/delete/(:alphanum)', 'YnzController::delete/$1');


$routes->get('daftarremaja', 'RemajaController::index');
$routes->get('daftarremaja/laporan', 'RemajaController::laporan');
$routes->get('daftarremaja/create', 'RemajaController::create');
$routes->post('daftarremaja/store', 'RemajaController::store');
$routes->get('daftarremaja/edit/(:alphanum)', 'RemajaController::edit/$1');
$routes->post('daftarremaja/update/(:alphanum)', 'RemajaController::update/$1');
$routes->get('daftarremaja/delete/(:alphanum)', 'RemajaController::delete/$1');

# close data internal masjid


# data security route


$routes->get('users', 'UsersController::index');
$routes->get('users/create', 'UsersController::create');
$routes->post('users/store', 'UsersController::store');
$routes->get('users/edit/(:alphanum)', 'UsersController::edit/$1');
$routes->post('users/update/(:alphanum)', 'UsersController::update/$1');
$routes->get('users/delete/(:alphanum)', 'UsersController::delete/$1');


# routes

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::formloginsiswa', ['as'=>'login_siswa']);

$routes->get('/guru', 'Home::formloginguru', ['as'=>'login_guru']);
$routes->post('/gurulogin', 'Home::loginguru', ['as'=>'login_guru_post']);

$routes->group("admin", ["filter" => "auth"], function($routes){
    $routes->get("dashboard", "AdminDashboard::index", ['as'=>'admindashboard']);
    $routes->get("logout", "AdminDashboard::logout", ['as'=>'logout']);

    $routes->get("kelas", "AdminKelas::index", ['as'=>'adminkelas']);
    $routes->post("kelas/store", "AdminKelas::store", ['as'=>'storekelas']);
    $routes->get("kelas/delete/(:segment)", "AdminKelas::delete/$1", ['as'=>'deletekelas']);
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

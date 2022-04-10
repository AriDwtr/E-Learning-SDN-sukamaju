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
    
    // kelas
    $routes->get("kelas", "AdminKelas::index", ['as'=>'adminkelas']);
    $routes->post("kelas/store", "AdminKelas::store", ['as'=>'storekelas']);

    $routes->get("kelas/edit/(:any)", "AdminKelas::edit/$1", ['as'=>'editkelas']);
    $routes->post("kelas/update/(:any)", "AdminKelas::update/$1", ['as'=>'updatekelas']);
    
    $routes->get("kelas/delete/(:any)", "AdminKelas::delete/$1", ['as'=>'deletekelas']);
    // end kelas

    // guru
    $routes->get("guru", "AdminGuru::index", ['as'=>'adminguru']);
    
    $routes->get("guru/form", "AdminGuru::form", ['as'=>'formguru']);
    $routes->post("guru/form/store", "AdminGuru::store", ['as'=>'storeguru']);

    $routes->get("guru/edit/(:any)", "AdminGuru::edit/$1", ['as'=>'editguru']);
    $routes->post("guru/update/(:any)", "AdminGuru::update/$1", ['as'=>'updateguru']);

    $routes->get("guru/password/(:any)", "AdminGuru::editpassword/$1", ['as'=>'passguru']);
    $routes->post("guru/password/update/(:any)", "AdminGuru::updatepassword/$1", ['as'=>'updatepass']);

    $routes->get("guru/delete/(:any)", "AdminGuru::delete/$1", ['as'=>'deleteguru']);
    // end guru

    //siswa
    $routes->get("siswa", "AdminSiswa::index", ['as'=>'adminsiswa']);

    $routes->get("siswa/form", "AdminSiswa::form", ['as'=>'formsiswa']);
    $routes->post("siswa/form/store", "AdminSiswa::store", ['as'=>'storesiswa']);

    $routes->get("siswa/edit/(:any)", "AdminSiswa::edit/$1", ['as'=>'editsiswa']);
    $routes->post("siswa/update/(:any)", "AdminSiswa::update/$1", ['as'=>'updatesiswa']);

    $routes->get("siswa/password/(:any)", "AdminSiswa::editpassword/$1", ['as'=>'passsiswa']);
    $routes->post("siswa/password/update/(:any)", "AdminSiswa::updatepassword/$1", ['as'=>'updatepasssiswa']);

    $routes->get("siswa/delete/(:any)", "AdminSiswa::delete/$1", ['as'=>'deletesiswa']);
    //end siswa

    //pelajaran
    $routes->get("pelajaran", "AdminPelajaran::index", ['as'=>'adminpelajaran']);

    $routes->get("pelajaran/detail/(:any)", "AdminPelajaran::detail/$1", ['as'=>'admindetailpelajaran']);

    $routes->post("pelajaran/store", "AdminPelajaran::store", ['as'=>'storepelajaran']);

    $routes->get("pelajaran/edit/(:any)", "AdminPelajaran::edit/$1", ['as'=>'editpelajaran']);
    $routes->post("pelajaran/update/(:any)", "AdminPelajaran::update/$1", ['as'=>'updatepelajaran']);

    $routes->get("pelajaran/delete/(:any)", "AdminPelajaran::delete/$1", ['as'=>'deletepelajaran']);
    //end pelajaran
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

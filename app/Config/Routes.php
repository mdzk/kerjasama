<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
// $routes->setAutoRoute(true);
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


$routes->post('/export/laporan', 'PdfController::kerjasama', ['as' => 'export-laporan', 'filter' => 'auth:admin']);
//Laporan
$routes->get('/laporan', 'Laporan::index', ['filter' => 'auth']);
$routes->get('/json/kerjasama', 'Home::kerjasama', ['filter' => 'auth']);

//usulan
$routes->get('/usulan', 'Usulan::index', ['filter' => 'auth']);
$routes->post('/usulan/add', 'Usulan::add', ['as' => 'usulan-add']);
$routes->post('/usulan/lihat', 'Usulan::lihat', ['as' => 'usulan-lihat', 'filter' => 'auth']);
$routes->post('/usulan/update', 'Usulan::update', ['as' => 'usulan-update', 'filter' => 'auth']);
$routes->post('/usulan/verif', 'Usulan::usulanVerif', ['as' => 'verif-usulan-sekarang', 'filter' => 'auth:admin']);
$routes->post('/usulan/revisi', 'Usulan::usulanRevisi', ['as' => 'usulan-revisi', 'filter' => 'auth:admin']);

$routes->get('/aktif-kerjasama', 'Aktif::index', ['filter' => 'auth:pimpinan']);
$routes->get('/kerjasama-berakhir', 'Aktif::tidakAktif', ['filter' => 'auth:pimpinan']);

//ajukan
$routes->get('/ajukan', 'Ajukan::index', ['filter' => 'auth']);
$routes->post('/ajukan/add', 'Ajukan::add', ['as' => 'ajukan-add']);

//kerjasama
$routes->get('/kerjasama', 'Kerjasama::index', ['filter' => 'auth:pimpinan']);
$routes->get('/kerjasama/history', 'Kerjasama::history', ['as' => 'kerjasama-history', 'filter' => 'auth']);
$routes->post('/kerjasama/lihat', 'Kerjasama::lihat', ['as' => 'kerjasama-lihat', 'filter' => 'auth']);
$routes->post('/kerjasama/update', 'Kerjasama::update', ['as' => 'kerjasama-update', 'filter' => 'auth']);
$routes->post('/kerjasama/delete', 'Kerjasama::delete', ['as' => 'kerjasama-hapus', 'filter' => 'auth']);

$routes->post('/kerjasama/acc', 'Kerjasama::kerjasamaVerifAcc', ['as' => 'verif-kerjasama-sekarang-acc', 'filter' => 'auth:pimpinan']);
$routes->post('/kerjasama/tolak', 'Kerjasama::kerjasamaVerifTolak', ['as' => 'verif-kerjasama-sekarang-tolak', 'filter' => 'auth:pimpinan']);
$routes->post('/kerjasama/revisi', 'Kerjasama::kerjasamaVerifRevisi', ['as' => 'verif-kerjasama-sekarang-revisi', 'filter' => 'auth:pimpinan']);

$routes->get('/akhir-kerjasama', 'Akhir::index', ['filter' => 'auth:pimpinan']);

//Akun
$routes->get('/akun', 'Akun::index', ['filter' => 'auth:admin']);
$routes->post('/akun/delete', 'Akun::delete', ['as' => 'akun-delete', 'filter' => 'auth:admin']);
$routes->post('/akun/add', 'Akun::add', ['as' => 'akun-add', 'filter' => 'auth:admin']);
$routes->get('/akun/verif', 'Akun::verif', ['as' => 'verif-akun', 'filter' => 'auth:admin']);
$routes->post('/akun/verif', 'Akun::akunVerif', ['as' => 'verif-akun-sekarang', 'filter' => 'auth:admin']);
$routes->post('/akun/update', 'Akun::update', ['as' => 'akun-update', 'filter' => 'auth:admin']);

//Dokumen
$routes->get('/dokumen', 'Dokumen::index', ['filter' => 'auth']);
$routes->post('/dokumen/search', 'Dokumen::search', ['as' => 'search-dokumen', 'filter' => 'auth']);

//Profile
$routes->get('/profile', 'Profile::index', ['filter' => 'auth']);
$routes->post('/profile/update', 'Profile::update', ['as' => 'profile-update', 'filter' => 'auth']);

// login ke home
$routes->get('/', 'Home::index', ['filter' => 'auth']);

//register
$routes->get('/register', 'Auth::register');
$routes->get('/waiting', 'Auth::waiting');
$routes->post('/auth/add', 'Auth::add', ['as' => 'auth-add']);

// Authentication Section
$routes->get('/login', 'Auth::index');
$routes->get('/forgot', 'ForgotPassword::index');
$routes->post('/forgot-password', 'ForgotPassword::forgotPassword', ['as' => 'forgot-password']);
$routes->get('/reset-password/(:segment)', 'ForgotPassword::resetPassword/$1', ['as' => 'reset-password']);
$routes->post('/update-password', 'ForgotPassword::updatePassword', ['as' => 'update-password']);
$routes->post('/login', 'Auth::auth', ['as' => 'auth']);
$routes->get('/logout', 'Auth::logout', ['as' => 'logout']);

$routes->get('/email', function () {
    echo view('email-ajukan');
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

<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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

// BACK END
$routes->resource('agamas', ['controller' => 'Backend\Agamas', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->resource('bantuans', ['controller' => 'Backend\Bantuans', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->resource('datadisabilitass', ['controller' => 'Backend\DataDisabilitass', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->resource('datankks', ['controller' => 'Backend\DataNkks', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->resource('datapenduduks', ['controller' => 'Backend\DataPenduduks', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->resource('datawilayahs', ['controller' => 'Backend\DataWilayahs', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->resource('desas', ['controller' => 'Backend\Desas', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->resource('golongandarahs', ['controller' => 'Backend\GolonganDarahs', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->resource('jeniskelamins', ['controller' => 'Backend\JenisKelamins', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->resource('kabupatens', ['controller' => 'Backend\Kabupatens', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->resource('kecamatans', ['controller' => 'Backend\Kecamatans', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->resource('kewarganegaraans', ['controller' => 'Backend\Kewarganegaraans', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->resource('pendidikans', ['controller' => 'Backend\Pendidikans', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->resource('provinsis', ['controller' => 'Backend\Provinsis', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->resource('statushubdlmkels', ['controller' => 'Backend\StatusHubDlmKels', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->resource('sumberpenghasilanutamas', ['controller' => 'Backend\SumberPenghasilanUtamas', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->resource('tingkatkesejahteraans', ['controller' => 'Backend\TingkatKesejahteraans', 'placeholder' => '(:num)', 'except' => 'new,edit']);

// find
$routes->get('agamas/find/(:any)', 'Backend\Agamas::find/$1');
$routes->get('bantuans/find/(:any)', 'Backend\Bantuans::find/$1');
$routes->get('datadisabilitass/find/(:any)', 'Backend\DataDisabilitass::find/$1');
$routes->get('datankks/find/(:any)', 'Backend\DataNkks::find/$1');
$routes->get('datapenduduks/find/(:any)', 'Backend\DataPenduduks::find/$1');
$routes->get('datawilayahs/find/(:any)', 'Backend\DataWilayahs::find/$1');
$routes->get('desas/find/(:any)', 'Backend\Desas::find/$1');
$routes->get('golongandarahs/find/(:any)', 'Backend\GolonganDarahs::find/$1');
$routes->get('jeniskelamins/find/(:any)', 'Backend\JenisKelamins::find/$1');
$routes->get('kabupatens/find/(:any)', 'Backend\Kabupatens::find/$1');
$routes->get('kecamatans/find/(:any)', 'Backend\Kecamatans::find/$1');
$routes->get('kewarganegaraans/find/(:any)', 'Backend\Kewarganegaraans::find/$1');
$routes->get('pendidikans/find/(:any)', 'Backend\Pendidikans::find/$1');
$routes->get('provinsis/find/(:any)', 'Backend\Provinsis::find/$1');
$routes->get('statushubdlmkels/find/(:any)', 'Backend\StatusHubDlmKels::find/$1');
$routes->get('sumberpenghasilanutamas/find/(:any)', 'Backend\SumberPenghasilanUtamas::find/$1');
$routes->get('tingkatkesejahteraans/find/(:any)', 'Backend\TingkatKesejahteraans::find/$1');

// FRONT END
$routes->get('desa', 'Frontend\Desa::index');

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

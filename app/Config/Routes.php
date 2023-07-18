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

// AUTH
$routes->post('register', 'Auth\Register::index', ['filter' => 'auth']);
$routes->post('login', 'Auth\Login::index');
$routes->get('me', 'Auth\Me::index', ['filter' => 'auth']);


// BACK END
$routes->resource('datadisabilitass', ['controller' => 'Backend\DataDisabilitass', 'placeholder' => '(:num)', 'except' => 'new,edit', 'filter' => 'auth']);
$routes->get('datadisabilitass/find/(:any)', 'Backend\DataDisabilitass::find/$1', ['filter' => 'auth']);

$routes->resource('datankks', ['controller' => 'Backend\DataNkks', 'placeholder' => '(:num)', 'except' => 'new,edit', 'filter' => 'auth']);
$routes->get('datankks/find/(:any)', 'Backend\DataNkks::find/$1', ['filter' => 'auth']);

$routes->resource('datapenduduks', ['controller' => 'Backend\DataPenduduks', 'placeholder' => '(:num)', 'except' => 'new,edit', 'filter' => 'auth']);
$routes->get('datapenduduks/find/(:any)', 'Backend\DataPenduduks::find/$1', ['filter' => 'auth']);

$routes->resource('desas', ['controller' => 'Backend\Desas', 'placeholder' => '(:num)', 'except' => 'new,edit', 'filter' => 'auth']);
$routes->get('desas/find/(:any)', 'Backend\Desas::find/$1', ['filter' => 'auth']);

$routes->resource('kabupatens', ['controller' => 'Backend\Kabupatens', 'placeholder' => '(:num)', 'except' => 'new,edit', 'filter' => 'auth']);
$routes->get('kabupatens/find/(:any)', 'Backend\Kabupatens::find/$1', ['filter' => 'auth']);

$routes->resource('kecamatans', ['controller' => 'Backend\Kecamatans', 'placeholder' => '(:num)', 'except' => 'new,edit', 'filter' => 'auth']);
$routes->get('kecamatans/find/(:any)', 'Backend\Kecamatans::find/$1', ['filter' => 'auth']);

$routes->resource('provinsis', ['controller' => 'Backend\Provinsis', 'placeholder' => '(:num)', 'except' => 'new,edit', 'filter' => 'auth']);
$routes->get('provinsis/find/(:any)', 'Backend\Provinsis::find/$1', ['filter' => 'auth']);

$routes->resource('databantuanindividus', ['controller' => 'Backend\DataBantuanIndividus', 'placeholder' => '(:num)', 'except' => 'new,edit', 'filter' => 'auth']);
$routes->get('databantuanindividus/find/(:any)', 'Backend\DataBantuanIndividus::find/$1', ['filter' => 'auth']);

$routes->resource('kelompokmasyarakats', ['controller' => 'Backend\KelompokMasyarakats', 'placeholder' => '(:num)', 'except' => 'new,edit', 'filter' => 'auth']);
$routes->get('kelompokmasyarakats/find/(:any)', 'Backend\KelompokMasyarakats::find/$1', ['filter' => 'auth']);

$routes->resource('databantuankelompoks', ['controller' => 'Backend\DataBantuanKelompoks', 'placeholder' => '(:num)', 'except' => 'new,edit', 'filter' => 'auth']);
$routes->get('databantuankelompoks/find/(:any)', 'Backend\DataBantuanKelompoks::find/$1', ['filter' => 'auth']);


// NO FILTER
$routes->resource('resumedatapenduduks', ['controller' => 'Backend\ResumeDataPenduduks', 'placeholder' => '(:num)', 'except' => 'new,edit']);

$routes->resource('beritas', ['controller' => 'Backend\Beritas', 'placeholder' => '(:num)', 'except' => 'new,edit',]);
$routes->get('beritas/find/(:any)', 'Backend\Beritas::find/$1');

$routes->resource('kategoriberitas', ['controller' => 'Backend\KategoriBeritas', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->get('kategoriberitas/find/(:any)', 'Backend\KategoriBeritas::find/$1');

$routes->resource('datawilayahs', ['controller' => 'Backend\DataWilayahs', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->get('datawilayahs/find/(:any)', 'Backend\DataWilayahs::find/$1');

$routes->resource('rtrws', ['controller' => 'Backend\RtRws', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->get('rtrws/find/(:any)', 'Backend\RtRws::find/$1');

$routes->resource('agamas', ['controller' => 'Backend\Agamas', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->get('agamas/find/(:any)', 'Backend\Agamas::find/$1');

$routes->resource('golongandarahs', ['controller' => 'Backend\GolonganDarahs', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->get('golongandarahs/find/(:any)', 'Backend\GolonganDarahs::find/$1');

$routes->resource('jeniskelamins', ['controller' => 'Backend\JenisKelamins', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->get('jeniskelamins/find/(:any)', 'Backend\JenisKelamins::find/$1');

$routes->resource('kewarganegaraans', ['controller' => 'Backend\Kewarganegaraans', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->get('kewarganegaraans/find/(:any)', 'Backend\Kewarganegaraans::find/$1');

$routes->resource('pendidikans', ['controller' => 'Backend\Pendidikans', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->get('pendidikans/find/(:any)', 'Backend\Pendidikans::find/$1');

$routes->resource('statushubdlmkels', ['controller' => 'Backend\StatusHubDlmKels', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->get('statushubdlmkels/find/(:any)', 'Backend\StatusHubDlmKels::find/$1');

$routes->resource('sumberpenghasilanutamas', ['controller' => 'Backend\SumberPenghasilanUtamas', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->get('sumberpenghasilanutamas/find/(:any)', 'Backend\SumberPenghasilanUtamas::find/$1');

$routes->resource('tingkatkesejahteraans', ['controller' => 'Backend\TingkatKesejahteraans', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->get('tingkatkesejahteraans/find/(:any)', 'Backend\TingkatKesejahteraans::find/$1');

$routes->resource('bantuanindividus', ['controller' => 'Backend\BantuanIndividus', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->get('bantuanindividus/find/(:any)', 'Backend\BantuanIndividus::find/$1');

$routes->resource('pekerjaans', ['controller' => 'Backend\Pekerjaans', 'placeholder' => '(:num)', 'except' => 'new,edit']);
$routes->get('pekerjaans/find/(:any)', 'Backend\Pekerjaans::find/$1');


// FRONT END
$routes->get('login', 'Frontend\Login::index');
$routes->get('register', 'Frontend\Register::index');
$routes->get('desa', 'Frontend\Desa::index');
$routes->get('kecamatan', 'Frontend\Kecamatan::index');
$routes->get('kabupaten', 'Frontend\Kabupaten::index');
$routes->get('provinsi', 'Frontend\Provinsi::index');
$routes->get('datankk', 'Frontend\DataNkk::index');
$routes->get('datadisabilitas', 'Frontend\DataDisabilitas::index');
$routes->get('datapenduduk', 'Frontend\DataPenduduk::index');
$routes->get('datawilayah', 'Frontend\DataWilayah::index');
$routes->get('databantuanindividu', 'Frontend\DataBantuanIndividu::index');
$routes->get('kelompokmasyarakats', 'Frontend\KelompokMasyarakats::index');
$routes->get('databantuankelompok', 'Frontend\DataBantuanKelompok::index');
$routes->get('berita', 'Frontend\Berita::index');

// MENUBAR
$routes->get('/', 'Menubar\Home::index');
$routes->get('infodesa', 'Menubar\Infodesa::index');
$routes->get('statistik', 'Menubar\Statistik::index');
$routes->get('adminweb', 'Menubar\Adminweb::index');


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

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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/qrcode', 'Magang::generate_qrcode');

// $routes->get('/sslogin', 'Home::login');
$routes->group('sslogin', static function ($routes) {
  $routes->get('/', 'Auth::login');
  $routes->post('get_username', 'Auth::get_username');
  $routes->post('get_login', 'Auth::get_login');
  $routes->post('send_otp', 'Auth::send_otp');
  // $routes->post('register', 'Auth::register');
});

// $routes->get('/ssregister', 'Home::register');
$routes->get('/sslogout', 'Auth::logout');

$routes->group('guest', static function ($routes) {
  $routes->get('zoom-meeting', 'Home::zoom');
  $routes->get('aula', 'Home::list');
  $routes->get('alat-zoom', 'Home::list');
  $routes->get('sub-domain', 'Home::sub_domain');
  $routes->get('hosting', 'Home::list');
});

$routes->group('statistik', static function ($routes) {
  $routes->get('zoom', 'Statistik::zoom_meeting');
  // MAGANG
  $routes->get('tiket-magang', 'Home::orders_tiket_magang');
  $routes->get('jenis-magang', 'Home::orders_tiket_magang_jenis');
  $routes->post('get-id-magang', 'Home::orders_get_magang_id');
  $routes->post('jenis-magang-bulan', 'Home::orders_tiket_magang_jenis_bulan');
  $routes->post('jenis-magang-hari', 'Home::orders_tiket_magang_jenis_hari');
  // DASHBOARD
  $routes->get('tiket-pelayanan', 'Home::orders_tiket_pelayanan');
  $routes->get('tiket-data-master', 'Home::orders_tiket_data_master');
  $routes->post('tiket-data-calendar', 'Admin::orders_tiket_kalender');
});

$routes->group('homepage', static function ($routes) {
  $routes->get('magang', 'Home::magang_page');
  $routes->get('faq', 'Home::faq_page');
  $routes->get('get-faq', 'Home::get_faq');
  $routes->get('help-desk', 'Home::help_desk_page');
  $routes->get('detail-tiket/(:num)/(:alphanum)', 'Home::detail_tiket_page/$1/$2');
  $routes->get('detail-nilai/(:num)/(:alphanum)', 'Home::detail_tiket_nilai/$1/$2');
});

// ADMIN
$routes->group('admin', ['filter' => 'adminAuth'], static function ($routes) {
  $routes->get('dashboard', 'Admin::index');
  $routes->post('dashboard/get_orders', 'Admin::orders_tiket');
  $routes->get('dashboard/get_orders_harian', 'Admin::orders_tiket_harian');
  $routes->post('dashboard/get_orders_tahunan', 'Admin::orders_tiket_tahunan');
  $routes->post('dashboard/get_orders_calendar', 'Admin::orders_tiket_kalender');
  $routes->get('profile', 'Admin::profile_page');
  $routes->get('print_tiket/(:num)/(:alphanum)', 'Admin::print_tiket/$1/$2');

  $routes->group('tiket', static function ($routes) {
    $routes->get('/', 'Admin::tiket_page');
    $routes->post('get_tiket', 'Form::get_tiket');
    $routes->post('get_tiket/count', 'Form::get_count_tiket');
    $routes->post('get_tiket_pelayanan', 'Form::get_tiket_pelayanan');
    $routes->post('get_tiket_pelayanan/count', 'Form::get_count_tiket_pelayanan');

    $routes->post('set_aula', 'Form::add_aula');
    $routes->post('get_aula', 'Form::add_aula_calendar');

    $routes->post('set_subdomain', 'Form::add_subdomain');
    $routes->post('set_upload', 'Form::add_upload');
    $routes->post('set_hosting', 'Form::add_hosting');
    $routes->post('set_tte', 'Form::add_tte');
    $routes->post('set_app', 'Form::add_app');
    $routes->post('set_jaringan', 'Form::add_jaringan');

    $routes->post('set_zoom', 'Form::add_zoom');
    $routes->post('get_zoom', 'Form::add_zoom_calendar');

    $routes->get('view_form/(:num)', 'Admin::viewGeneratedForm/$1');
  });

  $routes->group('landing-page', static function ($routes) {
    $routes->get('/', 'Admin::landing_page');
    $routes->get('zoom', 'Admin::zoom_page');
  });

  //MAGANG
  $routes->group('magang', static function ($routes) {
    $routes->get('/', 'Admin::magang_page');
    $routes->post('set_magang', 'Form::add_magang');
    $routes->post('get_magang/count', 'Form::get_count_magang');
    $routes->post('get_magang/tiket', 'Form::get_tiket_magang');

    $routes->get('get_opd', 'Form::get_opd_operator');

    $routes->post('update_catatan', 'Magang::update_catatan');
    $routes->post('update_pembimbing', 'Magang::update_pembimbing');
    $routes->post('update_nilai', 'Magang::update_nilai');
  });

  // menu admin
  $routes->group('pengguna', static function ($routes) {
    $routes->get('admin', 'Admin::pengguna_admin_page');
    $routes->get('get_admin', 'Admin::get_pengguna_admin_page');
    $routes->post('set_admin', 'Admin::set_admin');
    $routes->post('update_admin', 'Admin::update_admin');

    $routes->post('update_status', 'Admin::update_status');
    $routes->post('update_id_chat', 'Admin::update_id_chat');
    $routes->post('update_foto', 'Admin::update_foto');
    $routes->post('delete_pengguna', 'Admin::del_pengguna');
    $routes->get('get_opd', 'Admin::get_opd');

    $routes->get('verifikator', 'Admin::pengguna_verifikator_page');
    $routes->post('set_verifikator', 'Admin::set_verifikator');
    $routes->get('get_verifikator', 'Admin::get_pengguna_verifikator_page');
    $routes->post('update_pelayanan', 'Admin::update_list_pelayanan');
    $routes->post('delete_verifikator', 'Admin::delete_verifikator');

    $routes->get('operator', 'Admin::pengguna_operator_page');
    $routes->get('get_operator', 'Admin::get_pengguna_operator_page');
    $routes->post('set_op', 'Admin::set_op');
    $routes->post('update_op', 'Admin::update_op');

    $routes->get('pembimbing', 'Admin::pengguna_pembimbing_page');
    $routes->post('set_pembimbing', 'Admin::set_pembimbing');
    $routes->post('get_pembimbing', 'Admin::get_pembimbing');
    $routes->post('delete_pembimbing', 'Admin::delete_pembimbing');

    $routes->get('user', 'Admin::pengguna_user_page');
    $routes->post('get_user', 'Admin::get_pengguna_user_page');
    $routes->post('get_user/count', 'Admin::get_user_count');
  });

  // menu pelayanan
  $routes->group('pelayanan', static function ($routes) {
    $routes->get('/', 'Admin::pelayanan_page');
    $routes->get('get_pelayanan', 'Admin::get_pelayanan');
    $routes->post('update_status', 'Admin::update_status_pelayanan');
    $routes->post('del_pelayanan', 'Admin::del_pelayanan');
    $routes->post('set_pelayanan', 'Admin::set_pelayanan');
    $routes->post('update_pelayanan', 'Admin::update_pelayanan');
    $routes->get('detail/(:num)', 'Admin::detail_form/$1');
    $routes->get('get_form_fields/(:num)', 'Admin::get_form_fields/$1');
    $routes->post('save_form_field', 'Admin::save_form_field');
    $routes->delete('delete_form_field/(:num)', 'Admin::delete_form_field/$1');
  });

  // menu peralatan
  $routes->group('peralatan', static function ($routes) {
    $routes->get('/', 'Admin::alat_zoom_page');
    $routes->get('get_peralatan', 'Admin::get_peralatan');
    $routes->post('update_status', 'Admin::update_status_peralatan');
    $routes->post('del_peralatan', 'Admin::del_peralatan');
    $routes->post('set_peralatan', 'Admin::set_peralatan');
    $routes->post('update_peralatan', 'Admin::update_peralatan');
  });

  // menu aula
  $routes->group('aula', static function ($routes) {
    $routes->get('/', 'Admin::aula_page');
    $routes->get('get_aula', 'Admin::get_aula');
    $routes->post('update_status', 'Admin::update_status_aula');
    $routes->post('del_aula', 'Admin::del_aula');
    $routes->post('set_aula', 'Admin::set_aula');
  });

  // menu instansi
  $routes->group('opd', static function ($routes) {
    $routes->get('/', 'Admin::opd_page');
    $routes->post('del_opd', 'Admin::del_opd');
    $routes->post('set_opd', 'Admin::set_opd');
    $routes->post('update_opd', 'Admin::update_opd');
  });

  // menu sub bagian
  $routes->group('sub-bagian', static function ($routes) {
    $routes->get('/', 'Admin::sub_page');
    $routes->post('get_sub', 'Admin::get_sub');
    $routes->post('del', 'Admin::del_sub');
    $routes->post('set_sub', 'Admin::set_sub');
    $routes->post('update_sub', 'Admin::update_sub');
  });

  // menu faq
  $routes->group('faq', static function ($routes) {
    $routes->get('/', 'Admin::faq_page');
    $routes->get('get_faq', 'Admin::get_faq');
    $routes->post('del_faq', 'Admin::del_faq');
    $routes->post('set_faq', 'Admin::set_faq');
    $routes->post('update_status_faq', 'Admin::update_status_faq');
    $routes->post('update_faq', 'Admin::update_faq');
  });

  $routes->post('/admin/tiket/save', 'Tiket::save');
  $routes->post('/tiket/save', 'Tiket::save');  // Pastikan route ini ada
  $routes->get('form_builder/get_components/(:any)', 'FormBuilder::getComponents/$1');
  $routes->get('form/(:any)', 'Form::index/$1');
});

// OPERATOR
$routes->group('operator', ['filter' => 'operatorAuth'], static function ($routes) {
  $routes->get('dashboard', 'Admin::index');
  $routes->post('dashboard/get_orders', 'Operator::orders_tiket');
  $routes->get('dashboard/get_orders_harian', 'Operator::orders_tiket_harian');
  $routes->post('dashboard/get_orders_tahunan', 'Operator::orders_tiket_tahunan');
  $routes->get('dashboard/get_user', 'Operator::orders_user');
  $routes->get('profile', 'Admin::profile_page');
  $routes->get('print_tiket/(:num)/(:alphanum)', 'Admin::print_tiket/$1/$2');

  $routes->group('tiket', static function ($routes) {
    $routes->get('/', 'Admin::tiket_page');
    $routes->post('get_tiket', 'Form::get_tiket');
    $routes->post('get_tiket/count', 'Form::get_count_tiket');
    $routes->post('get_tiket_pelayanan', 'Form::get_tiket_pelayanan');
    $routes->post('get_tiket_pelayanan/count', 'Form::get_count_tiket_pelayanan');

    $routes->post('set_aula', 'Form::add_aula');
    $routes->post('get_aula', 'Form::add_aula_calendar');

    $routes->post('set_subdomain', 'Form::add_subdomain');
    $routes->post('set_upload', 'Form::add_upload');
    $routes->post('set_hosting', 'Form::add_hosting');
    $routes->post('set_tte', 'Form::add_tte');
    $routes->post('set_app', 'Form::add_app');
    $routes->post('set_jaringan', 'Form::add_jaringan');

    $routes->post('set_zoom', 'Form::add_zoom');
    $routes->post('get_zoom', 'Form::add_zoom_calendar');
  });

  // menu pelayanan
  $routes->group('pelayanan', static function ($routes) {
    $routes->get('get_pelayanan', 'Admin::get_pelayanan');
  });

  //MAGANG
  $routes->group('magang', static function ($routes) {
    $routes->get('/', 'Admin::magang_page');
    $routes->post('get_magang/count', 'Form::get_count_magang');
    $routes->post('get_magang/tiket', 'Form::get_tiket_magang');

    $routes->post('update_catatan', 'Magang::update_catatan');
    $routes->post('update_pembimbing', 'Magang::update_pembimbing');
  });

  // menu admin
  $routes->group('pengguna', static function ($routes) {
    $routes->post('update_status', 'Admin::update_status');
    $routes->post('update_id_chat', 'Admin::update_id_chat');
    $routes->post('update_foto', 'Admin::update_foto');
    $routes->post('delete_pengguna', 'Admin::del_pengguna');

    $routes->get('get_opd', 'Admin::get_opd');

    $routes->post('update_op', 'Admin::update_op');

    $routes->get('pembimbing', 'Admin::pengguna_pembimbing_page');
    $routes->post('set_pembimbing', 'Admin::set_pembimbing');
    $routes->post('get_pembimbing', 'Admin::get_pembimbing');
    $routes->post('delete_pembimbing', 'Admin::delete_pembimbing');
  });

  // menu sub bagian
  $routes->group('sub-bagian', static function ($routes) {
    $routes->get('/', 'Admin::sub_page');
    $routes->post('get_sub', 'Admin::get_sub');
    $routes->post('del', 'Admin::del_sub');
    $routes->post('set_sub', 'Admin::set_sub');
    $routes->post('update_sub', 'Admin::update_sub');
  });
});

// VERIFIKATOR
$routes->group('verifikator', ['filter' => 'verifikatorAuth'], static function ($routes) {
  $routes->get('dashboard', 'Admin::index');
  $routes->post('dashboard/get_orders', 'Operator::orders_tiket');
  $routes->get('dashboard/get_orders_harian', 'Operator::orders_tiket_harian');
  $routes->post('dashboard/get_orders_tahunan', 'Operator::orders_tiket_tahunan');
  $routes->get('dashboard/get_user', 'Operator::orders_user');
  $routes->get('profile', 'Admin::profile_page');
  $routes->get('print_tiket/(:num)/(:alphanum)', 'Admin::print_tiket/$1/$2');

  $routes->group('tiket', static function ($routes) {
    $routes->get('/', 'Admin::tiket_page');
    $routes->post('get_tiket', 'Form::get_tiket');
    $routes->post('get_tiket/count', 'Form::get_count_tiket');
    $routes->post('get_tiket_pelayanan', 'Form::get_tiket_pelayanan');
    $routes->post('get_tiket_pelayanan/count', 'Form::get_count_tiket_pelayanan');

    $routes->post('set_aula', 'Form::add_aula');
    $routes->post('get_aula', 'Form::add_aula_calendar');

    $routes->post('set_subdomain', 'Form::add_subdomain');
    $routes->post('set_upload', 'Form::add_upload');
    $routes->post('set_hosting', 'Form::add_hosting');
    $routes->post('set_tte', 'Form::add_tte');
    $routes->post('set_app', 'Form::add_app');
    $routes->post('set_jaringan', 'Form::add_jaringan');

    $routes->post('set_zoom', 'Form::add_zoom');
    $routes->post('get_zoom', 'Form::add_zoom_calendar');
  });

  // landing page
  $routes->group('landing-page', static function ($routes) {
    $routes->get('/', 'Admin::landing_page');
    $routes->get('zoom', 'Admin::zoom_page');
  });

  // menu pelayanan
  $routes->group('pelayanan', static function ($routes) {
    $routes->get('get_pelayanan', 'Admin::get_pelayanan');
  });

  // menu admin
  $routes->group('pengguna', static function ($routes) {
    $routes->post('update_status', 'Admin::update_status');
    $routes->post('update_id_chat', 'Admin::update_id_chat');
    $routes->post('update_foto', 'Admin::update_foto');
    $routes->post('delete_pengguna', 'Admin::del_pengguna');

    $routes->get('get_opd', 'Admin::get_opd');

    $routes->post('update_op', 'Admin::update_op');
  });
});

// PEMBIMBING
$routes->group('pembimbing', ['filter' => 'pembimbingAuth'], static function ($routes) {
  $routes->get('dashboard', 'Admin::index');
  $routes->post('dashboard/get_orders', 'Operator::orders_tiket');
  $routes->get('dashboard/get_orders_harian', 'Operator::orders_tiket_harian');
  $routes->post('dashboard/get_orders_tahunan', 'Operator::orders_tiket_tahunan');
  $routes->get('dashboard/get_user', 'Operator::orders_user');
  $routes->get('profile', 'Admin::profile_page');

  // menu admin
  $routes->group('pengguna', static function ($routes) {
    $routes->post('update_status', 'Admin::update_status');
    $routes->post('update_id_chat', 'Admin::update_id_chat');
    $routes->post('update_foto', 'Admin::update_foto');
    $routes->post('delete_pengguna', 'Admin::del_pengguna');

    $routes->get('get_opd', 'Admin::get_opd');

    $routes->post('update_op', 'Admin::update_op');

    $routes->post('get_pembimbing', 'Admin::get_pembimbing');
  });

  //MAGANG
  $routes->group('magang', static function ($routes) {
    $routes->get('/', 'Admin::magang_page');
    $routes->post('set_magang', 'Form::add_magang');
    $routes->post('get_magang/count', 'Form::get_count_magang');
    $routes->post('get_magang/tiket', 'Form::get_tiket_magang');

    $routes->post('update_catatan', 'Magang::update_catatan');
    $routes->post('update_pembimbing', 'Magang::update_pembimbing');
    $routes->post('update_nilai', 'Magang::update_nilai');
  });

  // menu sub bagian
  $routes->group('sub-bagian', static function ($routes) {
    $routes->post('get_sub', 'Admin::get_sub');
  });
});


// User
$routes->group('user', ['filter' => 'magangAuth'], static function ($routes) {
  $routes->get('dashboard', 'Admin::index');
  $routes->post('dashboard/get_orders', 'Operator::orders_tiket');
  $routes->get('dashboard/get_orders_harian', 'Operator::orders_tiket_harian');
  $routes->post('dashboard/get_orders_tahunan', 'Operator::orders_tiket_tahunan');
  $routes->get('dashboard/get_user', 'Operator::orders_user');
  $routes->get('profile', 'Admin::profile_page');

  // menu admin
  $routes->group('pengguna', static function ($routes) {
    $routes->post('update_status', 'Admin::update_status');
    $routes->post('update_id_chat', 'Admin::update_id_chat');
    $routes->post('update_foto', 'Admin::update_foto');
    $routes->post('delete_pengguna', 'Admin::del_pengguna');

    $routes->get('get_opd', 'Admin::get_opd');

    $routes->post('update_op', 'Admin::update_op');

    $routes->post('get_pembimbing', 'Admin::get_pembimbing');
  });

  //MAGANG
  $routes->group('magang', static function ($routes) {
    $routes->get('/', 'Admin::magang_page');
    $routes->post('set_magang', 'Form::add_magang');
    $routes->post('get_magang/count', 'Form::get_count_magang');
    $routes->post('get_magang/tiket', 'Form::get_tiket_magang');

    $routes->get('get_opd', 'Form::get_opd_operator');

    $routes->post('update_catatan', 'Magang::update_catatan');
    $routes->post('update_pembimbing', 'Magang::update_pembimbing');
    $routes->post('update_nilai', 'Magang::update_nilai');
  });

  // menu sub bagian
  $routes->group('sub-bagian', static function ($routes) {
    $routes->post('get_sub', 'Admin::get_sub');
  });
});

$routes->group('form', ['filter' => 'usersAuth'], static function ($routes) {
  $routes->get('zoom', 'Form::zoom_page');
  $routes->get('aula', 'Form::aula_page');
  $routes->get('sub-domain', 'Form::subdomain_page');
  $routes->get('upload-document', 'Form::upload_page');
  $routes->get('hosting', 'Form::hosting_page');
  $routes->get('sertifikat-tte', 'Form::tte_page');
  $routes->get('pendampingan-aplikasi', 'Form::app_page');
  $routes->get('pengaduan-jaringan', 'Form::jaringan_page');
});

$routes->group('detail', ['filter' => 'usersAuth'], static function ($routes) {
  $routes->get('zoom/(:num)/(:alphanum)', 'Detail::zoom_page/$1/$2');
  $routes->get('aula/(:num)/(:alphanum)', 'Detail::aula_page/$1/$2');
  $routes->get('sub-domain/(:num)/(:alphanum)', 'Detail::subdomain_page/$1/$2');
  $routes->get('upload-document/(:num)/(:alphanum)', 'Detail::upload_page/$1/$2');
  $routes->get('hosting/(:num)/(:alphanum)', 'Detail::hosting_page/$1/$2');
  $routes->get('sertifikat-tte/(:num)/(:alphanum)', 'Detail::tte_page/$1/$2');
  $routes->get('pendampingan-aplikasi/(:num)/(:alphanum)', 'Detail::app_page/$1/$2');
  $routes->get('pengaduan-jaringan/(:num)/(:alphanum)', 'Detail::jaringan_page/$1/$2');
  $routes->get('pelaratan-zoom/(:num)/(:alphanum)', 'Detail::alat_page/$1/$2');

  $routes->get('magang/(:num)/(:alphanum)', 'Detail::magang_page/$1/$2');
  $routes->post('magang/get_history', 'Detail::get_magang_history');

  $routes->post('get_history', 'Detail::get_list_history');
  $routes->post('update_catatan', 'Detail::update_catatan');
  $routes->post('update_meeting', 'Detail::update_meeting');
  $routes->post('update_jaringan', 'Detail::update_tindak_lanjut');
  $routes->post('update_hosting', 'Detail::update_hosting');
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

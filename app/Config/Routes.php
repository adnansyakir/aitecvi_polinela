<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('back', function () {
    return redirect()->back();
});


$routes->get('/', 'LandingPage::index');

$routes->get('/loginn', 'Auth::index');
$routes->get('/register', 'Auth::register');
$routes->post('/save', 'Auth::registerPost');

$routes->get('/verification_pending', 'Auth::verification');

$routes->group('auth', ['filter' => 'redirectIfAuthenticated'], function ($routes) {
    $routes->get('/', 'Auth::index');
    $routes->get('logout', 'Auth::logout', ['filter' => null]); // Exclude from filter
    $routes->post('check-auth', 'Auth::checkAuth');
});



$routes->group('admin', ['filter' => 'authenticate'], function ($routes) {
    // $routes->group("Admin", ["filter" => "auth"], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index', ['filter' => 'authenticate']);


    $routes->get('user', 'AdminProfil::index');
    $routes->post('user/change-password', 'AdminProfil::changePassword');

    $routes->get('juri', 'AdminJuri::index');
    $routes->get('juri/add', 'AdminJuri::addJuri');
    $routes->post('juri/add', 'AdminJuri::addJuriPost');
    $routes->get('juri/edit/(:any)', 'AdminJuri::editJuri/$1');
    $routes->post('juri/edit/(:any)', 'AdminJuri::editJuriPost/$1');
    $routes->get('juri/delete/(:any)', 'AdminJuri::deleteJuri/$1');

    $routes->get('koordinator', 'AdminKoordinator::index');
    $routes->get('koordinator/add', 'AdminKoordinator::add');
    $routes->post('koordinator/add', 'AdminKoordinator::create');
    $routes->get('koordinator/edit/(:any)', 'AdminKoordinator::edit/$1');
    $routes->post('koordinator/update/(:any)', 'AdminKoordinator::update/$1');
    $routes->get('koordinator/delete/(:any)', 'AdminKoordinator::delete/$1');


    $routes->get('pendamping', 'AdminPendamping::index');
    $routes->get('pendamping/add', 'AdminPendamping::addPendamping');
    $routes->post('pendamping/add', 'AdminPendamping::addPendampingPost');
    $routes->get('pendamping/edit/(:any)', 'AdminPendamping::editPendamping/$1');
    $routes->post('pendamping/edit/(:any)', 'AdminPendamping::editPendampingPost/$1');
    $routes->get('pendamping/delete/(:any)', 'AdminPendamping::deletePendamping/$1');

    // Proposal
    $routes->get('pendaftaran/kompetisiInovasi/proposal', 'AdminkompetisiInovasi::kompetisiInovasiProposal');
    $routes->get('pendaftaran/kompetisiInovasi/proposal/add', 'AdminkompetisiInovasi::addkompetisiInovasiProposal');
    $routes->post('pendaftaran/kompetisiInovasi/proposal/add', 'AdminkompetisiInovasi::addkompetisiInovasiProposalpost');
    $routes->get('pendaftaran/kompetisiInovasi/proposal/edit/(:any)', 'AdminkompetisiInovasi::editkompetisiInovasiProposal/$1');
    $routes->post('pendaftaran/kompetisiInovasi/proposal/edit/(:any)', 'AdminkompetisiInovasi::editkompetisiInovasiProposalPost/$1');
    $routes->get('pendaftaran/kompetisiInovasi/proposal/delete/(:any)', 'AdminkompetisiInovasi::deletekompetisiInovasiProposal/$1');

    // Video

    $routes->get('pendaftaran/kompetisiInovasi/video', 'AdminkompetisiInovasi::kompetisiInovasiVideo');
    $routes->get('pendaftaran/kompetisiInovasi/video/add', 'AdminkompetisiInovasi::addkompetisiInovasiVideo');
    $routes->post('pendaftaran/kompetisiInovasi/video/add', 'AdminkompetisiInovasi::addkompetisiInovasiVideoPost');
    $routes->get('pendaftaran/kompetisiInovasi/video/edit/(:any)', 'AdminkompetisiInovasi::editkompetisiInovasiVideo/$1');
    $routes->post('pendaftaran/kompetisiInovasi/video/edit/(:any)', 'AdminkompetisiInovasi::editkompetisiInovasiVideoPost/$1');
    $routes->get('pendaftaran/kompetisiInovasi/video/delete/(:any)', 'AdminkompetisiInovasi::deletekompetisiInovasiVideo/$1');


    //AdminMaster 


    //PT
    $routes->get('master/perguruantinggi', 'AdminMaster::pt');
    $routes->get('master/perguruantinggi/add', 'AdminMaster::addPt');
    $routes->post('master/perguruantinggi/add', 'AdminMaster::addPtPost');
    $routes->get('master/perguruantinggi/edit/(:any)', 'AdminMaster::editPt/$1');
    $routes->post('master/perguruantinggi/edit/(:any)', 'AdminMaster::editPtPost/$1');
    $routes->get('master/perguruantinggi/delete/(:any)', 'AdminMaster::deletePt/$1');
    $routes->get('master/users', 'AdminUsers::users');
    $routes->get('master/users/add', 'AdminUsers::add');
    $routes->post('master/users/save', 'AdminUsers::save');
    $routes->get('master/users/edit/(:any)', 'AdminUsers::edit/$1');
    $routes->post('master/users/update', 'AdminUsers::update');
    $routes->get('master/users/delete/(:any)', 'AdminUsers::delete/$1');
    $routes->get('master/users/updateStatus/(:any)/(:any)', 'AdminUsers::updateStatus/$1/$2');


    //cabang Lomba
    $routes->get('master/lomba', 'AdminMaster::cabanglomba');
    $routes->get('master/lomba/add', 'AdminMaster::addcabanglomba');
    $routes->post('master/lomba/add', 'AdminMaster::addcabanglombaPost');
    $routes->get('master/lomba/edit/(:any)', 'AdminMaster::editCabangLomba/$1');
    $routes->post('master/lomba/edit/(:any)', 'AdminMaster::editCabangLombaPost/$1');
    $routes->get('master/lomba/delete/(:any)', 'AdminMaster::deleteCabangLomba/$1');



    //prodi 
    $routes->get('master/prodi', 'AdminMaster::prodi');
    $routes->get('master/prodi/add', 'AdminMaster::addProdi');
    $routes->post('master/prodi/add', 'AdminMaster::addProdiPost');
    $routes->get('master/prodi/edit/(:any)', 'AdminMaster::editProdi/$1');
    $routes->post('master/prodi/edit/(:num)', 'AdminMaster::editProdiPost/$1');
    $routes->get('master/prodi/delete/(:any)', 'AdminMaster::deleteProdi/$1');

    //peserta
    $routes->get('peserta', 'AdminMaster::peserta');
    $routes->get('peserta/add', 'AdminMaster::addPeserta');
    $routes->post('peserta/add', 'AdminMaster::addPesertaPost');
    $routes->get('peserta/edit/(:any)', 'AdminMaster::editPeserta/$1');
    $routes->post('peserta/edit/(:num)', 'AdminMaster::editPesertaPost/$1');
    $routes->get('peserta/delete/(:any)', 'AdminMaster::deletePeserta/$1');
    $routes->get('peserta/view/(:any)', 'AdminMaster::pesertaview/$1');


    $routes->get('hasillomba', 'AdminHasillomba::index');
    $routes->get('hasillomba/add', 'AdminHasillomba::add');
    $routes->post('hasillomba/store', 'AdminHasillomba::store');
    $routes->get('hasillomba/edit/(:any)', 'AdminHasillomba::edit/$1');
    $routes->post('hasillomba/update/(:any)', 'AdminHasillomba::update/$1');
    $routes->get('hasillomba/delete/(:any)', 'AdminHasillomba::delete/$1');


    $routes->get('sertifikat', 'AdminSertifikat::Sertifikat');
    $routes->get('sertifikat/add', 'AdminSertifikat::addSertifikat');
    $routes->post('sertifikat/add', 'AdminSertifikat::addSertifikatPost');
    $routes->get('sertifikat/edit/(:any)', 'AdminSertifikat::editSertifikat/$1');
    $routes->post('sertifikat/edit/(:num)', 'AdminSertifikat::editSertifikatPost/$1');
    $routes->get('sertifikat/delete/(:any)', 'AdminSertifikat::deleteSertifikat/$1');
});

$routes->group('juri', ['filter' => 'authenticate'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index', ['filter' => 'authenticate']);

    $routes->get('user', 'JuriProfil::index');
    $routes->post('user/change-password', 'JuriProfil::changePassword');

    $routes->get('hasillomba', 'JuriHasillomba::index');
    $routes->get('hasillomba/add', 'JuriHasillomba::add');
    $routes->post('hasillomba/store', 'JuriHasillomba::store');
    $routes->get('hasillomba/edit/(:any)', 'JuriHasillomba::edit/$1');
    $routes->post('hasillomba/update/(:any)', 'JuriHasillomba::update/$1');
    $routes->get('hasillomba/delete/(:any)', 'JuriHasillomba::delete/$1');

    $routes->get('juri', 'JuriJuri::index');
});

$routes->group('pendamping', ['filter' => 'authenticate'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index', ['filter' => 'authenticate']);

    $routes->get('user', 'PendampingProfil::index');
    $routes->post('user/change-password', 'PendampingProfil::changePassword');

    $routes->get('pendaftaran', 'PendampingPendaftaran::index');
    $routes->get('pendaftaran/add', 'PendampingPendaftaran::addPendaftaran');
    $routes->post('pendaftaran/add', 'PendampingPendaftaran::addPendaftaranPost');
    $routes->get('pendaftaran/edit/(:any)', 'PendampingPendaftaran::editPendaftaran/$1');
    $routes->post('pendaftaran/edit/(:any)', 'PendampingPendaftaran::editPendaftaranPost/$1');
    $routes->get('pendaftaran/delete/(:any)', 'PendampingPendaftaran::deletePendaftaran/$1');
    
    $routes->get('finalisasi', 'Pendampingfinalisasi::finalisasi');
    $routes->get('finalisasi/add', 'Pendampingfinalisasi::addfinalisasi');
    $routes->post('finalisasi/add', 'Pendampingfinalisasi::addfinalisasiPost');
    $routes->get('finalisasi/edit/(:any)', 'Pendampingfinalisasi::editfinalisasi/$1');
    $routes->post('finalisasi/edit/(:any)', 'Pendampingfinalisasi::editfinalisasiPost/$1');
    $routes->get('finalisasi/delete/(:any)', 'Pendampingfinalisasi::deletefinalisasi/$1');

    $routes->get('peserta', 'PendampingPeserta::peserta');
    $routes->get('peserta/add', 'PendampingPeserta::addPeserta');
    $routes->post('peserta/add', 'PendampingPeserta::addPesertaPost');
    $routes->get('peserta/edit/(:any)', 'PendampingPeserta::editPeserta/$1');
    $routes->post('peserta/edit/(:num)', 'PendampingPeserta::editPesertaPost/$1');
    $routes->get('peserta/delete/(:any)', 'PendampingPeserta::deletePeserta/$1');
    $routes->get('sertifikat', 'PendampingSertifikat::Sertifikat');
});

$routes->group('kampus', ['filter' => 'authenticate'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index', ['filter' => 'authenticate']);

    $routes->get('user', 'KampusProfil::index');
    $routes->post('user/change-password', 'KampusProfil::changePassword');

    $routes->get('sertifikat', 'KampusSertifikat::Sertifikat');

    $routes->get('peserta', 'KampusPeserta::peserta');
    $routes->get('peserta/add', 'KampusPeserta::addPeserta');
    $routes->post('peserta/add', 'KampusPeserta::addPesertaPost');
    $routes->get('peserta/edit/(:any)', 'KampusPeserta::editPeserta/$1');
    $routes->post('peserta/edit/(:num)', 'KampusPeserta::editPesertaPost/$1');
    $routes->get('peserta/delete/(:any)', 'KampusPeserta::deletePeserta/$1');
    $routes->get('sertifikat', 'KampusSertifikat::Sertifikat');
});

// Koordinator
$routes->group('koordinator', ['filter' => 'authenticate'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index', ['filter' => 'authenticate']);

    $routes->get('user', 'KoordinatorProfil::index');
    $routes->post('user/change-password', 'KoordinatorProfil::changePassword');

    $routes->get('hasillomba', 'KoordinatorHasillomba::index');
    $routes->get('hasillomba/add', 'KoordinatorHasillomba::add');
    $routes->post('hasillomba/store', 'KoordinatorHasillomba::store');
    $routes->get('hasillomba/edit/(:any)', 'KoordinatorHasillomba::edit/$1');
    $routes->post('hasillomba/update/(:any)', 'KoordinatorHasillomba::update/$1');
    $routes->get('hasillomba/delete/(:any)', 'KoordinatorHasillomba::delete/$1');

    $routes->get('sertifikat', 'KoordinatorSertifikat::Sertifikat');
    $routes->get('sertifikat/add', 'KoordinatorSertifikat::addSertifikat');
    $routes->post('sertifikat/add', 'KoordinatorSertifikat::addSertifikatPost');
    $routes->get('sertifikat/edit/(:any)', 'KoordinatorSertifikat::editSertifikat/$1');
    $routes->post('sertifikat/edit/(:num)', 'KoordinatorSertifikat::editSertifikatPost/$1');
    $routes->get('sertifikat/delete/(:any)', 'KoordinatorSertifikat::deleteSertifikat/$1');
});

<?php

namespace Config;

use App\Controllers\Home;

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

$routes->get('/', [Home::class, 'index']);
$routes->get('/help', 'Help::index');
$routes->get('/profile', 'Auth::profile');
$routes->post('/profile-admin', 'Auth::updateIsAdmin');
$routes->post('/profile-siswa', 'Auth::updateIsStudents');

$routes->group('/auth', function ($routes) {
    $routes->get('', 'Auth::index');
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::loginAction');
    $routes->get('logout', 'Auth::logoutAction');
});


$routes->group("/student", function ($routes) {
    $routes->get('', 'Student::index');
    $routes->get('create', 'Student::create');
    $routes->get('update/(:segment)', 'Student::update/$1');

    $routes->post('create/action', 'Student::createAction');
    $routes->post('update/action', 'Student::updateAction');
    $routes->post('delete/(:segment)', 'Student::deleteAction/$1');

    $routes->get('(:segment)/achievement', 'Student::achievement/$1');
    $routes->post('(:segment)/achievement', 'Student::achievementAction/$1');

    $routes->get('(:segment)/violation', 'Student::violation/$1');
    $routes->post('(:segment)/violation', 'Student::violationAction/$1');

    $routes->get('(:segment)/penalty', 'Student::penalty/$1');
    $routes->post('(:segment)/penalty', 'Student::penaltyAction/$1');
});

$routes->group("/achievement", function ($routes) {
    $routes->get('', 'Achievement::index');
    $routes->get('create', 'Achievement::create');
    $routes->get('update/(:segment)', 'Achievement::update/$1');

    $routes->post('create/action', 'Achievement::createAction');
    $routes->post('update/action', 'Achievement::updateAction');
    $routes->post('delete/(:segment)', 'Achievement::deleteAction/$1');
});

$routes->group("/violation", function ($routes) {
    $routes->get('', 'Violation::index');
    $routes->get('create', 'Violation::create');
    $routes->get('update/(:segment)', 'Violation::update/$1');

    $routes->post('create/action', 'Violation::createAction');
    $routes->post('update/action', 'Violation::updateAction');
    $routes->post('delete/(:segment)', 'Violation::deleteAction/$1');
});

$routes->group("/penalty", function ($routes) {
    $routes->get('', 'Penalty::index');
    $routes->get('create', 'Penalty::create');
    $routes->get('update/(:segment)', 'Penalty::update/$1');

    $routes->post('create/action', 'Penalty::createAction');
    $routes->post('update/action', 'Penalty::updateAction');
    $routes->post('delete/(:segment)', 'Penalty::deleteAction/$1');
});

$routes->group("/analytic", function ($routes) {
    $routes->get('', 'Analytic::index');
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

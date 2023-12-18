<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->post('/logout', 'login::logout');
$routes->get('/register', 'Home::register');
$routes->post('/signIn', 'login::signIn');
$routes->post('/signUp', 'login::signUp');
$routes->get('/admin/dashboard', 'admin::index');

$routes->get('/user/dashboard', 'user::index');
$routes->get('/user/manageuser', 'user::manageuser');
$routes->get('/user/edituser/(:num)', 'user::edit/$1');
$routes->post('/user/update/(:num)', 'user::update/$1');
$routes->post('/user/delete/(:num)', 'user::delete/$1');
$routes->get('/user/adduser', 'user::add');
$routes->post('/user/create', 'user::create');

$routes->get('/user/viewstudent', 'user::viewstudent');
$routes->get('/user/viewclass', 'user::viewclass');

$routes->get('/student/managestudent', 'student::index');
$routes->get('/student/editstudent/(:num)', 'student::edit/$1');
$routes->post('/student/update/(:num)', 'student::update/$1');
$routes->post('/student/delete/(:num)', 'student::delete/$1');
$routes->get('/student/addstudent', 'student::add');
$routes->post('/student/create', 'student::create');

$routes->get('/class/manageclass', 'kelas::index');
$routes->get('/class/editclass/(:num)', 'kelas::edit/$1');
$routes->post('/class/update/(:num)', 'kelas::update/$1');
$routes->post('/class/delete/(:num)', 'kelas::delete/$1');
$routes->get('/class/addclass', 'kelas::add');
$routes->post('/class/create', 'kelas::create');
$routes->get('/class/addstudent', 'kelas::addstudent');
$routes->get('/class/viewclass/(:num)', 'kelas::viewclass/$1');

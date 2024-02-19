<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home','Home::browse');

$routes->get('/create-courses','Videocontroller::index');
$routes->get('/add-chapters','Videocontroller::chapter_create');
$routes->post('/upload-video','Videocontroller::upload');
$routes->post('/course-add','Videocontroller::course_create');
$routes->get('/course-view','Videocontroller::courseview');

// app/Config/Routes.php

$routes->get('progress', 'Videocontroller::index_bar');
$routes->get('progress/updateProgress', 'Videocontroller::updateProgress');

$routes->get('/pay/(:num)','Razorpay::index/$1');
$routes->post('/pay/createOrder','Razorpay::createOrder');
$routes->post('/pay/verify','Razorpay::verifyPayment');

$routes->get('play/(:num)','Home::play/$1');

$routes->get('/courses-purchased','Home::course_purchased');

$routes->get('/courses_list','Home::list');

$routes->get('/edit/(:num)','Home::edit/$1');
$routes->post('/ajax','Home::ajax');

$routes->post('/async','Home::async');
$routes->get('/targetedvideo/(:num)','Videocontroller::targetedvideo/$1');

$routes->post('/sent','Home::sent');
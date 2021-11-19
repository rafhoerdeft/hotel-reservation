<?php

namespace App\Modules\Landing\Config;

if (!isset($routes)) {
	$routes = \Config\Services::routes(true);
}

$routes->group('landing', ['namespace' => 'App\Modules\Landing\Controllers'], function ($subroutes) {

	// Beranda
	$subroutes->get('/', 'Beranda::index');
	$subroutes->get('home', 'Beranda::index');
	$subroutes->post('checkrm', 'Beranda::checkRooms');
	$subroutes->get('searchrm', 'Beranda::searchRooms');

	// Auth
	$subroutes->get('logout', 'Auth::logout');
	$subroutes->group('login', function ($routes) {
		$routes->get('/', 'Auth::login');
		$routes->post('process', 'Auth::processLogin');
	});
	$subroutes->group('register', function ($routes) {
		$routes->get('/', 'Auth::register');
		$routes->post('save', 'Auth::saveRegister');
	});

	// Booking 
	$subroutes->group('booking', function ($routes) {
		$routes->add('token', 'Booking::getToken');
		$routes->add('save', 'Booking::saveBook');
		$routes->get('result/(:any)', 'Booking::resultTrans/$1', ['as' => 'booking_result']);
	});

	// History
	$subroutes->group('histori', ['namespace' => 'App\Modules\Landing\Controllers', 'filter' => 'authuser'], function ($routes) {
		$routes->add('/', 'Beranda::historiBooking');
	});

	$subroutes->add('notifmt', 'Notification::index');
});

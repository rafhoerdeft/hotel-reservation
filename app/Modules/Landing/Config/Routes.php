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

	// Token 
	$subroutes->group('booking', function ($routes) {
		$routes->add('token', 'Booking::getToken');
		$routes->add('save', 'Booking::saveBook');
		$routes->get('result/(:any)', 'Booking::resultTrans/$1', ['as' => 'booking_result']);
	});

	// Forum Kelitbangan
	$subroutes->group('usulanpenelitian', ['namespace' => 'App\Modules\Landing\Controllers\Forum'], function ($routes) {
		$routes->add('', 'UsulanPenelitian::index');
		$routes->get('detail/(:any)', 'UsulanPenelitian::detail/$1');
		$routes->get('form', 'UsulanPenelitian::add');
		$routes->post('save', 'UsulanPenelitian::save');
	});
});

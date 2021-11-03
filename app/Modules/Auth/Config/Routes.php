<?php

namespace App\Modules\Auth\Config;

if (!isset($routes)) {
	$routes = \Config\Services::routes(false);
}

$routes->group('auth', ['namespace' => 'App\Modules\Auth\Controllers'], function ($subroutes) {

	/*** Route for Login ***/
	$subroutes->add('', 'Auth::index');
	$subroutes->post('cekLogin', 'Auth::cek_login');
	$subroutes->add('logout', 'Auth::logout');
});

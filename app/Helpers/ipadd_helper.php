<?php
	if (!function_exists('get_client_ip')) {
		function get_client_ip()
		{
			$ipaddress = '';
			if (isset($_SERVER['HTTP_CLIENT_IP'])) {
				$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
				$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			} elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
				$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			} elseif (isset($_SERVER['HTTP_FORWARDED'])) {
				$ipaddress = $_SERVER['HTTP_FORWARDED'];
			} elseif (isset($_SERVER['REMOTE_ADDR'])) {
				$ipaddress = $_SERVER['REMOTE_ADDR'];
			} else {
				$ipaddress = 'UNKNOWN';
			}
			return $ipaddress;
		}
	}
?>
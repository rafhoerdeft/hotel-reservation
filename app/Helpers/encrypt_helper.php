<?php 
	if (!function_exists('encode')) {
		function encode($id){
		    $enc = \Config\Services::encrypter();
			$encode = strtr(base64_encode($enc->encrypt($id)), '+/=', '-_~');
		    return $encode;
		}
	}

	if (!function_exists('decode')) {
		function decode($id){
		    $enc = \Config\Services::encrypter();
			$decode = $enc->decrypt(base64_decode(strtr($id, '-_~', '+/=')));
		    return $decode;
		}
	}

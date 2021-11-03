<?php 
	if (!function_exists('token_csrf')) {
		function token_csrf(){
            // $sec = \Config\Services::security();
			// $token =  "<input type='hidden' name='".csrf_token()."' value='". csrf_hash()."'>";
			$token = csrf_field();
		    return $token;
		}
	}
?>
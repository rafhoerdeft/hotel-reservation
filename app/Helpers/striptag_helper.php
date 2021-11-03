<?php 
	if (!function_exists('striptag')) {
		function striptag($data){
            $dt = array();
			foreach ($data as $key => $val) {
                $dt[$key] = strip_tags(htmlspecialchars_decode($val));
            }
            return $dt;
		}
	}
?>
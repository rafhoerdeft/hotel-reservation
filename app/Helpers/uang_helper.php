<?php

	function uang($angka,$type=false){

		$uang = number_format($angka, 2, ',', '.');

		return ($type == false )?$uang:'Rp. '.$uang;

	}



	function nominal($angka='') {

		$nominal = number_format($angka,0,'.','.');

		return $nominal;

	}

	function uang_koma($angka,$type=false){

		$uang = number_format($angka, 0, ',', ',');

		return $uang;

	}

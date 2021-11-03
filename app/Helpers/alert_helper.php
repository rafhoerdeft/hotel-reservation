<?php 
	
	if (!function_exists('alert_success')) {
		function alert_success($text){
			$sess = \Config\Services::session();
			
			$alert =  "<div class='alert alert-rounded alert-success' id='alts'> 
		                    <i class='mdi mdi-check-circle'></i> <b>Success!</b> $text
		                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button>
		                </div>";
			$sess->setFlashdata('alert', $alert);
		}
	}

	if (!function_exists('alert_failed')) {
		function alert_failed($text){
			$sess = \Config\Services::session();
			
			$alert =  "<div class='alert alert-rounded alert-danger' id='alts'> 
		                    <i class='mdi mdi-close-circle'></i> <b>Gagal!</b> $text
		                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button>
						</div>";
			$sess->setFlashdata('alert', $alert);
		}
	}

	if (!function_exists('alert_warning')) {
		function alert_warning($text){
			$sess = \Config\Services::session();
			
			$alert =  "<div class='alert alert-rounded alert-warning' id='alts'> 
		                    <i class='mdi mdi-alert-circle'></i> <b>Peringatan!</b> $text
		                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button>
						</div>";
			$sess->setFlashdata('alert', $alert);
		}
	}

	if (!function_exists('show_alert')) {
		function show_alert(){
			$sess = \Config\Services::session();
			return $sess->getFlashdata('alert');
		}
	}

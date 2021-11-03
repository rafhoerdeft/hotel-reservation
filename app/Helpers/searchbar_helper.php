<?php 

    if (!function_exists('formSearch')) {
		function formSearch($tbl){
            $data = array(
              'table_name' => $tbl  
            );
			return view('search_data_table', $data);
		}
	}
    
?>
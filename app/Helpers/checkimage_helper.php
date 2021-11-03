<?php

if (!function_exists('check_image')) {
    function check_image($nama_file = '', $location = '')
    {
        if ($nama_file != null) {
            if (!realpath($location . '/' . $nama_file)) {
                return base_url('assets/img/noimage/no_img3.jpg');
            } else {
                return base_url($location . '/' . $nama_file);
            }
        } else {
            return base_url('assets/img/noimage/no_img3.jpg');
        }
    }
}

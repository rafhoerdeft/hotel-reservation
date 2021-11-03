<?php
if (!function_exists('thumb')) {
    function thumb($file_name)
    {
        $file = explode('.', $file_name); //pecah file_name untuk dapat extension
        return  $file[0] . '_thumb' . '.' . $file[1];
    }
}

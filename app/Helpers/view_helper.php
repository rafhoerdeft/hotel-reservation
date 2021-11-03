<?php

use Jenssegers\Blade\Blade;

if (!function_exists('views')) {
    function views($view, $modules = false, $data = [])
    {
        if ($modules != false) {
            $v_path = APPPATH . 'Modules/' . ucfirst($modules) . '/Views';
        } else {
            $v_path = APPPATH . 'Views';
        }

        $blade = new Blade($v_path, WRITEPATH . 'cache');

        // Custom directive -> call @alert (name)
        $blade->compiler()->directive('alert', function ($name) {
            return '<div class="alert alert-success">Heyy, ' . $name . '</div>';
        });

        echo $blade->make($view, $data);
    }
}

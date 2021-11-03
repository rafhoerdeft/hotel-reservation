<?php

if (!function_exists('avatar')) {
    function avatar($name)
    {
        return "https://ui-avatars.com/api/?name=" . $name . "&background=random&color=fff&size=100&rounded=true&bold=true&format=svg&font-size=0.45";
    }
}

<?php
if (!function_exists('text_uc')) {
    function text_uc($text = '')
    {
        return ucwords(strtolower($text));
    }

    function mark($text = '', $search = '')
    {
        helper('text');
        return highlight_phrase($text, $search, '<span style="background: #ff0;">', '</span>');
    }
}

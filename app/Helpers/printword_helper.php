<?php

if (!function_exists('print_word')) {
    function printWord($path = '', $filename = '', $data = [])
    {
        $document = file_get_contents(FCPATH . $path);

        foreach ($data as $key => $val) {
            $document = str_replace("[" . $key . "]", $val, $document);
        }

        $response = service('response');
        $response->setHeader("Content-type", "application/msword");
        $response->setHeader("Content-disposition", "attachment; filename=" . $filename . ".doc");
        // $response->setHeader("Content-length", strlen($document));

        return $document;
    }
}

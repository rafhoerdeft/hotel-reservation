<?php

function photo_exp($data, $index = 0, $delimiter = ';')
{
    $photo = explode($delimiter, $data);
    return $photo[$index];
}

<?php
/**
 * Created by PhpStorm.
 * User: Ashik Chowdhury
 * Date: 7/8/2018
 * Time: 12:15 PM
 */
function bangla_slug($string, $separator = '-') {
    $string = mb_strtolower($string, 'UTF-8');
    $n_string = rtrim($string, '?');
    return preg_replace('/\s+/u', $separator, trim($n_string));
}

function my_slug($string, $separator = '-')
{
    $string = trim($string);
    $string = mb_strtolower($string, 'UTF-8');

    // Make alphanumeric (removes all other characters)
    // this makes the string safe especially when used as a part of a URL
    // this keeps latin characters and Persian characters as well
    $string = preg_replace("/[^a-z0-9_\s-]/u", '', $string);

    // Remove multiple dashes or whitespaces or underscores
    // preg_replace('/[?\s+]/u', $separator, trim($string));
    preg_replace("/[^a-z0-9_\s-ءاآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوهی]/u", '', $string);

    // Convert whitespaces and underscore to the given separator
    $string = preg_replace("/[\s_]/", $separator, $string);

    return $string;
}
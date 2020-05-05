<?php

if (!function_exists('xmlToArray')) {
    /**
     * this is helper function , convert xml to Array
     *
     * */
    function xmlToArray($xml_string)
    {
        $xml = simplexml_load_string($xml_string);
        $json = json_encode($xml);
        return json_decode($json, true);
    }
}
//-----------------------------------------------------------------------------

if (!function_exists('clean')) {
    /**
     * this is helper function , cleaning special char
     *
     * */
    function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
}
//-----------------------------------------------------------------------------

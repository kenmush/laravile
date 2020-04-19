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

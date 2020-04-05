<?php
$APP_URL = null;
$handle = fopen("../../.env", "r") or die("Unable to open file!");

if ($handle) {
    while (($line = fgets($handle)) !== false) {

        if (preg_match('/APP_URL/', $line)) {
            $env = explode("=", $line);
            $APP_URL = $env[1];
            break;
        }
    }

    fclose($handle);
}

$redirectUrl = trim($APP_URL).'/admin/dashboard';
header('Location:'.$redirectUrl);

<?php
use Carbon\Carbon;
if (!function_exists("encrypt")) {

    function encrypt($string)
    {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        $secret_key = 'dn5AatKT';
        $secret_iv = 'ogsZpPAUZC';

        $key = hash('sha256', $secret_key);

        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        return base64_encode($output);
    }
}

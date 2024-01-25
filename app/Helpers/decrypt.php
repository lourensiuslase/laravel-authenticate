<?php
use Carbon\Carbon;
if (!function_exists("decrypt")) {

    function decrypt($string)
    {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        $secret_key = 'dn5AatKT';
        $secret_iv = 'ogsZpPAUZC';

        $key = hash('sha256', $secret_key);

        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        return openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);


    }
}

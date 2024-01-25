<?php
use Carbon\Carbon;
if (!function_exists("rupiah")) {

    function rupiah($angka)
    {
        return "Rp".number_format($angka, 0, ",", ".");
    }
}

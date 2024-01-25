<?php
use Carbon\Carbon;
if (!function_exists("addCommas")) {

    function addCommas($angka)
    {
        return number_format($angka, 0, ",", ".");
    }
}

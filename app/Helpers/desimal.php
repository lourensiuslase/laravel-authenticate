<?php
use Carbon\Carbon;
if (!function_exists("desimal")) {

    function desimal($angka,$jumlahKoma=null)
    {
        $jumlahKoma = ($jumlahKoma == null) ? 1 : $jumlahKoma;
        return number_format((float)$angka, $jumlahKoma, '.', '');
    }
}

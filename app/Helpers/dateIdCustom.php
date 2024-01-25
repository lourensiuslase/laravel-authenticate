<?php
use Carbon\Carbon;
if (!function_exists("dateIdCustom")) {

    function dateIdCustom($date,$format)
    {
        setlocale(LC_ALL, 'IND');
        return Carbon::create(new Carbon($date))->isoFormat($format);
    }
}

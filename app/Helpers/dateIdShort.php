<?php
use Carbon\Carbon;
if (!function_exists("dateIdShort")) {

    function dateIdShort($date)
    {
        setlocale(LC_ALL, 'IND');
        return Carbon::create(new Carbon($date))->isoFormat('D MMM Y');
    }
}

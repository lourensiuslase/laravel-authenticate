<?php
use Carbon\Carbon;
if (!function_exists("dateIdLong")) {

    function dateIdLong($date)
    {
        setlocale(LC_ALL, 'IND');
        return Carbon::create(new Carbon($date))->isoFormat('D MMMM Y');
    }
}

<?php
use Carbon\Carbon;
if (!function_exists("ifnull")) {

    function ifnull($data)
    {
        return ($data == null) ? "-" : $data;
    }
}

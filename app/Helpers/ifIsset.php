<?php
use Carbon\Carbon;
if (!function_exists("ifIsset")) {

    function ifIsset($data)
    {

        $dataVar = "";
        if (isset($data)) {
            $dataVar = $data;
        }

        return $dataVar;
    }
}

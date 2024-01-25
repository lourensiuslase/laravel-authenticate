<?php
use Carbon\Carbon;
if (!function_exists("space")) {
    function space($level)
    {
        $nbsp = "";
        switch ($level){
            case 1:
                $nbsp = "-";
                break;
            case 2:
                $nbsp = "--";
                break;
            case 3:
                $nbsp = "---";
                break;
            case 4:
                $nbsp = "----";
                break;
            case 5:
                $nbsp = "-----";
                break;
            case 6:
                $nbsp = "------";
                break;
            case 7:
                $nbsp = "-------";
                break;
            case 8:
                $nbsp = "--------";
                break;
            case 9:
                $nbsp = "---------";
                break;
            case 10:
                $nbsp = "----------";
                break;
        }

        return $nbsp;
    }
}

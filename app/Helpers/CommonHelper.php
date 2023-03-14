<?php

namespace App\Helpers;

class CommonHelper{

    public static function getFileStatusLabel($param)
    {
        $array[1] ="<span class='label label-success'>Un Blocked</span>";
        $array[2] ="<span class='label label-danger'>Blocked</span>";
        $array[3] ="<span class='label label-warning'>Requested To Block</span>";
        $array[4] ="<span class='label label-warning'>Requested To UnBlock</span>";
        echo $array[$param];
    }
}
?>
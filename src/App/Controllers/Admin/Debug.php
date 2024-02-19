<?php

namespace App\Controllers\Admin;

class Debug

{
    public function showXdebug()
    {

        return xdebug_info();
    }

    public function showPhp(){

        return phpinfo();

    }

}
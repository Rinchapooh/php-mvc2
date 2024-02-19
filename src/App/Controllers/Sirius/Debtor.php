<?php

namespace App\Controllers\Sirius;

use Framework\Viewer;

class Debtor
{

    public function __construct(private Viewer $viewer)
    {

    }

    public function index()
    {

       echo $this->viewer->render("Sirius/debtor.php");

    }


}
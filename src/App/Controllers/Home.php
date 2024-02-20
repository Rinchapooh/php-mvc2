<?php

namespace App\Controllers;
use Framework\Viewer;

class Home
{

    public function __construct(private Viewer $viewer)
    {

    }
    public function index()
    {

        echo $this->viewer->render("shared/header.php");
        echo $this->viewer->render('Home/index.php');


    }

}
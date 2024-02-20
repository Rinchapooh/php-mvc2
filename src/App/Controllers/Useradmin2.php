<?php
namespace App\controllers;


use Framework\Viewer;

class Useradmin2
{

    public function __construct(private Viewer $viewer)
    {

    }
    public function showList()
    {
        echo $this->viewer->render("shared/header.php");
        $this->viewer->render('About/about_index.php');
    }
}
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
        $this->viewer->render('About/about_index.php');
    }
}
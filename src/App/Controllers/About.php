<?php

namespace App\Controllers;

class About
{

    public function index()
    {

        require 'views/about/about_index.php';

    }

    public function contacts()
    {
        require 'views/about/about_contacts.php';

    }

}
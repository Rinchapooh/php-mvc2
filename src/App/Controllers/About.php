<?php

namespace App\Controllers;

class About
{

    public function index()
    {

        require 'views/about/about_index.php';

    }

    public function getContacts()
    {
        require 'views/about/about_contacts.php';

    }

}
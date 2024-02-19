<?php

namespace App\Controllers;

use App\Models\Product;
use Framework\Viewer;
use function Sodium\crypto_sign_detached;

class About
{
    public function __construct(private Viewer $viewer)
    {

    }

    public function index(): void
    {

        echo $this->viewer->render('About/about_index.php');

    }

    public function contacts(): void
    {


        echo $this->viewer->render('About/about_contacts.php');


    }

}
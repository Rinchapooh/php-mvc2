<?php


namespace App\Controllers;
use App\Models\Product;
use Framework\Viewer;


class Products
{
    private Viewer $viewer;
    private Product $model;
    public function __construct(Viewer $viewer, Product $model){

        $this->viewer = $viewer;
        $this->model = $model;

    }
    public function index()
    {

        $products = $this->model->getData();

        echo $this->viewer->render("Products/index.php", ["products" => $products]);

    }


    public function showid(string $id)
    {

        echo $this->viewer->render("Products/show.php", ["id" => $id]);


    }

}
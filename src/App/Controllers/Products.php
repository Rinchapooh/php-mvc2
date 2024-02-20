<?php


namespace App\Controllers;
use App\Models\Product;
use Framework\Exceptions\PageNotFoundException;
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

        $products = $this->model->findAll();

        echo $this->viewer->render("shared/header.php");
        echo $this->viewer->render("Products/index.php", ["products" => $products]);

    }


    public function showid(string $id)
    {

        $product = $this->model->find($id);

        if ($product === false) {

            throw new PageNotFoundException("Product not found");
        }

        echo $this->viewer->render("shared/header.php");
        echo $this->viewer->render("Products/showid.php", ["product" => $product]);


    }

    public function new()
    {

        echo $this->viewer->render("shared/header.php");
        echo $this->viewer->render("Products/new.php");

    }

    public function create()
    {

        $data = [

            "name" => $_POST["name"],
            "description" =>  empty($_POST["description"]) ? null : $_POST["description"]

        ];

        var_dump($this->model->insert($data));

    }

}
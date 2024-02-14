<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


spl_autoload_register(
    function (string $class_name){

        $class_path = str_replace("\\", "/", $class_name) . '.php';
        require $class_path;

    });

$router = new Framework\Router;

$router->add('/home/index', ["controller" => "home", "action"=> "index"]);
$router->add('/products', ["controller" => "products", "action"=> "index"]);
$router->add('/', ["controller" => "home", "action"=> "index"]);
$router->add('/about', ["controller" => "about", "action"=> "index"]);
$router->add('/about/contacts', ["controller" => "about", "action"=> "getContacts"]);



$params = $router->match($path);

if (!$params){
    exit("No route matched");
}

$action = $params["action"];
$controller = "App\Controllers\\" . ucwords($params["controller"]);

$controller_object = new $controller;
$controller_object->$action();




//if ($controller === 'products'){
//
//    require 'Controllers/Products.php';
//    $controller_object = new products();
//
//}elseif ($controller === 'home'){
//
//    require 'Controllers/Home.php';
//    $controller_object = new home;
//}
//
//if ($action === 'index') {
//    $controller_object->index();
//}elseif ( $action === 'show'){
//    $controller_object->show();
//}



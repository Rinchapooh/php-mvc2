<?php

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


spl_autoload_register(
    function (string $class_name){

        $class_path = str_replace("\\", "/", $class_name) . '.php';
        echo '';
        require $class_path;

    });

$router = new Framework\Router;

$router->add('/product/{slug:[\w-]+}',  ["controller" => "products", "action"=> "show"] );
$router->add('/{controller}/{id:\d+}/{action}');
$router->add('/home/index', ["controller" => "home", "action"=> "index"]);
$router->add('/products', ["controller" => "products", "action"=> "index"]);
$router->add('/', ["controller" => "home", "action"=> "index"]);
$router->add('/about', ["controller" => "about", "action"=> "index"]);
$router->add('/about/contacts', ["controller" => "about", "action"=> "contacts"]);
$router->add('/{controller}/{action}');




$dispatcher = new Framework\Dispatcher($router);

$dispatcher->handle($url);
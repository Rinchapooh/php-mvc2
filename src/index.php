<?php


use Framework\Dispatcher, Framework\Router;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


spl_autoload_register(
    function (string $class_name){

        $class_path = str_replace("\\", "/", $class_name) . '.php';
        require $class_path;

    });

$router = new Router;



$router->add("/sirius/{controller}/{action}", ["namespace" => "Sirius"]);

$router->add("/admin/{controller}/{action}", ["namespace" => "Admin"]);
$router->add("/{title}/{id:\d+}/{page:\d+}", ["controller"=>"products", "action"=>"showPage"]);
$router->add('/product/{slug:[\w-]+}',  ["controller" => "products", "action"=> "show"] );
$router->add('/{controller}/{id:\d+}/{action}');
$router->add('/home/index', ["controller" => "home", "action"=> "index"]);
$router->add('/products', ["controller" => "products", "action"=> "index"]);
$router->add('/', ["controller" => "home", "action"=> "index"]);
$router->add('/About', ["controller" => "About", "action"=> "index"]);
$router->add('/About/contacts', ["controller" => "About", "action"=> "contacts"]);
$router->add('/{controller}/{action}');

$container = new Framework\Container();

$container->set(App\Database::class, function (){

  return new App\Database('db', 'product_db', 'root', 'password');

});



$dispatcher = new Dispatcher($router, $container);
$dispatcher->handle($url);
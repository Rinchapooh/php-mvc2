<?php

declare(strict_types=1);

set_error_handler(function ( int $errno, string $errstr, string $errfile, int $errline): bool {

    throw new ErrorException($errstr,0, $errno, $errfile, $errline);
});


set_exception_handler(function (Throwable $exception) {

    if ($exception instanceof Framework\Exceptions\PageNotFoundException) {

        http_response_code(404);
    } else {

        http_response_code(500);
    }


    $show_errors = true;
    if ($show_errors) {

        ini_set('cgi.discard_path', "1");
    }else{

        ini_set('display_errors', "0");
        ini_set("log_errors", "1");



        require "views/500.php";

    }

    throw $exception;

});








use Framework\Dispatcher, Framework\Router;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($url === false){

    throw new UnexpectedValueException("Malformed URL: '{$_SERVER['REQUEST_URI']}' ");
}

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
$container->set("TEST-KEY", function (){
    echo 'test_val';
});


$dispatcher = new Dispatcher($router, $container);
$dispatcher->handle($url);
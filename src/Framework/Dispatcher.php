<?php

namespace Framework;
use ReflectionMethod;

class Dispatcher
{

    private Router $router;
    public function __construct(Router $router)
    {

        $this->router = $router;

    }

    public function handle(string $path)
    {

        $params = $this->router->match($path);

        if (!$params){
            exit("No route matched");
        }

        //Extracting controller's path and action's names;
        $action = $this->getActionName($params);
        $controller = $this->getControllerName($params);


        //Creating controller and executing action;
        $controller_object = new $controller;

        $args = $this->getActionArguments($controller, $action, $params);

        $controller_object->$action(...$args);



    }

    private function getActionArguments(string $controller, string $action, array $params): array
    {
        $args = [];

        $method = new ReflectionMethod($controller, $action);

        foreach ($method->getParameters() as $parameter){

            $name = $parameter->getName();
            //echo $name, " = " , $params[$name], " ";
            $args[$name] = $params[$name];

        }

        return $args;

    }


    private function getControllerName(array $params): string
    {
        $controller = $params["controller"];
        $controller = str_replace("-", "", ucwords(strtolower($controller), "-"));

        $namespace = "App\Controllers";

        if (array_key_exists("namespace", $params)){

            $namespace .= "\\" . $params["namespace"];
        }

        return $namespace . "\\". $controller;

    }

    private function getActionName(array $params): string
    {
        $action = $params["action"];

        $action = lcfirst(str_replace("-", "", ucwords(strtolower($action), "-")));

        return $action;

    }

}
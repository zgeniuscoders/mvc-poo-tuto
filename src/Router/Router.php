<?php

namespace Zgeniuscoders\Mvc\Router;

use Exception;

class Router
{

    private array $routes = [];

    public function get(string $url, array $handler)
    {
        $this->routes[$url] = $handler;
    }


    public function run(string $url)
    {
        if (isset($this->routes[$url])) {
            $classe = $this->routes[$url][0];
            $method = $this->routes[$url][1];


            if (!class_exists($classe)) {
                throw new \Exception("La classe $classe n'existe");
                return;
            } else {
                if (!method_exists($classe, $method)) {
                    throw new \Exception("La methode $method n'existe pas dans la classe $classe");
                    return;
                } else {
                    $controler = new $classe();
                    call_user_func_array([$controler,$method],[]);
                    return;
                }
            }
        }

        throw new \Exception("404");
        return;

    }
}

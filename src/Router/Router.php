<?php

namespace Zgeniuscoders\Mvc\Router;

use Exception;

class Router
{

    private array $routes = [];

    public function get(string $url, array $handler): Route
    {
        $route = new Route($url, $handler);
        $this->routes["GET"][] = $route;

        return $route;
    }

    public function post(string $url, array $handler): Route
    {
        $route = new Route($url, $handler);
        $this->routes["POST"][] = $route;
        return $route;
    }


    public function run(string $url)
    {

        if (!isset($this->routes[$_SERVER["REQUEST_METHOD"]])) {
            throw new RouterException("la methode appeler n'existe pas");
        }

        foreach ($this->routes[$_SERVER["REQUEST_METHOD"]] as $route) {
            if ($route->match($url)) {
                return $route->resolve();
            }
        }
        throw new RouterException("404");

        return;
    }
}

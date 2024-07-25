<?php


namespace Zgeniuscoders\Mvc\Router;


class Route
{

    private $matches;

    public function __construct(private string $url, private $handler)
    {
        $this->url = trim($this->url, '/');
    }

    public function with()
    {
    }


    public function match(string $url)
    {
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->url);

        $regex = "#^$path$#i";

        if (!preg_match($regex, $url, $matches)) {
            return false;
        }

        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    public function resolve()
    {
        $classe = $this->handler[0];
        $method = $this->handler[1];

        if (!class_exists($classe)) {
            throw new RouteException("La classe $classe n'existe");
            return;
        } else {
            if (!method_exists($classe, $method)) {
                throw new RouteException("La methode $method n'existe pas dans la classe $classe");
                return;
            } else {
                $controler = new $classe();
                call_user_func_array([$controler, $method], $this->matches);
                return;
            }
        }
    }
}

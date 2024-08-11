<?php


namespace Zgeniuscoders\Mvc\Router;


class Route
{

    private $matches;
    private $params = [];

    public function __construct(private string $url, private $handler)
    {
        $this->url = trim($this->url, '/');
    }

    public function with(string $key, string $regex)
    {
        $this->params[$key] = str_replace('(', '(?:,', $regex);
        return $this;
    }


    public function match(string $url)
    {
        $url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->url);

        $regex = "#^$path$#i";

        if (!preg_match($regex, $url, $matches)) {
            return false;
        }

        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    private function paramMatch($match)
    {
        if (isset($this->params[$match[1]])) {
            return '(' . $this->params[$match[1]] . ')';
        }
        return '([^/])';
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

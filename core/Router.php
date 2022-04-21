<?php

namespace app\core;

class Router
{
    protected array $routes = [];
    public Request $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();

        $method = $this->request->getMethod();

        @$callback = $this->routes[$method][$path];


        if ($callback == false) {
            echo "404";
            exit();
        }

        echo call_user_func($callback);
    }
}

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

    public function renderView($view)
    {
        $layoutContent = $this->layoutContent("main");
        include_once Application::$ROOT_DIR . "/views/$view.php";
    }

    protected function layoutContent($layout)
    {
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            return "Not found";
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }
}
<?php


class Router
{
    protected $routes = [];

    public function addRoute($method, $path, $controller, $action)
    {
        $this->routes[] = ['method' => $method, 'path' => $path, 'controller' => $controller, 'action' => $action];
    }

    public function getRoutes()
    {
        $request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $request_method = $_SERVER['REQUEST_METHOD'];
        $base_dir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
        $request_uri = '/' . ltrim(str_replace($base_dir, '', $request_uri), '/');

        foreach ($this->routes as $route) {
            $route_pattern = '#^' . $route['path'] . '$#';

            if (preg_match($route_pattern, $request_uri, $matches) && $request_method === $route['method']) {
                $controller_name = $route['controller'];
                $action = $route['action'];

                require_once BASE_PATH . '/app/controllers/' . $controller_name . '.php';
                $controller = new $controller_name();

                array_shift($matches);
                call_user_func_array([$controller, $action], $matches);
                return;
            }
        }
        http_response_code(404);
        echo "<h1>404 Not Found</h1><p>Página não encontrada.</p>";
    }
}
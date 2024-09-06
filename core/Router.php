<?php

class Router
{
    private static $routes = [];

    public static function run($method, $uri, $action, $middleware = [])
    {
        $pattern = self::convertUriToPattern($uri);
    
        self::$routes[] = [
            'method' => $method,
            'pattern' => $pattern,
            'action' => $action,
            'middleware' => $middleware
        ];
    }
    
    public static function requestCheck($method, $uri)
    {
        foreach (self::$routes as $route) {
            if ($method === $route['method'] && preg_match($route['pattern'], $uri, $matches)) {

                foreach ($route['middleware'] as $middleware) {
                    Middleware::handle($middleware);
                }

                list($controller, $method) = explode('@', $route['action']);
                $controller = "App\\Controllers\\$controller";
                $controllerInstance = new $controller();
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                call_user_func_array([$controllerInstance, $method], $params);
                return;
            }
        }
        echo "Geçersiz ID";
    }

    protected static function convertUriToPattern($uri)
    {
        $pattern = preg_replace('/\{(\w+):(\d+)\}/', '(?P<$1>\d+)', $uri);
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>\d+)', $pattern);
        $pattern = preg_replace('/\{(\w+)\?\}/', '(?P<$1>\d*)', $pattern);

        return "#^{$pattern}$#";
    }
}

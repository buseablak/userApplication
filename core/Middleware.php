<?php

require_once __DIR__ . '/../app/Middlewares/UserMiddleware.php';
require_once __DIR__ . '/../app/Middlewares/BlogMiddleware.php';


class Middleware
{
    public static function handle($middleware)
    {
        $middlewareClass = "App\\Middleware\\$middleware";
        if (class_exists($middlewareClass)) {
            $instance = new $middlewareClass();
            $instance->handle();
        } else {
            echo "Middleware Sınıfı Bulunamadı: $middleware\n";
        }
    }
}

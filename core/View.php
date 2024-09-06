<?php

class View
{
    public static function render($view, $data = [])
    {
        $viewPath = __DIR__ . '/../views/' . $view . '.php';

        if (file_exists($viewPath)) {
            extract($data); 
            require $viewPath;
        } else {
            echo "Dosya Bulunamadı: $viewPath";
        }
    }
}

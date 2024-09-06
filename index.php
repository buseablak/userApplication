<?php

require_once __DIR__ . '/core/Router.php';
require_once __DIR__ . '/core/Middleware.php';
require_once __DIR__ . '/app/Controllers/UserController.php';
require_once __DIR__ . '/app/Controllers/BlogController.php';

require_once __DIR__ . '/core/View.php';

Router::run('GET', '/user/{id?}', 'UserController@show', ['UserMiddleware']);
Router::run('GET', '/user/{id:\d+}', 'UserController@show', ['UserMiddleware']);

Router::run('GET', '/blog/{blogId?}/translations/{translationId?}', 'BlogController@translations', ['BlogMiddleware']);
Router::run('GET', '/blog/{blogId:\d+}/translations/{translationId:\d+}', 'BlogController@translations', ['BlogMiddleware']);

Router::requestCheck($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

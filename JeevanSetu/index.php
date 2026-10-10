<?php
session_start();
require __DIR__.'/app/Core/Database.php'; require __DIR__.'/app/Core/Controller.php'; require __DIR__.'/app/Core/Router.php';
$router=new Router(); require __DIR__.'/routes/web.php'; $router->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));

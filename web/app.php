<?php
include __DIR__ . "/../vendor/autoload.php";
$router = new \Klein\Klein();

function registerService($name, $callback)
{
    global $router;
    $router->app()->register($name, $callback);
}

include __DIR__ . "/../app/services.php";
include __DIR__ . "/../app/routes.php";
$router->dispatch();
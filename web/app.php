<?php
include __DIR__ . "/../vendor/autoload.php";
$router = new \Klein\Klein();
include __DIR__ . "/../app/routes.php";
$router->dispatch();
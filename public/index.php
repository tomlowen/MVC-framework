<?php

require_once __DIR__ . "./../vendor/autoload.php";

use app\core\SiteController;
use app\core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get("/", "home");
$app->router->get("/contact", [SiteController::class, 'contact']);
$app->router->post("/contact", [SiteController::class, 'handleContact']);

$app->run();
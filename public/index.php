<?php

use Zgeniuscoders\Mvc\Router\Router;
use App\Controllers\HomeController;
use App\Controllers\PostController;

require "../vendor/autoload.php";


define("VIEW_PATH", dirname(__DIR__) . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR);

$router = new Router();
$router->get('/', [HomeController::class, 'index']);
$router->get('/posts', [PostController::class, 'index']);

try {
    $router->run($_SERVER["REQUEST_URI"]);
} catch (Exception $e) {
    die($e->getMessage());
}

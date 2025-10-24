<?php

//Import de l'autoloader
include __DIR__ . "/../vendor/autoload.php";

//Chargement des variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();

//Démarrage de la session
session_start();

/** Import des classes */

use App\Controller\HomeController;
use App\Controller\ErrorController;
use App\Controller\SecurityController;
use App\Controller\Api\ApiController;

$errorController = new ErrorController();

/** Bloc Router */

use Mithridatem\Routing\Route;
use Mithridatem\Routing\Router;
use Mithridatem\Routing\Exception\RouterException;
use Mithridatem\Routing\Auth\ArrayGrantChecker;

//instance du router
$router = new Router();
$router->setGrantChecker(new ArrayGrantChecker($_SESSION["grants"] ?? ["ROLE_PUBLIC"]));

/** Ajouter les routes */
$router->map(Route::controller('GET', '/', HomeController::class, 'index'));
$router->map(Route::controller('GET', '/error', ErrorController::class, 'error403'));
$router->map(Route::controller('GET', '/login', SecurityController::class, 'login'));
$router->map(Route::controller('POST', '/login', SecurityController::class, 'login'));
$router->map(Route::controller('GET', '/logout', SecurityController::class, 'logout'));
$router->map(Route::controller('GET', '/register', SecurityController::class, 'register'));
$router->map(Route::controller('POST', '/register', SecurityController::class, 'register'));
$router->map(Route::controller('GET', '/test', HomeController::class, 'test',["ROLE_USER"]));
$router->map(Route::controller('GET', '/cgu', HomeController::class, 'showCgu'));
$router->map(Route::controller('GET', '/api', ApiController::class, 'index'));
$router->map(Route::controller('POST', '/api', ApiController::class, 'post'));
$router->map(Route::controller('PUT', '/api', ApiController::class, 'put'));


try {
    $router->dispatch();
} catch (RouterException $e) {
    if ( $e->getCode() == 404) {
        $errorController->error404();
    }
    if ($e->getCode() == 403) {
        $errorController->error403();
    }
}

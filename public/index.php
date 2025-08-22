<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/app/Core/Router.php';
require_once BASE_PATH . '/app/Controller/JobController.php';
require_once BASE_PATH . '/app/Controller/HomeController.php';

$router = new Router();

//Rotas função Rhyan
$router->addRoute('GET', '/', 'HomeController', 'show_index');
$router->addRoute('GET', '/job-application', 'JobController', 'show_job');
$router->addRoute('POST', '/submit-application', 'JobController', 'store_application');
$router->addRoute('GET', '/applications', 'JobController', 'show_applications');
$router->addRoute('GET', '/view-bio/{id}', 'JobController', 'show_bio');
$router->addRoute('GET', '/application/edit/{id}', 'JobController', 'show_update_form');
$router->addRoute('POST', '/application/update/{id}', 'JobController', 'process_update');
$router->addRoute('GET', '/delete-application/{id}', 'JobController', 'delete_application');

// Inserir outras funções aqui
// $router->addRoute('GET', '/function2', 'JobController', 'show_function2');

$router->getRoutes();
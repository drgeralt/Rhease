<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();


require_once __DIR__ . '/../config.php';
require_once BASE_PATH . '/app/models/Database.php';
require_once BASE_PATH . '/Router.php';


$router = new Router();


require_once 'routes.php';


$router->getRoutes();
<?php

session_start();

require_once __DIR__ . '/../config.php';
require_once BASE_PATH . '/app/models/Database.php';
require_once BASE_PATH . '/Router.php';

$router = new Router();

require_once 'routes.php';

$router->getRoutes();
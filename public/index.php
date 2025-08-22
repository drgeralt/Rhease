<?php

define('BASE_PATH', dirname(__DIR__));

// Carrega o roteador
require_once BASE_PATH . '/app/Core/Router.php';

// Carrega os controladores
require_once BASE_PATH . '/app/Controller/HomeController.php';
require_once BASE_PATH . '/app/Controller/JobController.php';
require_once BASE_PATH . '/app/Controller/PayrollController.php';
require_once BASE_PATH . '/app/Controller/CommonController.php'; // New

// Instancia o roteador
$router = new Router();

// ----------------------
// Registro de rotas
// ----------------------

// Rotas da Home
$router->addRoute('GET', '/', HomeController::class, 'show_index');

// Rotas de Job
$router->addRoute('GET', '/job-application', 'JobController', 'show_job');
$router->addRoute('POST', '/submit-application', 'JobController', 'store_application');
$router->addRoute('GET', '/applications', 'JobController', 'show_applications');
$router->addRoute('GET', '/view-bio/{id}', 'JobController', 'show_bio');
$router->addRoute('GET', '/application/edit/{id}', 'JobController', 'show_update_form');
$router->addRoute('POST', '/application/update/{id}', 'JobController', 'process_update');
$router->addRoute('GET', '/delete-application/{id}', 'JobController', 'delete_application');

// Rotas de Payroll (Folha de Pagamento)
$router->addRoute('GET', '/payroll/add', PayrollController::class, 'show_payroll_form');
$router->addRoute('POST', '/payroll', PayrollController::class, 'store_payroll');
$router->addRoute('GET', '/payrolls', PayrollController::class, 'show_payrolls');
$router->addRoute('POST', '/payroll/remove', PayrollController::class, 'remove_payroll');

// Rotas Comuns
$router->addRoute('GET', '/thank_you', CommonController::class, 'show_thank_you');
$router->addRoute('GET', '/error', CommonController::class, 'show_error');


// ----------------------
// Inicia o roteamento
// ----------------------
$router->getRoutes();

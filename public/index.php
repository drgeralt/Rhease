<?php

define('BASE_PATH', dirname(__DIR__));
define('BASE_URL', '/Rhease/public'); // Defina a URL base do seu projeto aqui

// Carrega o roteador
require_once BASE_PATH . '/app/Core/Router.php';
require_once BASE_PATH . '/app/Core/Database.php';

// Carrega os controladores e o modelo de comunicacao interna
require_once BASE_PATH . '/app/Controller/HomeController.php';
require_once BASE_PATH . '/app/Controller/JobController.php';
require_once BASE_PATH . '/app/Controller/PayrollController.php';
require_once BASE_PATH . '/app/Controller/CommonController.php';
require_once BASE_PATH . '/app/Controller/InternalCommunicationController.php';
require_once BASE_PATH . '/app/Models/InternalCommunicationModel.php';

// Instancia o roteador
$router = new Router();

// ----------------------
// Registro de rotas
// ----------------------
$router->addRoute('GET', '/', 'HomeController', 'show_index');
$router->addRoute('GET', '/job-application', 'JobController', 'show_job');
$router->addRoute('POST', '/submit-application', 'JobController', 'store_application');
$router->addRoute('GET', '/applications', 'JobController', 'show_applications');
$router->addRoute('GET', '/view-bio/{id}', 'JobController', 'show_bio');
$router->addRoute('GET', '/application/edit/{id}', 'JobController', 'show_update_form');
$router->addRoute('POST', '/application/update/{id}', 'JobController', 'process_update');
$router->addRoute('GET', '/delete-application/{id}', 'JobController', 'delete_application');
$router->addRoute('GET', '/payroll/add', 'PayrollController', 'show_payroll_form');
$router->addRoute('POST', '/payroll', 'PayrollController', 'store_payroll');
$router->addRoute('GET', '/payrolls', 'PayrollController', 'show_payrolls');
$router->addRoute('POST', '/payroll/remove', 'PayrollController', 'remove_payroll');
$router->addRoute('GET', '/thank_you', 'CommonController', 'show_thank_you');
$router->addRoute('GET', '/error', 'CommonController', 'show_error');
$router->addRoute('GET', '/comunicacao', 'InternalCommunicationController', 'index');
$router->addRoute('POST', '/comunicacao/enviar', 'InternalCommunicationController', 'sendMessage');


// ----------------------
// Inicia o roteamento
// ----------------------
$router->getRoutes();
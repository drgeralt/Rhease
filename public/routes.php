<?php

$router->addRoute('GET', '/', 'BeneficioController', 'index');
$router->addRoute('GET', '/demissao', 'DemissaoController', 'showIniciarForm');
$router->addRoute('POST', '/demissao', 'DemissaoController', 'processar');
$router->addRoute('GET', '/beneficios', 'BeneficioController', 'index');
$router->addRoute('GET', '/beneficios/criar', 'BeneficioController', 'create');
$router->addRoute('POST', '/beneficios', 'BeneficioController', 'store');
$router->addRoute('GET', '/beneficios/editar/(\d+)', 'BeneficioController', 'edit');
$router->addRoute('POST', '/beneficios/editar/(\d+)', 'BeneficioController', 'update');
$router->addRoute('POST', '/beneficios/deletar/(\d+)', 'BeneficioController', 'destroy');
$router->addRoute('GET', '/funcionarios/demitidos', 'FuncionarioController', 'listarDemitidos');
$router->addRoute('GET', '/demissao/resumo/(\d+)', 'DemissaoController', 'verResumo');
<?php

require_once BASE_PATH . '/app/models/FuncionarioModel.php';

class FuncionarioController
{
    public function listarDemitidos()
    {
        $model = new FuncionarioModel();
        $data['funcionarios_demitidos'] = $model->getAllInativos();
        
        require_once BASE_PATH . '/app/views/funcionarios/demitidos.php';
    }
}
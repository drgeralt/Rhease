<?php
class DemissaoModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function processarDemissao($funcionarioId, $dataDemissao, $tipoDemissao, $motivo, $possuiFeriasVencidas = false)
    {
        require_once 'FuncionarioModel.php';
        $funcionarioModel = new FuncionarioModel();
        $funcionario = $funcionarioModel->getById($funcionarioId);
        if (!$funcionario) {
            return false;
        }

        $salario = $funcionario['salario'];
        $dataAdmissao = new DateTime($funcionario['data_admissao']);
        $dataDemissaoObj = new DateTime($dataDemissao);
        $diasTrabalhadosMes = $dataDemissaoObj->format('d');
        $saldoSalario = ($salario / 30) * $diasTrabalhadosMes;
        $avisoPrevio = ($tipoDemissao === 'sem_justa_causa') ? $salario : 0;
        $mesesTrabalhadosAno = $dataDemissaoObj->format('m');
        $decimoTerceiro = ($salario / 12) * $mesesTrabalhadosAno;
        $intervalo = $dataAdmissao->diff($dataDemissaoObj);
        $mesesTrabalhadosTotal = $intervalo->y * 12 + $intervalo->m;
        $mesesProporcionaisFerias = $mesesTrabalhadosTotal % 12;
        $feriasProporcionais = ($salario / 12) * $mesesProporcionaisFerias;
        $tercoFerias = $feriasProporcionais / 3;
        $valorFeriasVencidas = 0;
        if ($possuiFeriasVencidas) {
            $valorFeriasVencidas = $salario + ($salario / 3);
        }
        $totalRescisao = $saldoSalario + $avisoPrevio + $decimoTerceiro + $feriasProporcionais + $tercoFerias + $valorFeriasVencidas;
        $calculos = [
            'funcionario_id' => $funcionarioId, 'data_demissao' => $dataDemissao, 'tipo_demissao' => $tipoDemissao, 'motivo' => $motivo,
            'saldo_salario' => $saldoSalario, 'aviso_previo' => $avisoPrevio, 'ferias_vencidas' => $valorFeriasVencidas,
            'ferias_proporcionais' => $feriasProporcionais, 'terco_ferias' => $tercoFerias, 'decimo_terceiro_proporcional' => $decimoTerceiro,
            'valor_total_rescisao' => $totalRescisao
        ];
        try {
            $this->conn->beginTransaction();
            $sql = "INSERT INTO demissoes (funcionario_id, data_demissao, tipo_demissao, motivo, saldo_salario, aviso_previo, ferias_vencidas, ferias_proporcionais, terco_ferias, decimo_terceiro_proporcional, valor_total_rescisao) VALUES (:funcionario_id, :data_demissao, :tipo_demissao, :motivo, :saldo_salario, :aviso_previo, :ferias_vencidas, :ferias_proporcionais, :terco_ferias, :decimo_terceiro_proporcional, :valor_total_rescisao)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($calculos);
            $funcionarioModel->updateStatus($funcionarioId, 'inativo');
            $this->conn->commit();
        
        return array_merge($calculos, [
            'nome_completo' => $funcionario['nome_completo'],
            'cargo' => $funcionario['cargo'],
            'data_admissao' => $funcionario['data_admissao']
        ]);

        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

    public function getResumoPorFuncionarioId($funcionarioId)
    {
        $sql = "SELECT d.*, f.nome_completo, f.cargo, f.data_admissao 
                FROM demissoes d
                JOIN funcionarios f ON d.funcionario_id = f.id
                WHERE d.funcionario_id = :id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $funcionarioId]);
        return $stmt->fetch();
    }
}
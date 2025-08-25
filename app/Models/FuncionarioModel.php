<?php
class FuncionarioModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM funcionarios WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getAllAtivos()
    {
        $stmt = $this->conn->prepare("SELECT id, nome_completo, cargo FROM funcionarios WHERE status = 'ativo' ORDER BY nome_completo ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateStatus($id, $status)
    {
        $stmt = $this->conn->prepare("UPDATE funcionarios SET status = :status WHERE id = :id");
        return $stmt->execute(['status' => $status, 'id' => $id]);
    }

    public function getAllInativos()
    {
        $stmt = $this->conn->prepare("SELECT id, nome_completo, cargo, data_admissao FROM funcionarios WHERE status = 'inativo' ORDER BY nome_completo ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
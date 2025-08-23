<?php
class BeneficioModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function listarTodosBeneficios()
    {
        $stmt = $this->conn->prepare("SELECT * FROM beneficios ORDER BY nome_beneficio");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM beneficios WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($dados)
    {
        $sql = "INSERT INTO beneficios (nome_beneficio, descricao, valor_mensal, tipo) VALUES (:nome, :descricao, :valor, :tipo)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'nome' => $dados['nome_beneficio'],
            'descricao' => $dados['descricao'],
            'valor' => $dados['valor_mensal'],
            'tipo' => $dados['tipo']
        ]);
    }

    public function update($id, $dados)
    {
        $sql = "UPDATE beneficios SET nome_beneficio = :nome, descricao = :descricao, valor_mensal = :valor, tipo = :tipo WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'nome' => $dados['nome_beneficio'],
            'descricao' => $dados['descricao'],
            'valor' => $dados['valor_mensal'],
            'tipo' => $dados['tipo']
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM beneficios WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
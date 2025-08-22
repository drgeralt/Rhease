<?php

class ApplicationModel{
    private $db_connection;

    public function __construct(){
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'rhease';

        try{
            $this->db_connection = new PDO("mysql:host=$host;dbname=$database", $user, $password);
            $this->db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die("Erro ao conectar ao banco de dados: " . $e->getMessage());
        }
    }

    public function saveApplication($data) {
        $sql = "INSERT INTO applications (name, email, phone, years_experience, expected_salary, bio) 
                VALUES (:name, :email, :phone, :years_experience, :expected_salary, :bio)";

        try{
            $stmt = $this->db_connection->prepare($sql);

            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':phone', $data['phone']);
            $stmt->bindParam(':years_experience', $data['years_experience']);
            $stmt->bindParam(':expected_salary', $data['expected_salary']);
            $stmt->bindParam(':bio', $data['bio']);

            return $stmt->execute();
        } catch(PDOException $e){
            
            error_log("Erro ao salvar a candidatura: " . $e->getMessage());
            return false;
        }
    }

    public function getApplications(): array
    {
        $sql = "SELECT * FROM applications ORDER BY submitted_at ASC";

        try{
            $stmt = $this->db_connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            error_log("Erro ao buscar as candidaturas: " . $e->getMessage());
            return [];
        }
    }

    public function getApplicationById($id){
        $sql = "SELECT * FROM applications WHERE id = :id";

        try{
            $stmt = $this->db_connection->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            error_log("Erro ao buscar candidato: " . $e->getMessage());
            return [];
        }
    }

    public function updateApplicationById($id, $data) {
        $sql = "UPDATE applications SET name = :name, email = :email, phone = :phone, years_experience = :years_experience, expected_salary = :expected_salary, bio = :bio WHERE id = :id";

        try {
            $stmt = $this->db_connection->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':phone', $data['phone']);
            $stmt->bindParam(':years_experience', $data['years_experience']);
            $stmt->bindParam(':expected_salary', $data['expected_salary']);
            $stmt->bindParam(':bio', $data['bio']);
            return $stmt->execute();
        }catch(PDOException $e){
            error_log("Erro ao atualizar a candidatura: " . $e->getMessage());
            return false;
        }
    }

    public function deleteApplicationById($id) {
        $sql = "DELETE FROM applications WHERE id = :id";
        try {
            $stmt = $this->db_connection->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erro ao excluir a candidatura: " . $e->getMessage());
            return false;
        }
    }


}

<?php

class Appointment{
    private $pdo; // várivel que irá guardar o banco de dados

    public function __construct($pdo){
        $this->pdo = $pdo; 
    }

    public function getAll(){
        $sql = "SELECT * FROM appointments ORDER BY start_date ASC";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    // de hoje
    public function getFuture(){
        $sql = "SELECT * FROM appointments WHERE data_inicial >= CURDATE() ORDER BY data_inicial ASC";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //passados
    public function getPast(){
        $sql = "SELECT * FROM appointments WHERE data_inicial < CURDATE() ORDER BY data_inicial DESC";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        // Criar agendamento
    public function create($data) {
        $sql = "INSERT INTO appointments (start_date, end_date, title, description, client_name)
                VALUES (:start_date, :end_date, :title, :description, :client_name)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':start_date'   => $data['start_date'] ?? null,
            ':end_date'     => $data['end_date'] ?? null,
            ':title'        => $data['title'] ?? '',
            ':description'  => $data['description'] ?? '',
            ':client_name'  => $data['client_name'] ?? ''
        ]);
    }


    public function getById($id) {
        $sql = "SELECT * FROM appointments WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function update($id, $data) {
        $sql = "UPDATE appointments SET start_date = :start_date, end_date = :end_date, title = :title,
         description = :description, client_name = :client_name WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':start_date'   => $data['start_date'] ?? null,
            ':end_date'     => $data['end_date'] ?? null,
            ':title'        => $data['title'] ?? '',
            ':description'  => $data['description'] ?? '',
            ':client_name'  => $data['client_name'] ?? '',
            ':id'           => $id
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM appointments WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }
}

?>
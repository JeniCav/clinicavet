<?php
require_once 'database.php';

class Disponibilidade {
    private $medicoId;
    private $data;
    private $horario;

    public function __construct($medicoId, $data, $horario) {
        $this->medicoId = $medicoId;
        $this->data = $data;
        $this->horario = $horario;
    }

    public function salvar() {
        $conn = Database::conectar();
        $sql = "INSERT INTO disponibilidades (medico_id, data, horario) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->medicoId, $this->data, $this->horario]);
    }

    public static function listarPorMedico($medicoId) {
        $conn = Database::conectar();
        $sql = "SELECT * FROM disponibilidades WHERE medico_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$medicoId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

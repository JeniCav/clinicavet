<?php
require_once 'database.php';

class Agendamento {
    private $id;
    private $usuarioId;
    private $medicoId;
    private $data;
    private $horario;

    public function __construct($id, $usuarioId, $medicoId, $data, $horario) {
        $this->id = $id;
        $this->usuarioId = $usuarioId;
        $this->medicoId = $medicoId;
        $this->data = $data;
        $this->horario = $horario;
    }

    public function salvar() {
        $conn = Database::conectar();
        $sql = "INSERT INTO agendamentos (usuario_id, medico_id, data, horario) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->usuarioId, $this->medicoId, $this->data, $this->horario]);
        $this->id = $conn->lastInsertId();
    }

    public static function listarPorUsuario($usuarioId) {
        $conn = Database::conectar();
        $sql = "SELECT * FROM agendamentos WHERE usuario_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

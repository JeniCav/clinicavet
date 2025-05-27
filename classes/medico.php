<?php
require_once 'usuario.php';

class Medico extends Usuario {
    private $especialidade;
    private $crm;

    public function __construct($id, $nome, $email, $senha, $especialidade, $crm) {
        parent::__construct($id, $nome, $email, $senha);
        $this->especialidade = $especialidade;
        $this->crm = $crm;
    }

    public function salvar() {
        parent::salvar();
        $conn = Database::conectar();
        $sql = "REPLACE INTO medicos (id, especialidade, crm) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->id, $this->especialidade, $this->crm]);
    }

    public static function buscarPorId($id) {
        $usuario = parent::buscarPorId($id);
        if (!$usuario) return null;

        $conn = Database::conectar();
        $sql = "SELECT * FROM medicos WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Medico($usuario->id, $usuario->nome, $usuario->email, $usuario->senha, $row['especialidade'], $row['crm']);
        }
        return null;
    }

    public function getEspecialidade() { return $this->especialidade; }
    public function getCrm() { return $this->crm; }
}

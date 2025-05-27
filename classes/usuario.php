<?php
require_once 'database.php';

class Usuario {
    protected $id;
    protected $nome;
    protected $email;
    protected $senha;

    public function __construct($id, $nome, $email, $senha) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function salvar() {
        $conn = Database::conectar();
        if ($this->id) {
            $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->nome, $this->email, $this->senha, $this->id]);
        } else {
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$this->nome, $this->email, $this->senha]);
            $this->id = $conn->lastInsertId();
        }
    }

    public static function buscarPorId($id) {
        $conn = Database::conectar();
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Usuario($row['id'], $row['nome'], $row['email'], $row['senha']);
        }
        return null;
    }

    public function deletar() {
        $conn = Database::conectar();
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->id]);
    }

    // Getters
    public function getNome() { return $this->nome; }
    public function getEmail() { return $this->email; }
    public function autenticar($senha) { return $this->senha === $senha; }

    public static function buscarPorEmail($email) {
    $conn = Database::conectar();
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Verifica se é médico ou admin
        $medico = Medico::buscarPorId($row['id']);
        if ($medico) return $medico;

        $adminEmails = ['admin@sistema.com']; // ajuste conforme necessidade
        if (in_array($row['email'], $adminEmails)) {
            return new Admin($row['id'], $row['nome'], $row['email'], $row['senha']);
        }

        return new Usuario($row['id'], $row['nome'], $row['email'], $row['senha']);
    }
    return null;
}
}

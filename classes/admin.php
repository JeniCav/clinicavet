<?php
require_once 'usuario.php';
require_once 'database.php';

class Admin extends Usuario {
    public function __construct($id, $nome, $email, $senha) {
        parent::__construct($id, $nome, $email, $senha);
    }

    public function isAdmin() {
        return true;
    }

    //  Listar todos os usuários
    public static function listarUsuarios() {
        $conn = Database::conectar();
        $sql = "SELECT * FROM usuarios";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Listar todos os médicos
    public static function listarMedicos() {
        $conn = Database::conectar();
        $sql = "SELECT u.id, u.nome, u.email, m.especialidade, m.crm 
                FROM usuarios u
                INNER JOIN medicos m ON u.id = m.id";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Remover um usuário
    public static function removerUsuario($id) {
        $conn = Database::conectar();
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$id]);
    }

    //Remover um agendamento
    public static function removerAgendamento($id) {
        $conn = Database::conectar();
        $sql = "DELETE FROM agendamentos WHERE id = ?";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}

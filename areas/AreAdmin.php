<?php
session_start();
require_once '../classes/admin.php';

echo "<h1>Área do Administrador</h1>";

// Listar todos os usuários
$usuarios = Admin::listarUsuarios();
echo "<h3>Usuários:</h3>";
foreach ($usuarios as $u) {
    echo "<p>{$u['id']} - {$u['nome']} ({$u['email']})</p>";
}

// Listar médicos
$medicos = Admin::listarMedicos();
echo "<h3>Médicos:</h3>";
foreach ($medicos as $m) {
    echo "<p>{$m['nome']} - {$m['especialidade']}</p>";
}

echo "<a href='../logout.php'>Sair</a>";

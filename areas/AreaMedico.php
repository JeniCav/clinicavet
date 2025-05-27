<?php
session_start();
require_once '../classes/disponibilidade.php';

echo "<h1>Área do Médico</h1>";
echo "<p>Bem-vindo, médico!</p>";

// Exemplo de exibição de disponibilidades
$disponibilidades = Disponibilidade::listarPorMedico($_SESSION['usuario_id']);
foreach ($disponibilidades as $disp) {
    echo "<p>Data: {$disp['data']} - Horário: {$disp['horario']}</p>";
}

echo "<a href='../logout.php'>Sair</a>";

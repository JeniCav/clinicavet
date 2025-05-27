<?php
session_start();

if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['tipo'])) {
    header("Location: index.php");
    exit;
}

switch ($_SESSION['tipo']) {
    case 'admin':
        header("Location: areas/admin.php");
        break;
    case 'medico':
        header("Location: areas/medico.php");
        break;
    default:
        header("Location: areas/usuario.php");
        break;
}
exit;

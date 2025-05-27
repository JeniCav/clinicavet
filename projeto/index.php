<?php
session_start();
require_once 'classes/usuario.php';
require_once 'classes/medico.php';
require_once 'classes/admin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = Usuario::buscarPorEmail($email);

    if ($usuario && $usuario->autenticar($senha)) {
        $_SESSION['usuario_id'] = $usuario->getId();
        $_SESSION['tipo'] = ($usuario instanceof Admin) ? 'admin' : (($usuario instanceof Medico) ? 'medico' : 'usuario');
        header("Location: dashboard.php");
        exit;
    } else {
        $erro = "Credenciais inválidas!";
    }
}
?>

<form method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Entrar</button>
</form>
<?php if (isset($erro)) echo "<p>$erro</p>"; ?>

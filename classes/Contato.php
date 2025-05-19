<?php

class Contato {
    public function exibirFormulario() {
        echo '
        <h2>Contato</h2>
        <form action="enviar.php" method="POST">
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" required><br><br>
            <label for="email">E-mail:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <label for="mensagem">Mensagem:</label><br>
            <textarea id="mensagem" name="mensagem" required></textarea><br><br>
            <input type="submit" value="Enviar">
        </form>';
    }
}
?>

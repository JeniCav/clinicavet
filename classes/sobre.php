<?php

class Sobre {

    public function exibirConteudo() {
        echo'
        <section>
            <h2>Sobre a Clínica</h2>
            <p>Fundada em 2010, a Clínica Veterinária SweetPet tem como missão proporcionar cuidados de saúde de alta qualidade para animais de estimação, garantindo seu bem-estar e felicidade.</p>
            <h3>Missão</h3>
            <p>Oferecer atendimento veterinário especializado, com ética e dedicação, promovendo a saúde e qualidade de vida dos pets.</p>
            <h3>Visão</h3>
            <p>Ser referência em atendimento veterinário na região, reconhecida pela excelência e carinho com os animais.</p>
            <h3>Valores</h3>
            <ul>
                <li>Compromisso com a saúde animal</li>
                <li>Ética e transparência</li>
                <li>Empatia e respeito</li>
                <li>Atualização contínua</li>
            </ul>
            <h3>Equipe</h3>
            <p>Contamos com uma equipe de profissionais altamente capacitados, incluindo veterinários, técnicos e auxiliares, todos comprometidos com o bem-estar dos animais.</p>
        </section>';
    
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Veterinária PetCare</title>
    <link rel="stylesheet" href="../style/sobre.css">
</head>
<body>
    <header>
        <img src="assets/img/logo.png" alt="Logo SweetPet">
        <nav>
            <ul>
                <li><a href="../index.php">Início</a></li>
                <li><a href="conteudo.php">Sobre</a></li>
                <li><a href="servicos.php">Serviços</a></li>
                <li><a href="contato.php">Contato</a></li>
            </ul>
        </nav>
        <footer>
        © 2025 Clínica Veterinária SweetPet
        </footer>
    </header>

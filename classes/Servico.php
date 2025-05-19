<?php

class Servico {
    private $lista;

    public function __construct() {
        $this->lista = [
            "Consultas Clínicas",
            "Vacinação",
            "Cirurgias",
            "Exames Laboratoriais",
            "Atendimento de Emergência"
        ];
    }

    public function listar() {
        echo "<h2>Serviços Oferecidos</h2><ul>";
        foreach ($this->lista as $servico) {
            echo "<li>{$servico}</li>";
        }
        echo "</ul>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=S, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/servico.css">
</head>
<body>
    
</body>
</html>
<?php
require_once 'classes/Servico.php';
require_once 'classes/Contato.php';

class Pagina {
    private $titulo;
    private $servicos;
    private $contato;

    public function __construct() {
        $this->titulo = "Clínica Veterinária SweetPet";
        $this->servicos = new Servico();
        $this->contato = new Contato();
    }

    public function exibir() {
        include 'inclu/header.php';
        echo "<h1>{$this->titulo}</h1>";
        $this->servicos->listar();
        $this->contato->exibirFormulario();
    }

    public function exibirFooter() {
        echo "<footer>© 2025 Clínica Veterinária PetCare</footer>";
    }
}
?>

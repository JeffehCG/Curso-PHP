<div class="titulo">Construtor e Destrutor</div>

<?php
class Pessoa {
    public $nome;
    public $idade;

    function __construct($novoNome, $idade = 18) {
        echo 'Construtor invocado! <br>';
        $this->nome = $novoNome;
        $this->idade = $idade;
    }

    // Metodo semper chamado quando o objeto é destruido
    function __destruct() {
        echo 'E morreu!<br>';
    }

    public function apresentar() {
        echo "{$this->nome}, {$this->idade} anos<br>";
    }
}

// $pessoa = new Pessoa(); // Problema - Obrigado passar parametros

$pessoaA = new Pessoa('Rebeca Maria', 40);
$pessoaB = new Pessoa('João Pedro');

$pessoaA->apresentar();
unset($pessoaA); // Ira chamar o _destruct

$pessoaB->apresentar();
$pessoaB = null; // Ira chamar o _destruct
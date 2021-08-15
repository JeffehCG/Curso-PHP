<div class="titulo">Traits #01</div>

<?php
trait validacao {
    public $a = 'Valor a';

    public function validarString($str) {
        return isset($str) && $str !== '';
    }
}

trait validacaoMelhor {
    public $b = 'Valor b';
    private $c = 'Valor c (privado)';

    public function validarStringMelhor($str) {
        return isset($str) && trim($str);
    }
}

class Usuario {
    // Usando trait - boa estrategia do php para reaproveitamento de codigo
    use validacao, validacaoMelhor;

    public function imprimirValorC() {
        echo '<br>', $this->c;
    }
}

// var_dump(validacao->validarString(''));

$usuario = new Usuario();
var_dump($usuario->validarString(' '));
echo '<br>';
var_dump($usuario->validarStringMelhor(' '));
echo '<br>';
echo $usuario->a, '<br>',$usuario->b; // Acessando atributos da trait
echo $usuario->imprimirValorC();
<?php
namespace Exer\ComIdade\classes;

use Exer\ComIdade\classes\Abstracts\Pessoa;
use Exer\ComIdade\Interfaces\IMC;

class Arbitro extends Pessoa
{ 

    private string $cargo;

    public function __construct(string $nome, int $idade, string $cargo, float $altura, float $peso)
    {
        parent::__construct($nome, $idade);
        $this->cargo  = $cargo;
        $this->altura = $altura;
        $this->peso   = $peso;
        $this->calcIMC();
    }

    public function __toString(): string
    {
        return "\n=== Dados do " . self::class . " ==="
            . "\nNome: $this->nome"
            . "\nIdade: $this->idade"
            . "\nCargo: $this->cargo"
            . "\nPeso: $this->peso"
            . "\nAltura: $this->altura"
            . "\nIMC: " . number_format($this->imc, 2)
            . "\nClassificação: " . $this->classifica()
            . "\nNormal? " . ($this->isNormal() ? "Sim" : "Não");
    }
}

<?php
namespace Exer\ComIdade\classes;

use Exer\ComIdade\classes\Abstracts\Pessoa;
use Exer\ComIdade\classes\IMC;
use Exer\ComIdade\Interfaces\iFuncionario;

class Atleta extends Pessoa implements iFuncionario
{
    use IMC;

    private float $salario;
    private int $tempoContrato; // em anos

    public function __construct(
        string $nome,
        int $idade,
        float $altura,
        float $peso,
        float $salario,
        int $tempoContrato
    ) {
        parent::__construct($nome, $idade);
        $this->altura = $altura;
        $this->peso = $peso;
        $this->salario = $salario;
        $this->tempoContrato = $tempoContrato;
        $this->calcIMC();
    }

    public function mostrarSalario(): string
    {
        return "Salário: R$ " . number_format($this->salario, 2, ',', '.');
    }

    public function mostrarTempoContrato(): string
    {
        return "Contrato de {$this->tempoContrato} anos.";
    }

    public function __toString(): string
    {
        return "\n=== Dados do Atleta ==="
            . "\nNome: $this->nome"
            . "\nIdade: $this->idade"
            . "\nPeso: $this->peso"
            . "\nAltura: $this->altura"
            . "\nIMC: " . number_format($this->imc, 2)
            . "\nClassificação: " . $this->classifica()
            . "\nNormal? " . ($this->isNormal() ? "Sim" : "Não");
    }
}

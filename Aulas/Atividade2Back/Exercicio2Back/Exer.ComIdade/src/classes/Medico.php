<?php
namespace Exer\ComIdade\classes;

use Exer\ComIdade\classes\Abstracts\Pessoa;

class Medico extends Pessoa 
{
    private string $CRM;
    private string $especialidade;
    private float $salario;
    private int $tempoContrato; // em anos

    public function __construct(
        string $nome,
        int $idade,
        string $crm,
        string $especialidade,
        float $salario,
        int $tempoContrato
    ) {
        parent::__construct($nome, $idade);
        $this->CRM = $crm;
        $this->especialidade = $especialidade;
        $this->salario = $salario;
        $this->tempoContrato = $tempoContrato;
    }

    public function getCRM(): string
    {
        return $this->CRM;
    }

    public function getEspecialidade(): string
    {
        return $this->especialidade;
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
        return "\n=== Dados do Médico ==="
            . "\nNome: $this->nome"
            . "\nIdade: $this->idade"
            . "\nCRM: $this->CRM"
            . "\nEspecialidade: $this->especialidade";
    }
}

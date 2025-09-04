<?php
namespace Exer\ComIdade\classes;

trait IMC
{
    protected float $peso;
    protected float $altura;
    protected int $idade;
    protected float $imc;

    /**
     * Calcula e salva o IMC.
     */
    public function calcIMC(): float
    {
        if ($this->altura <= 0) {
            throw new \InvalidArgumentException("Altura deve ser maior que zero.");
        }
        $this->imc = $this->peso / ($this->altura * $this->altura);
        return $this->imc;
    }

    /**
     * Retorna a classificação do IMC.
     */
    public function classifica(): string
    {
        $imc = $this->imc ?? $this->calcIMC();

        if ($imc < 18.5) {
            return "Abaixo do peso";
        } elseif ($imc < 25) {
            return "Saudável";
        } elseif ($imc < 30) {
            return "Sobrepeso";
        } else {
            return "Obesidade";
        }
    }

    /**
     * Verifica se IMC é considerado normal de acordo com a idade.
     */
    public function isNormal(): bool
    {
        $imc = $this->imc ?? $this->calcIMC();

        // Tabela aproximada da imagem
        $faixas = [
            [19, 24, [19, 24]],
            [25, 34, [20, 25]],
            [35, 44, [21, 26]],
            [45, 54, [22, 27]],
            [55, 64, [23, 28]],
            [65, 150, [24, 29]],
        ];

        foreach ($faixas as [$minIdade, $maxIdade, $imcRange]) {
            if ($this->idade >= $minIdade && $this->idade <= $maxIdade) {
                return $imc >= $imcRange[0] && $imc <= $imcRange[1];
            }
        }
        return false;
    }
}

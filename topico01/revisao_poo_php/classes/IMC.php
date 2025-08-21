<?php
include_once "Pessoa.php";

class IMC
{

    public static function toString()
    {
        return self::class; //$this

    }

    public static function calc(Pessoa $objPessoa)
    {
        echo "Calculando o IMC de $objPessoa->nome\n";

        if (
            !is_numeric($this->altura)
            && !is_numeric($this->peso)
        ) {
            echo "\nIMC $this->nome: Erro, informe peso e altura corretamente.\n";
            return;
        }

        $this->imc = $this->peso / $this->altura ** 2;
        echo "\nO IMC do $this->nome é: " . number_format($this->imc, 2) . "\n";

        return;
    }

    public static function classifica(Pessoa $objPessoa)
    {





        return self::calc($objPessoa);
    }
}

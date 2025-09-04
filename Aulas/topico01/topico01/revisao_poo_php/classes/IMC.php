<?php
include_once "Pessoa.php";

class IMC{

    public static function toString() { 
            return self::class;//$this

     }

    public static function calc(Pessoa $objPessoa){
		if (!is_numeric($objPessoa->altura) && !is_numeric($objPessoa->peso)) {
            return 0;//encerrou o metodo!!
        }

		if ($objPessoa->altura > 0 || $objPessoa->peso > 0) {
        	$objPessoa->setImc($objPessoa->peso / $objPessoa->altura ** 2);
		} else {
			return 0;
		}
    }

    public static function classifica(Pessoa $objPessoa){
        if ($objPessoa->getImc() == 0) {
            self::calc($objPessoa);
        }

        $valor = $objPessoa->getImc();

        if ($valor <= 18.5) {
            return "Abaixo do peso";
        } else if ($valor > 18.5 && $valor < 24.9) {
            return "Saudavel";
        } else if ($valor >= 25 && $valor < 29.9) {
            return "Sobrepeso";
        } else if ($valor >= 30) {
            return "Obesidade";
        } else {
            return "Sem classificacao";
        }
    }
}
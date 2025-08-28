<?php

class Pessoa
{
	public $nome, $idade, $altura, $peso;
	protected $imc;

	function __construct(
		$nome,
		$idade,
		$altura = null,
		$peso = null
	) {
		$this->nome = $nome;
		$this->idade = $idade;
		$this->altura = $altura;
		$this->peso = $peso;
	}

	function __destruct()
	{
		echo "\n$this->nome foi destruido!!";
	}

	function setImc($valor)
	{
		$this->imc = $valor;
	}

	function getImc()
	{
		return $this->imc;
	}
}

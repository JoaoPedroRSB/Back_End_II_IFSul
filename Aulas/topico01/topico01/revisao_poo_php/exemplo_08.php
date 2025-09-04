<?php

include_once 'classes/Pessoa.php';

include_once 'classes/IMC.php';

echo "\nClasse statica ".IMC::toString()."\n";

$pessoa = new Pessoa("Lucia", 60, 1.55, 89);
$pessoa = new Pessoa("Erick",20,1.70,76);

// IMC::calc($pessoa);

$classifica = IMC::classifica($pessoa);

echo "\nIMC da $pessoa->nome eh \n".number_format($pessoa->getImc(), 2) . " e ta classificado em " . $classifica;

echo "\nDeu tudo certo!!!\n";
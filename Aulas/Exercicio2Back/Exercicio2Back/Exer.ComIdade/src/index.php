<?php
require __DIR__ . '/../vendor/autoload.php';

use Exer\ComIdade\classes\Atleta;
use Exer\ComIdade\classes\Medico;
use Exer\ComIdade\classes\logs\Relatorio;

$medico = new Medico("Paulo Paixão", 65, "12345", "Fisiologista", 45000, 10);
$atleta = new Atleta("Pedro Geromel", 38, 1.9, 84, 45000, 4);

$relatorio = new Relatorio();
$relatorio->add($medico);
$relatorio->add($atleta);
$relatorio->imprime();

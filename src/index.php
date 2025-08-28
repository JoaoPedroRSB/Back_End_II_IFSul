<?php
require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Support\Str;

$texto = "Atividade Composer com Lower e Upper";

// Deixar tudo em maiúsculas
echo Str::upper($texto) . PHP_EOL;

// Deixar tudo em minúsculas
echo Str::lower($texto) . PHP_EOL;

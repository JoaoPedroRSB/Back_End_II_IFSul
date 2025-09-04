<?php 
namespace Exer\ComIdade\classes\logs;

use Exer\ComIdade\classes\Abstracts\Pessoa;
use Exer\ComIdade\Interfaces\iFuncionario;

class Relatorio
{
    private array $pessoas = [];

    public function add(Pessoa $pessoa): void
    {
        $this->pessoas[] = $pessoa;
    }
    
    public function log(Pessoa $pessoa): void
    {
        echo "\n\n--- LOG ---\n";
        echo $pessoa; // usa __toString()

        if ($pessoa instanceof iFuncionario) {
            echo "\n" . $pessoa->mostrarSalario();
            echo "\n" . $pessoa->mostrarTempoContrato();
        }
        echo "\n-------------\n";
    }

    public function imprime(): void
    {
        echo "\n______________RELATORIO___________________\n";
        foreach ($this->pessoas as $pessoa) {
            $this->log($pessoa);
        }
        echo "\n_______________________\n";
    }
}

<?php

namespace App\Interfaces\Sorteios;

interface ISorteio
{
    public function criarSorteio(array $attributes);
    public function getAllSorteios(string $status = null);
}

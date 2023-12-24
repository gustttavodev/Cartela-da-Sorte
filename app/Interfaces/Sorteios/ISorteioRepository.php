<?php

namespace App\Interfaces\Sorteios;

interface ISorteioRepository
{
    public function findSorteioExistente(string $sorteioCodigo);
    public function createSorteio(string $nome, string $data_inicio, string $data_fim, string $codigo);
    public function getAllSorteios(string $status);
}

<?php

namespace App\Services\Sorteios;

use App\Interfaces\Sorteios\ISorteio;
use App\Interfaces\Sorteios\ISorteioRepository;
use Illuminate\Support\Str;

class SorteioService implements ISorteio
{
    public function __construct(protected ISorteioRepository $sorteioRepository)
    {
    }

    public function criarSorteio(array $attributes)
    {
        $codigo = strtoupper(Str::random(9));
        return $this->sorteioRepository->createSorteio($attributes['nome'], $attributes['data_inicio'], $attributes['data_fim'], $codigo);
    }

    public function getAllSorteios(string $status = null)
    {
        return $this->sorteioRepository->getAllSorteios($status);

    }
}

<?php

namespace App\Repositories\Sorteio;

use App\Interfaces\Sorteios\ISorteioRepository;
use App\Models\Sorteio;

class SorteioRepository implements ISorteioRepository
{
    public function __construct(protected Sorteio $model)
    {
    }

    public function findSorteioExistente(string $sorteioCodigo)
    {
        return $this->model->where('codigo', $sorteioCodigo)->first();
    }

    public function createSorteio(string $nome, string $data_inicio, string $data_fim, string $codigo)
    {
        return $this->model->query()->create([
           'nome' => $nome,
           'data_inicio' => $data_inicio,
           'data_fim' => $data_fim,
           'codigo' => $codigo
        ]);
    }

    public function getAllSorteios(string $status = null)
    {
        return $this->model->query()
            ->when($status, function ($query) use ($status){
                $query->where('status', '=', $status);
            })
            ->get();
    }
}

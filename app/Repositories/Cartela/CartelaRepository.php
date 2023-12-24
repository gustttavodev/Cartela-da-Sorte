<?php

namespace App\Repositories\Cartela;

use App\Enums\StatusCartela;
use App\Interfaces\Cartelas\ICartelaRepository;
use App\Models\Cartela;
use App\Models\Sorteio;

class CartelaRepository implements ICartelaRepository
{
    public function __construct(protected Cartela $model, protected Sorteio $sorteioModel)
    {
    }

    public function findCartela(int $cartelaId)
    {
        // TODO: Implement findCartela() method.
    }

    public function gerarCartela(int $user_id, int $sorteio_id)
    {
        return $this->model->query()->create([
            'numeros_da_sorte' => $this->gerarNumerosDaSorte(),
            'user_id' => $user_id,
            'sorteio_id' => $sorteio_id,
            'status' => StatusCartela::Ativo->value
        ]);
    }

    private function gerarNumerosDaSorte(): string
    {
        $numeros = [];

        for ($i = 0; $i < 20; $i++) {
            // Gera um número aleatório entre 1 e 99
            $numero = str_pad(mt_rand(1, 99), 2, '0', STR_PAD_LEFT);
            $numeros[] = $numero;
        }

        return implode(',', $numeros);
    }

    public function getIdSorteio(string $codigo)
    {
        return $this->sorteioModel->where('codigo', $codigo)->first()->id ?? null;
    }

    public function getCartelas(int $userId)
    {
        return $this->model->where('user_id', $userId)->get();
    }
}

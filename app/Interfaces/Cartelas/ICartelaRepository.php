<?php declare(strict_types=1);

namespace App\Interfaces\Cartelas;

interface ICartelaRepository
{
    public function findCartela(int $cartelaId);

    public function gerarCartela(int $user_id, int $sorteio_id);

    public function getIdSorteio(string $codigo);

    public function getCartelas(int $userId);
}

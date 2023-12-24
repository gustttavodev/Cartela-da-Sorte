<?php

namespace App\Interfaces\Cartelas;

interface ICartela
{
    public function comprarCartela(string $sorteioCodigo): object;
    public function getCartelasUser(int $userId): object;
}

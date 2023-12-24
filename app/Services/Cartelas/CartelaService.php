<?php declare(strict_types=1);

namespace App\Services\Cartelas;

use App\Interfaces\Cartelas\ICartela;
use App\Interfaces\Cartelas\ICartelaRepository;
use App\Interfaces\Sorteios\ISorteioRepository;
use Exception;

class CartelaService implements ICartela
{
    public function __construct(protected ICartelaRepository $cartelaRepository)
    {
    }

    public function comprarCartela(string $sorteioCodigo): object
    {
        $userId = auth()->user()->id;
        $sorteioId = $this->cartelaRepository->getIdSorteio($sorteioCodigo);

        if (!$sorteio = $this->cartelaRepository->gerarCartela($userId, $sorteioId)) {
            return throw new Exception('O sorteio informaddo não existe ou passou do prazo de participação');
        }
        return $sorteio;
    }


    public function getCartelasUser(int $userId): object
    {
        return $this->cartelaRepository->getCartelas($userId);
    }
}

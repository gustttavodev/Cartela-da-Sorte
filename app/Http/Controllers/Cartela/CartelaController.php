<?php

namespace App\Http\Controllers\Cartela;

use App\Interfaces\Cartelas\ICartela;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cartelas\CompraCartelaRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CartelaController extends Controller
{
    public function __construct(protected ICartela $cartelaService)
    {
    }

    public function index()
    {
        try {
            $userId = auth()->user()->id;
            $cartelas = $this->cartelaService->getCartelasUser($userId);

            return response()->json(['cartelas' => $cartelas], Response::HTTP_OK);

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function store(CompraCartelaRequest $request): JsonResponse
    {
        try {
            $sorteioCod = $request->get('sorteio_codigo');

            if (!$cartela = $this->cartelaService->comprarCartela($sorteioCod)) {
                return response()->json(['message' => 'Não foi possivel criar a carteira, tente novamente!'], Response::HTTP_OK);
            }
            return response()->json(['message' => 'Cartela Criada com sucesso!', 'cartela' => $cartela], Response::HTTP_OK);

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}

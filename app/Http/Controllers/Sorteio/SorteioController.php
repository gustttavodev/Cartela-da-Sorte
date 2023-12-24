<?php

namespace App\Http\Controllers\Sorteio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sorteios\CreateSorteioRequest;
use App\Interfaces\Sorteios\ISorteio;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SorteioController extends Controller
{
    public function __construct(protected ISorteio $sorteioService)
    {
    }

    public function index(Request $request)
    {
        try {
            $status = $request->query('status');
            $sorteios = $this->sorteioService->getAllSorteios($status);

            return response()->json(['sorteios' => $sorteios], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
    public function store(CreateSorteioRequest $request)
    {
        try {
            $sorteio = $this->sorteioService->criarSorteio($request->all());

            return response()->json(['message' => 'Sorteio criado com sucesso!'], Response::HTTP_CREATED);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}

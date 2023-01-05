<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successApiResponse($payload): JsonResponse
    {
        return response()->json(['error' => false, 'payload' => $payload]);
    }

    public function errorApiResponse($payload): JsonResponse
    {
        return response()->json(['error' => false, 'payload' => $payload]);
    }
}

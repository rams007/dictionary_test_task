<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DictionaryAPIService extends Controller
{

    public static function getWordData(string $word)
    {
        $url = 'https://api.dictionaryapi.dev/api/v2/entries/en/' . $word;
        $response = Http::get($url);
        if ($response->successful()) {
            $dataResponse = $response->json();
            if (isset($dataResponse[0])) {
                Word::where('word', $word)->update(['api_response' => json_encode(['error' => false, 'data' => $dataResponse[0]])]);
            } else {
                Word::where('word', $word)->update(['api_response' => json_encode(['error' => true, 'data' => 'Can not decode API response'])]);
            }
        } else {
            $errorMessage = 'Error when getting API response. Server response with code ' . $response->status() . ' Message =' . $response->reason();
            Log::error($errorMessage);
            Word::where('word', $word)->update(['api_response' => json_encode(['error' => true, 'data' => $errorMessage])]);
        }
    }
}

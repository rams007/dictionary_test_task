<?php

namespace App\Http\Controllers;

use App\Events\NewWordAdded;
use App\Http\Requests\CreateWordRequest;
use App\Models\Word;
use Illuminate\Http\JsonResponse;


class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $words = Word::with('dictionary:name,id')->orderBy('word', 'ASC')->paginate(20);
        return response()->json(['error' => false, 'data' => $words]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CreateWordRequest $request
     * @return JsonResponse
     */
    public function store(CreateWordRequest $request): JsonResponse
    {
        Word::create(['dictionary_id' => $request->input('dictionary_id'), 'word' => $request->input('word')]);

        NewWordAdded::dispatch($request->input('word'));
        return response()->json(['error' => false, 'msg' => 'Created']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Word $word
     * @return JsonResponse
     */
    public function destroy(Word $word): JsonResponse
    {
        $word->delete();
        return response()->json(['error' => false, 'msg' => 'Deleted']);
    }
}

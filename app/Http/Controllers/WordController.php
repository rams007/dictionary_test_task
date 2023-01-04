<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWordRequest;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $dictionaries = Word::with('dictionary:name,id')->orderBy('word', 'ASC')->paginate(20);
        return response()->json(['error' => false, 'data' => $dictionaries]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateWordRequest $request)
    {
        Word::create(['dictionary_id' => $request->input('dictionary_id'), 'word' => $request->input('word')]);

        return response()->json(['error' => false, 'msg' => 'Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Word $word)
    {
        $word->delete();
        return response()->json(['error' => false, 'msg' => 'Deleted']);
    }
}

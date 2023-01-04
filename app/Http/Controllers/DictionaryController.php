<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDictionaryRequest;
use App\Models\Dictionary;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $dictionaries = Dictionary::orderBy('name', 'ASC')->select(['name', 'id'])->paginate(10);
        return response()->json(['error' => false, 'data' => $dictionaries]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateDictionaryRequest $request)
    {
        Dictionary::create(['name' => $request->input('name')]);
        return response()->json(['error' => false, 'msg' => 'Created']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
    public function destroy(Dictionary $dictionary)
    {
        $dictionary->delete();
        return response()->json(['error' => false, 'msg' => 'Deleted']);
    }
}

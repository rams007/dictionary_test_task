<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDictionaryRequest;
use App\Models\Dictionary;
use Illuminate\Http\JsonResponse;


class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $dictionaries = Dictionary::orderBy('name', 'ASC')->select(['name', 'id'])->paginate(10);
        return $this->successApiResponse($dictionaries);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CreateDictionaryRequest $request
     * @return JsonResponse
     */
    public function store(CreateDictionaryRequest $request): JsonResponse
    {
        Dictionary::create(['name' => $request->input('name')]);
        return $this->successApiResponse(['msg' => 'Created']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Dictionary $dictionary
     * @return JsonResponse
     */
    public function destroy(Dictionary $dictionary): JsonResponse
    {
        $dictionary->delete();
        return $this->successApiResponse(['msg' => 'Deleted']);
    }
}

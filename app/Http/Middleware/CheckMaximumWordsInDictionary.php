<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckMaximumWordsInDictionary
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $sql = 'SELECT COUNT(*) AS totalWords FROM dictionaries
                LEFT JOIN words ON words.dictionary_id=dictionaries.id
                WHERE dictionaries.id=?';

        $dictionaryResults = DB::select($sql, [$request->input('dictionary_id')]);
        $countWordsInDictionary = $dictionaryResults[0]->totalWords;

        if ($countWordsInDictionary > 100) {
            return response()->json(['error' => true, 'msg' => 'Maximum allowed word per dictionary']);
        }

        return $next($request);
    }
}

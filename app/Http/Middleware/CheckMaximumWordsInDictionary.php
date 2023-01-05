<?php

namespace App\Http\Middleware;

use App\Mail\SendMaximumWordsInDictionaryEmail;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class CheckMaximumWordsInDictionary
{
    /**
     * Check limitation on 100 words per dictionary
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $sql = 'SELECT COUNT(*) AS totalWords FROM dictionaries
                LEFT JOIN words ON words.dictionary_id=dictionaries.id
                WHERE dictionaries.id=?';

        $dictionaryResults = DB::select($sql, [$request->input('dictionary_id')]);
        $countWordsInDictionary = $dictionaryResults[0]->totalWords;

        if ($countWordsInDictionary > 100) {
            try {
                Mail::to(env('ADMIN_EMAIL'))->send(new SendMaximumWordsInDictionaryEmail($request->input('dictionary_id')));
            } catch (Throwable $e) {
                Log::error('Error sending email ' . $e->getMessage());
            }

            return response()->json(['error' => true, 'msg' => 'Maximum allowed word per dictionary']);
        }

        return $next($request);
    }
}

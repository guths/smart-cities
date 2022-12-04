<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'time' => 'required|date',
            'time_id' => 'required|exists:times,id'
        ]);

        $suggestion = Suggestion::query()->create($request->all());

        return response()->json($suggestion);
    }

    public function voteUp(Suggestion $suggestion)
    {
        $suggestion->update(['votes_up' => $suggestion->votes_up + 1]);

        return response()->json($suggestion);
    }

    public function voteDown(Suggestion $suggestion)
    {
        $suggestion->update(['votes_down' => $suggestion->votes_down + 1]);

        return response()->json($suggestion);
    }
}

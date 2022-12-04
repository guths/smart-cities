<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Time;
use App\Models\Way;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'initial_point' => 'required',
            'working_days' => 'required|boolean',
            'saturday' => 'required|boolean',
            'sunday' => 'required|boolean',
            'time' => 'required|date',
            'way_id' => 'required|exists:ways,id',
        ]);

        $time = Time::query()->create($request->all());

        return response()->json($time);
    }

    public function show(Time $time): int
    {
        return response()->json($time)->status(200);
    }

    public function destroy(Time $time)
    {
        $time->delete();

        return response()->json(null, 204);
    }

    public function getWayTimes(Way $way): JsonResponse
    {
        $times = $way->times;

        return response()->json($times);
    }

    public function getWayTimesInWorkingDays(Way $way): JsonResponse
    {
        $times = $way->times()->where('working_days', true)->get();

        return response()->json($times);
    }

    public function getWayTimesInSaturday(Way $way): JsonResponse
    {
        $times = $way->times()->where('saturday', true)->get();

        return response()->json($times);
    }

    public function getWayTimesInSunday(Way $way): JsonResponse
    {
        $times = $way->times()->where('friday', true)->get();

        return response()->json($times);
    }
}

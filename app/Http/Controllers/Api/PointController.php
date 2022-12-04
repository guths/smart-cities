<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Models\Way;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index()
    {
        $points = Point::all();

        return response()->json($points);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'order' => 'required|numeric',
            'way_id' => 'required|exists:ways,id',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $point = Point::query()->create($request->all());

        return response()->json($point);
    }

    public function show(Point $point)
    {
        return response()->json($point);
    }

    public function destroy(Point $point)
    {
        $point->delete();

        return response()->json(null, 204);
    }

    public function getWayPoints(Way $way)
    {
        $points = $way->points;

        return response()->json($points);
    }
}

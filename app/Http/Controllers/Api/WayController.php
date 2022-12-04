<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\Way;
use Illuminate\Http\Request;

class WayController extends Controller
{
    public function index()
    {
        $ways = Way::all();

        return response()->json($ways);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bus_id' => 'required|exists:buses,id',
        ]);

        $way = Way::query()->create($request->all());

        return response()->json($way);
    }

    public function show(Way $way)
    {
        return response()->json($way);
    }

    public function destroy(Way $way)
    {
        $way->delete();

        return response()->json(null, 204);
    }

    public function getBusWays(Bus $bus)
    {
        $ways = $bus->ways()->get();
        return response()->json($ways);
    }
}

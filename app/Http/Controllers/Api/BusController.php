<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::all();

        return response()->json($buses);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'line' => 'required',
        ]);

        $bus = Bus::query()->create($request->all());

        return response()->json($bus);
    }

    public function delete(Bus $bus)
    {
        $bus->delete();

        return response()->json(null, 204);
    }

    public function show(Bus $bus)
    {
        return response()->json($bus);
    }
}

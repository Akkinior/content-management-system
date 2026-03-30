<?php

namespace App\Http\Controllers\API;

use App\Models\Steps;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StepsResource;

class StepsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return StepsResource::collection(Steps::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'stepsName' => 'required|string|max:255',
            'stepsNumber' => 'nullable|integer',
            'stepsDescription' => 'nullable|string',
            'stepsImage' => 'nullable|string',
        ]);

        if (!empty($validated['stepsImage']) && str_contains($validated['stepsImage'], ';base64,')) {
            $validated['stepsImage'] = substr($validated['stepsImage'], strpos($validated['stepsImage'], ';base64,') + 8);
        }

        $step = Steps::create($validated);
        return new StepsResource($step);
    }

    /**
     * Display the specified resource.
     */
    public function show(Steps $step)
    {
        return new StepsResource($step);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Steps $step)
    {
        $validated = $request->validate([
            'stepsName' => 'string|max:255',
            'stepsDescription' => 'nullable|string',
            'stepsImage' => 'nullable|string',
        ]);

        if (!empty($validated['stepsImage']) && str_contains($validated['stepsImage'], ';base64,')) {
            $validated['stepsImage'] = substr($validated['stepsImage'], strpos($validated['stepsImage'], ';base64,') + 8);
        }

        $step->update($validated);
        return new StepsResource($step);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Steps $step)
    {
        $step->delete();
        if ($step) {
            $step->delete();
            return response()->json(['message' => 'Steps deleted successfully']);
        } else {
            return response()->json(['message' => 'Steps not found'], 404);
        }
    }
}

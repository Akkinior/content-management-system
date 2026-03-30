<?php

namespace App\Http\Controllers\API;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ServicesResource;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ServicesResource::collection(Service::with(['steps', 'cards'])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'nullable|integer',
            'description' => 'nullable|string',
            'buttonText' => 'nullable|string',
            'buttonRoute' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        if (!empty($validated['image']) && str_contains($validated['image'], ';base64,')) {
            $validated['image'] = substr($validated['image'], strpos($validated['image'], ';base64,') + 8);
        }
        $service = Service::create($validated);
        return new ServicesResource($service);
    }


    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return new ServicesResource($service->load(['steps', 'cards']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $service = Service::find($service->id);
        if ($service) {
            $validated = $request->validate([
                'name' => 'string|max:255',
                'number' => 'nullable|integer',
                'description' => 'nullable|string',
                'buttonText' => 'nullable|string',
                'buttonRoute' => 'nullable|string',
                'image' => 'nullable|string',
            ]);

            if (!empty($validated['image']) && str_contains($validated['image'], ';base64,')) {
            $validated['image'] = substr($validated['image'], strpos($validated['image'], ';base64,') + 8);
        }
            $service->update($validated);
            return new ServicesResource($service);
        }
        return response()->json(['message' => 'Service not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service = Service::find($service->id);
        if ($service) {
            $service->delete();
            return response()->json(['message' => 'Service deleted successfully']);
        }
        return response()->json(['message' => 'Service not found'], 404);
    }
}

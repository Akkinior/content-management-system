<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role->name !== 'Admin') {
                return redirect('/admin');
            }
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::paginate(10);
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'buttonText' => 'nullable|string',
            'buttonRoute' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        if (!empty($validated['image']) && str_contains($validated['image'], ';base64,')) {
            $validated['image'] = substr($validated['image'], strpos($validated['image'], ';base64,') + 8);
        }

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Service created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $services = Service::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'buttonText' => 'nullable|string',
            'buttonRoute' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

         if (!empty($validated['image']) && str_contains($validated['image'], ';base64,')) {
            $validated['image'] = substr($validated['image'], strpos($validated['image'], ';base64,') + 8);
        }

        $services->update($validated);
        return redirect()->route('services.index')->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $services = Service::findOrFail($id);
        $services->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }
}

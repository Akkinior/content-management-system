<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Steps;
use App\Models\Service;

class StepsController extends Controller
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
        $steps = Steps::paginate(10);
        return view('steps.index', compact('steps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('steps.create', compact('services'));
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
            'stepsImage' => 'required|string',
            'serviceid' => 'required|exists:services,id',
        ]);

        if (!empty($validated['stepsImage']) && str_contains($validated['stepsImage'], ';base64,')) {
            $validated['stepsImage'] = substr($validated['stepsImage'], strpos($validated['stepsImage'], ';base64,') + 8);
        }

        Steps::create($validated);
        return redirect()->route('steps.index')->with('success', 'Step created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $step = Steps::findOrFail($id);
        return view('steps.show', compact('step'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $step = Steps::findOrFail($id);
        $services = Service::all();
        return view('steps.edit', compact('step', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
         $step = Steps::findOrFail($id);
        $step = Steps::findOrFail($id);
        $validated = $request->validate([
            'stepsName' => 'required|string|max:255',
            'stepsNumber' => 'nullable|integer',
            'stepsDescription' => 'nullable|string',
            'stepsImage' => 'required|string',
            'serviceid' => 'required|exists:services,id',
        ]);

        if (!empty($validated['stepsImage']) && str_contains($validated['stepsImage'], ';base64,')) {
            $validated['stepsImage'] = substr($validated['stepsImage'], strpos($validated['stepsImage'], ';base64,') + 8);
        }

        $step->update($validated);
        return redirect()->route('steps.index')->with('success', 'Step updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $step = Steps::findOrFail($id);
        $step->delete();

        return redirect()->route('steps.index')->with('success', 'Step deleted successfully!');
    }
}

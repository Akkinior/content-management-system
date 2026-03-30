<?php

namespace App\Http\Controllers\Web;

use App\Models\Card;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CardResource;
use App\Models\Service;

class CardController extends Controller
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
        $cards = Card::paginate(10);
        return view('cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('cards.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'serviceid' => 'required|exists:services,id',
        ]);

        Card::create($validated);
        return redirect()->route('cards.index')->with('success', 'Card created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        $card = Card::findOrFail($card->id);
        return view('cards.show', compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        $services = Service::all();
        return view('cards.edit', compact('card', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'serviceid' => 'required|exists:services,id',
        ]);


        $card->update($validated);
        return redirect()->route('cards.index')->with('success', 'Card updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        $card = Card::findOrFail($card->id);
        $card->delete();
        return redirect()->route('cards.index')->with('success', 'Card deleted successfully');
    }
}

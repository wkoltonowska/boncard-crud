<?php

namespace App\Http\Controllers;
use App\Models\Card;
use Inertia\Inertia;


use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::paginate(10);
        return Inertia::render('Cards/Index',  ["cards" => $cards]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Cards/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'card_number' => 'required|digits:20',
            'pin' => 'required|digits:4',
            'activation_date' => 'required|date',
            'expiration_date' => 'required|date',
            'balance' => 'required|numeric',
        ]);
        Card::create($validated);
        return redirect()->route('cards.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
         return Inertia::render('Cards/Edit', ["card" => $card]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
         $validated = $request->validate([
            'card_number' => 'required|digits:20',
            'pin' => 'required|digits:4',
            'activation_date' => 'required|date',
            'expiration_date' => 'required|date',
            'balance' => 'required|numeric',
        ]);
        $card->update($validated);
        return redirect()->route('cards.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        $card->delete();
        return redirect()->route('cards.index');
    }
}

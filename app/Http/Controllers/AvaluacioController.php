<?php

namespace App\Http\Controllers;

use App\Models\Avaluacio;
use Illuminate\Http\Request;

class AvaluacioController extends Controller
{
    public function index()
    {
        return Avaluacio::with('alumne', 'uf')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'alumne_id' => 'required|exists:alumnes,id',
            'uf_id' => 'required|exists:ufs,id',
            'nota' => 'nullable|integer|min:0|max:100',
        ]);

        $avaluacio = Avaluacio::create($validated);
        return response()->json($avaluacio, 201);
    }

    public function show(Avaluacio $avaluacio)
    {
        return $avaluacio->load('alumne', 'uf');
    }

    public function update(Request $request, Avaluacio $avaluacio)
    {
        $validated = $request->validate([
            'alumne_id' => 'sometimes|required|exists:alumnes,id',
            'uf_id' => 'sometimes|required|exists:ufs,id',
            'nota' => 'nullable|integer|min:0|max:100',
        ]);

        $avaluacio->update($validated);
        return response()->json($avaluacio);
    }

    public function destroy(Avaluacio $avaluacio)
    {
        $avaluacio->delete();
        return response()->noContent();
    }
}

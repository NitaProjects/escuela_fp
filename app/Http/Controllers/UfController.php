<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use Illuminate\Http\Request;

class UfController extends Controller
{
    public function index()
    {
        return Uf::with('modul')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'modul_id' => 'required|exists:moduls,id',
        ]);

        $uf = Uf::create($validated);
        return response()->json($uf, 201);
    }

    public function show(Uf $uf)
    {
        return $uf->load('modul', 'alumnes');
    }

    public function update(Request $request, Uf $uf)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'modul_id' => 'sometimes|required|exists:moduls,id',
        ]);

        $uf->update($validated);
        return response()->json($uf);
    }

    public function destroy(Uf $uf)
    {
        $uf->delete();
        return response()->noContent();
    }
}

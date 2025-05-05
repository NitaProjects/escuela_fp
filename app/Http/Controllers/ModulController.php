<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function index()
    {
        return Modul::with('ufs')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'professor_id' => 'nullable|exists:professors,id',
        ]);

        $modul = Modul::create($validated);
        return response()->json($modul, 201);
    }

    public function show(Modul $modul)
    {
        return $modul->load('ufs.alumnes');
    }

    public function update(Request $request, Modul $modul)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'professor_id' => 'nullable|exists:professors,id',
        ]);

        $modul->update($validated);
        return response()->json($modul);
    }

    public function destroy(Modul $modul)
    {
        $modul->delete();
        return response()->noContent(); // 204
    }
}

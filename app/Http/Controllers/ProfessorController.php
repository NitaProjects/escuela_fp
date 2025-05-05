<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        return Professor::with('moduls')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:professors,email',
        ]);

        $professor = Professor::create($validated);
        return response()->json($professor, 201);
    }

    public function show(Professor $professor)
    {
        return $professor->load('moduls');
    }

    public function update(Request $request, Professor $professor)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:professors,email,' . $professor->id,
        ]);

        $professor->update($validated);
        return response()->json($professor);
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();
        return response()->noContent();
    }
}

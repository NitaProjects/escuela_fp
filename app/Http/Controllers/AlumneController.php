<?php

namespace App\Http\Controllers;

use App\Models\Alumne;
use Illuminate\Http\Request;

class AlumneController extends Controller
{
    public function index()
    {
        return Alumne::with('ufs')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:alumnes,email',
        ]);

        $alumne = Alumne::create($validated);
        return response()->json($alumne, 201);
    }

    public function show(Alumne $alumne)
    {
        return $alumne->load('ufs');
    }

    public function update(Request $request, Alumne $alumne)
    {
        $validated = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:alumnes,email,' . $alumne->id,
        ]);

        $alumne->update($validated);
        return response()->json($alumne);
    }

    public function destroy(Alumne $alumne)
    {
        $alumne->delete();
        return response()->noContent();
    }
}

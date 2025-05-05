<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessorRequest;
use App\Http\Requests\UpdateProfessorRequest;
use App\Models\Professor;

class ProfessorController extends Controller
{
    public function index()
    {
        return Professor::with('moduls')->get();
    }

    public function store(StoreProfessorRequest $request)
    {
        $professor = Professor::create($request->validated());
        return response()->json($professor, 201);
    }

    public function show(Professor $professor)
    {
        return $professor->load('moduls');
    }

    public function update(UpdateProfessorRequest $request, Professor $professor)
    {
        $professor->update($request->validated());
        return response()->json($professor);
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();
        return response()->noContent();
    }
}

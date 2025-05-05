<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAvaluacioRequest;
use App\Http\Requests\UpdateAvaluacioRequest;
use App\Models\Avaluacio;

class AvaluacioController extends Controller
{
    public function index()
    {
        return Avaluacio::with(['alumne', 'uf'])->get();
    }

    public function store(StoreAvaluacioRequest $request)
    {
        $avaluacio = Avaluacio::create($request->validated());
        return response()->json($avaluacio, 201);
    }

    public function show(Avaluacio $avaluacio)
    {
        return $avaluacio->load(['alumne', 'uf']);
    }

    public function update(UpdateAvaluacioRequest $request, Avaluacio $avaluacio)
    {
        $avaluacio->update($request->validated());
        return response()->json($avaluacio);
    }

    public function destroy(Avaluacio $avaluacio)
    {
        $avaluacio->delete();
        return response()->noContent();
    }
}

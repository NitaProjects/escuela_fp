<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModulRequest;
use App\Http\Requests\UpdateModulRequest;
use App\Models\Modul;

class ModulController extends Controller
{
    public function index()
    {
        return Modul::with('ufs')->get();
    }

    public function store(StoreModulRequest $request)
    {
        $modul = Modul::create($request->validated());
        return response()->json($modul, 201);
    }

    public function show(Modul $modul)
    {
        return $modul->load('ufs.alumnes');
    }

    public function update(UpdateModulRequest $request, Modul $modul)
    {
        $modul->update($request->validated());
        return response()->json($modul);
    }

    public function destroy(Modul $modul)
    {
        $modul->delete();
        return response()->noContent(); // 204
    }
}

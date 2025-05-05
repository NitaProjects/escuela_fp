<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUfRequest;
use App\Http\Requests\UpdateUfRequest;
use App\Models\Uf;

class UfController extends Controller
{
    public function index()
    {
        return Uf::with('modul')->get();
    }

    public function store(StoreUfRequest $request)
    {
        $uf = Uf::create($request->validated());
        return response()->json($uf, 201);
    }

    public function show(Uf $uf)
    {
        return $uf->load('modul', 'alumnes');
    }

    public function update(UpdateUfRequest $request, Uf $uf)
    {
        $uf->update($request->validated());
        return response()->json($uf);
    }

    public function destroy(Uf $uf)
    {
        $uf->delete();
        return response()->noContent();
    }
}

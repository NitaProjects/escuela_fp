<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumneRequest;
use App\Http\Requests\UpdateAlumneRequest;
use App\Models\Alumne;

class AlumneController extends Controller
{
    public function index()
    {
        return Alumne::with('ufs')->get();
    }

    public function store(StoreAlumneRequest $request)
    {
        $alumne = Alumne::create($request->validated());
        return response()->json($alumne, 201);
    }

    public function show(Alumne $alumne)
    {
        return $alumne->load('ufs');
    }

    public function update(UpdateAlumneRequest $request, Alumne $alumne)
    {
        $alumne->update($request->validated());
        return response()->json($alumne);
    }

    public function destroy(Alumne $alumne)
    {
        $alumne->delete();
        return response()->noContent();
    }
}

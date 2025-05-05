<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAvaluacioRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'alumne_id' => 'required|exists:alumnes,id',
            'uf_id' => 'required|exists:ufs,id',
            'nota' => 'nullable|integer|between:0,100',
        ];
    }
}

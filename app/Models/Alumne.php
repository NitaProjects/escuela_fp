<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumne extends Model
{
    /** @use HasFactory<\Database\Factories\AlumneFactory> */
    use HasFactory;

    public function avaluacions()
    {
        return $this->hasMany(Avaluacio::class, 'alumne_id');
    }
    public function ufs()
    {
        return $this->belongsToMany(Uf::class, 'avaluacions', 'alumne_id', 'uf_id')
            ->withPivot('nota')
            ->withTimestamps();
    }
}

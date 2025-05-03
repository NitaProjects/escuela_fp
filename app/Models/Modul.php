<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    public function ufs() {
        return $this->hasMany(Uf::class);
    }
    public function professor() {
        return $this->belongsTo(Professor::class);
    }
    public function alumnes() {
        // relación muchos a muchos a través de evaluaciones
        return $this->hasManyThrough(Alumne::class, Avaluacio::class, 'modul_id', 'id', 'id', 'alumne_id');
    }
}
